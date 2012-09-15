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

class TemaController extends Drumbit_CustomController 
{   
	
	public function indexAction() 
    {    	
    	$this->view->pageTitle = "Temas";
		$session = new Zend_Session_Namespace();
		$params = array();
		
		$this->getHelper('dataGridManager')->initGrid('tema',
							'tema_id', 
							array ( 
								"tema:tema_descripcion"
							)
		);	
    } 
    
	public function viewAction() 
    { 
    	$this->view->pageTitle = "Tema";
    	$this->view->tema = models_Tema::findByPK($this->getRequest()->getParam('id'));
    }
    
	public function editAction() 
    { 
    	$this->view->pageTitle = "Edición de Tema";
    	$tema = models_Tema::findByPK($this->getRequest()->getParam('id'));
    	$form = new forms_Tema();
    	if ($this->getRequest()->isPost()) 
    	{
			if ($form->isValid($_POST)) 
			{
				$tema->setAll($form->getValues());
				$tema->descripcion = trim(ucwords($tema->descripcion));
				$tema->save();
				Zend_Registry::get('messagehandler')->add('INFO', 'Se guardaron los datos del tema.');
				return $this->_redirect(getControllerUrl('tema'));
			}
    	}
    	else
    	{
    		$form->populate((array)$tema);
    	}
		$this->view->form = $form;
    }
    
	public function deleteAction() 
    { 
    	if (!models_Tema::isInUse($this->getRequest()->getParam('id')))
    	{
    		$tema = models_Tema::findByPK($this->getRequest()->getParam('id'));
	    	models_Tema::delete($tema);
	    	Zend_Registry::get('messagehandler')->add('INFO', 'Se eliminaron los datos del tema.');
    	}
    	else
    	{
    		Zend_Registry::get('messagehandler')->add('ERROR', 'No se puede eliminar el tema porque aún está en uso.');
    	}
    	return $this->_redirect(getControllerUrl('tema'));
    }
   
} 