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

class LugarController extends Drumbit_CustomController 
{   
	
	public function indexAction() 
    {    	
    	$this->view->pageTitle = "Lugares";
		$session = new Zend_Session_Namespace();
		$params = array();
		
		$this->getHelper('dataGridManager')->initGrid('lugar',
							'lugar_id', 
							array ( 
								"lugar:lugar_descripcion"
							)
		);	
    } 
    
	public function viewAction() 
    { 
    	$this->view->pageTitle = "Lugar";
    	$this->view->lugar = models_Lugar::findByPK($this->getRequest()->getParam('id'));
    }
    
	public function editAction() 
    { 
    	$this->view->pageTitle = "Edición de lugar";
    	$lugar = models_Lugar::findByPK($this->getRequest()->getParam('id'));
    	$form = new forms_Lugar();
    	if ($this->getRequest()->isPost()) 
    	{
			if ($form->isValid($_POST)) 
			{
				$lugar->setAll($form->getValues());
				$lugar->descripcion = trim(ucwords($lugar->descripcion));
				$lugar->save();
				Zend_Registry::get('messagehandler')->add('INFO', 'Se guardaron los datos del lugar.');
				return $this->_redirect(getControllerUrl('lugar'));
			}
    	}
    	else
    	{
    		$form->populate((array)$lugar);
    	}
		$this->view->form = $form;
    }
    
	public function deleteAction() 
    { 
    	if (!models_Lugar::isInUse($this->getRequest()->getParam('id')))
    	{
    		$lugar = models_Lugar::findByPK($this->getRequest()->getParam('id'));
	    	models_Lugar::delete($lugar);
	    	Zend_Registry::get('messagehandler')->add('INFO', 'Se eliminaron los datos del lugar.');
    	}
    	else
    	{
    		Zend_Registry::get('messagehandler')->add('ERROR', 'No se puede eliminar el lugar porque aún está en uso.');
    	}
    	return $this->_redirect(getControllerUrl('lugar'));
    }
   
} 