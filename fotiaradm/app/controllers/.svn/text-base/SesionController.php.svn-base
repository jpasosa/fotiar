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

class SesionController extends Drumbit_CustomController 
{   
	
	public function indexAction() 
    {    	
    	$this->view->pageTitle = "Sesiones";
		$session = new Zend_Session_Namespace();
		$params = array();
		
		$this->getHelper('dataGridManager')->initGrid('sesion',
							'sesion_id', 
							array ( 
								"sesion:sesion_descripcion"
							)
		);	
    } 
    
	public function viewAction() 
    { 
    	$this->view->pageTitle = "Sesión";
    	$this->view->sesion = models_Sesion::findByPK($this->getRequest()->getParam('id'));
    }
    
	public function editAction() 
    { 
    	$this->view->pageTitle = "Edición de Sesión";
    	$sesion = models_Sesion::findByPK($this->getRequest()->getParam('id'));
    	$form = new forms_Sesion();
    	if ($this->getRequest()->isPost()) 
    	{
			if ($form->isValid($_POST)) 
			{
				$sesion->setAll($form->getValues());
				$sesion->descripcion = trim(ucwords($sesion->descripcion));
				$session = new Zend_Session_Namespace();
				$sesion->usuario_id = $session->uid;
				$sesion->save();
				Zend_Registry::get('messagehandler')->add('INFO', 'Se guardaron los datos de la sesión.');
				return $this->_redirect(getControllerUrl('sesion'));
			}
    	}
    	else
    	{
    		$form->populate((array)$sesion);
    	}
		$this->view->form = $form;
    }
    
	public function deleteAction() 
    { 
    	if (!models_Sesion::isInUse($this->getRequest()->getParam('id')))
    	{
    		$sesion = models_Sesion::findByPK($this->getRequest()->getParam('id'));
	    	models_Sesion::delete($sesion);
	    	Zend_Registry::get('messagehandler')->add('INFO', 'Se eliminaron los datos de la sesión.');
    	}
    	else
    	{
    		Zend_Registry::get('messagehandler')->add('ERROR', 'No se puede eliminar la sesión porque aún está en uso.');
    	}
    	return $this->_redirect(getControllerUrl('sesion'));
    }
   
} 