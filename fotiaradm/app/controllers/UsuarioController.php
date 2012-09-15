<?php
/**
 * Copyright (C) 2010 Primetec - www.primetec.com.ar
 *
 * This file is part of Sistema FOTIARADM
 *
 * Sistema FOTIAR ADM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Sistema FOTIAR ADM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Sistema FOTIAR ADM.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

class UsuarioController extends Drumbit_CustomController
{
	public function preDispatch()
	{
		parent::preDispatch();
		$action = $this->_getParam('action');
		$usuario = models_Usuario::findByPK($this->getRequest()->getParam('id'));
		 
		if ($usuario->id && ($action == 'edit' || $action == 'delete'))
		{
			$session = new Zend_Session_Namespace();
			$usuario_logged = models_Usuario::findByPK($session->uid);

			$resource =  'usuario_'.$usuario->rol_id;
			if ($usuario->id == $usuario_logged->id)
			{
				$resource = 'usuario_self';
			}

			$acl = Zend_Registry::get('acl');
			if (!$acl->isAllowed($usuario_logged->rol_id, $resource,$action))
			{
				Zend_Registry::get('messagehandler')->add('ERROR', 'No tiene privilegios para realizar esta acción.');

				if ($acl->isAllowed($usuario->rol_id, 'usuario','index'))
				{
					$this->_redirect(getControllerUrl('usuario','index'));
				}
				else
				{
					$this->_redirect(getControllerUrl('index','index'));
				}
			}
		}
	}

	public function indexAction()
	{
		$this->view->pageTitle = "Usuarios";
		$session = new Zend_Session_Namespace();
		$params = array();
		  
		
		$this->getHelper('dataGridManager')->initGrid('usuario',
							'usuario_id', 
		          array (
								"usuario:usuario_usuario",
								"usuario:usuario_nombre",
								"usuario:usuario_apellido",
		          				"usuario:usuario_correo",
								"rol:rol_id"
              ),
              $params  
            );

                $session = new Zend_Session_Namespace();
                $this->view->usuario_logged = models_Usuario::findByPK($session->uid);
                $this->view->acl = Zend_Registry::get('acl');
                $this->view->roles = models_Rol::findAllWithUsuario(true);

	}

	public function viewAction()
	{
		$this->view->pageTitle = "Usuario";
		$this->view->usuario = models_Usuario::findByPK($this->getRequest()->getParam('id'));
		$session = new Zend_Session_Namespace();
		$this->view->usuario_logged = models_Usuario::findByPK($session->uid);
		$this->view->acl = Zend_Registry::get('acl');
	}

	public function editAction()
	{
		$this->view->pageTitle = "Edición de Usuario";
		
		$usuario = models_Usuario::findByPK($this->getRequest()->getParam('id'));
		$usuario->precio = str_replace('.',',',$usuario->precio);
		$usuario->comision = str_replace('.',',',$usuario->comision);
		$session = new Zend_Session_Namespace();
		$usuario_logged = models_Usuario::findByPK($session->uid);
		$acl = Zend_Registry::get('acl');  
				
		$form = new forms_Usuario(!$usuario->id, $acl->isAllowed($usuario_logged->rol_id,'rol','edit'));
		
		if ($this->getRequest()->isPost())
		{
			if ($form->isValid($_POST))
			{
				$usuario->setAll($form->getValues());
				$usuario->precio = str_replace(',','.',$usuario->precio);
				$usuario->comision = str_replace(',','.',$usuario->comision);
				if ($usuario_logged->id == $usuario->id)
				{
					$usuario->rol_id = $usuario_logged->rol_id;
				}
				else if (!$acl->isAllowed($usuario_logged->rol_id,'rol','edit'))
				{
					$usuario->rol_id = ($usuario->id) ? $usuario->rol_id : 'user';
				}
				
				$usuario->save();
				
				if ($form->getValue('contrasena') != '')
				{
					$usuario->setPassword($form->getValue('contrasena'));
				}

				Zend_Registry::get('messagehandler')->add('INFO', 'Se guardaron los datos del Usuario.');
				return $this->_redirect(getControllerUrl('usuario'));
			}
			else
			{
				if (!$acl->isAllowed($usuario_logged->rol_id,'rol','edit'))
				{
					$form->populate(array('rol_id'=> ($usuario->id)?$usuario->rol_id : 'user') );
				}
			}
		}
		else
		{
			$form->populate(array('rol_id'=> 'user'));
			if($usuario->id)
			{
				$form->populate((array)$usuario);
			}
		}
		$this->view->form = $form;
	}
	
	public function deleteAction()
	{
		$usuario = models_Usuario::findByPK($this->getRequest()->getParam('id'));
		models_Usuario::delete($usuario);
		Zend_Registry::get('messagehandler')->add('INFO', 'Se eliminaron los datos del Usuario.');
		return $this->_redirect(getControllerUrl('usuario'));
	}

	public function newAction()
{
		$this->view->pageTitle = "Edición de Usuario";
		
		$usuario = models_Usuario::findByPK($this->getRequest()->getParam('id'));
		$usuario->precio = str_replace('.',',',$usuario->precio);
		$usuario->comision = str_replace('.',',',$usuario->comision);
		$session = new Zend_Session_Namespace();
		$usuario_logged = models_Usuario::findByPK($session->uid);
		$acl = Zend_Registry::get('acl');  
				
		$form = new forms_Usuario(!$usuario->id, $acl->isAllowed($usuario_logged->rol_id,'rol','edit'));
		
		if ($this->getRequest()->isPost())
		{
			if ($form->isValid($_POST))
			{
				$usuario->setAll($form->getValues());
				$usuario->precio = str_replace(',','.',$usuario->precio);
				$usuario->comision = str_replace(',','.',$usuario->comision);				
				if ($usuario_logged->id == $usuario->id)
				{
					$usuario->rol_id = $usuario_logged->rol_id;
				}
				else if (!$acl->isAllowed($usuario_logged->rol_id,'rol','edit'))
				{
					$usuario->rol_id = ($usuario->id) ? $usuario->rol_id : 'user';
				}
				
				$usuario->save();
				
				if ($form->getValue('contrasena') != '')
				{
					$usuario->setPassword($form->getValue('contrasena'));
				}

				Zend_Registry::get('messagehandler')->add('INFO', 'Se guardaron los datos del Usuario.');
				return $this->_redirect(getControllerUrl('usuario'));
			}
			else
			{
				if (!$acl->isAllowed($usuario_logged->rol_id,'rol','edit'))
				{
					$form->populate(array('rol_id'=> ($usuario->id)?$usuario->rol_id : 'user') );
				}
			}
		}
		else
		{
			$form->populate(array('rol_id'=> 'user'));
			if($usuario->id)
			{
				$form->populate((array)$usuario);
			}
		}
		$this->view->form = $form;
	}
	
}