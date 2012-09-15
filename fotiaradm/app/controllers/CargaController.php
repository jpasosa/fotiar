<?php
/**
 * Copyright (C) 2008 Marcelo Costanzi - www.dotdev.com.ar
 * 
 * This file is part of Sistema RENYCOA
 *
 * Sistema RENYCOA is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Sistema RENYCOA is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Sistema RENYCOA.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

class CargaController extends Drumbit_CustomController
{
	var $_parent;
	
	function indexAction()
    {
    	$form = new forms_Carga();
  		if ($this->getRequest()->isPost())
			{
			if($form->isValid($_POST))
	    		{
	    			$categoria = $form->getValue('categoria_id');
	    			$subcategoria = $form->getValue('subcategoria_id');
					$this->_redirect(getControllerUrl('carga','upload', array('categoria_id' => $categoria,'subcategoria_id' => $subcategoria,'sesion_id' => '')));
	    		}
			}
    	$this->view->form = $form;
    }   
    
    function uploadAction()
    {
    	$session = new Zend_Session_Namespace();
    	$carga = new models_Carga();
    	$carga->fechacarga = date('d/m/Y H:i',time());
    	$carga->usuario_id = $session->uid;
    	$carga->save();    	
    	
    	$this->view->carga_id = $carga->id;
    	$this->view->categoria_id = $this->getRequest()->getParam('categoria_id');
    	$this->view->subcategoria_id = $this->getRequest()->getParam('subcategoria_id');
    	$this->view->sesion_id = $this->getRequest()->getParam('sesion_id');
    }   

	function sesionAction()
    {
    	$form = new forms_CargaSesion();
  		if ($this->getRequest()->isPost())
			{
			if($form->isValid($_POST))
	    		{
					if ($form->getValue('sesion_id') != '0')
					{
						$sesion_id = $form->getValue('sesion_id');
						$this->_redirect(getControllerUrl('carga','upload', array('categoria_id' => '','subcategoria_id' => '','sesion_id' => $sesion_id)));
						
					}
	    			else 
	    			{
		    			if($form->getValue('hidden_sesion'))
						{
							$sesion = new models_Sesion();
							$sesion->descripcion = $form->getValue('hidden_sesion');
							$session = new Zend_Session_Namespace();
							$sesion->usuario_id = $session->uid;
							$sesion->save();
							$sesion_id = $sesion->id;
							$this->_redirect(getControllerUrl('carga','upload', array('categoria_id' => '','subcategoria_id' => '','sesion_id' => $sesion_id)));
						}
						else 
						{
							Zend_Registry::get('messagehandler')->add('ERROR', 'Debe escribir una descripción para la sesión de fotos.');
						}
	    			}
	    		}
			}
    	$this->view->form = $form;
    }
}