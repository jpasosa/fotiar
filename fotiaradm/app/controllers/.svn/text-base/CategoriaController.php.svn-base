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

class CategoriaController extends Drumbit_CustomController 
{   
	
	public function indexAction() 
    {    	
    	$this->view->pageTitle = "Categorías";
		$session = new Zend_Session_Namespace();
		$params = array();
		
		$this->getHelper('dataGridManager')->initGrid('categoria',
							'categoria_id', 
							array ( 
								"categoria:categoria_descripcion"
							)
		);	
    } 
    
	public function viewAction() 
    { 
    	$this->view->pageTitle = "Categoría";
    	$this->view->categoria = models_Categoria::findByPK($this->getRequest()->getParam('id'));
    }
    
	public function editAction() 
    { 
    	$this->view->pageTitle = "Edición de Categoría";
    	$categoria = models_Categoria::findByPK($this->getRequest()->getParam('id'));
    	$form = new forms_Categoria();
    	if ($this->getRequest()->isPost()) 
    	{
			if ($form->isValid($_POST)) 
			{
				$categoria->setAll($form->getValues());
				$categoria->descripcion = trim(ucwords($categoria->descripcion));
				$categoria->save();
				Zend_Registry::get('messagehandler')->add('INFO', 'Se guardaron los datos de la categoría.');
				return $this->_redirect(getControllerUrl('categoria'));
			}
    	}
    	else
    	{
    		$form->populate((array)$categoria);
    	}
		$this->view->form = $form;
    }
    
	public function deleteAction() 
    { 
    	if (!models_Categoria::isInUse($this->getRequest()->getParam('id')))
    	{
    		$categoria = models_Categoria::findByPK($this->getRequest()->getParam('id'));
	    	models_Categoria::delete($categoria);
	    	Zend_Registry::get('messagehandler')->add('INFO', 'Se eliminaron los datos de la categoría.');
    	}
    	else
    	{
    		Zend_Registry::get('messagehandler')->add('ERROR', 'No se puede eliminar la categoría porque aún está en uso.');
    	}
    	return $this->_redirect(getControllerUrl('categoria'));
    }
   
} 