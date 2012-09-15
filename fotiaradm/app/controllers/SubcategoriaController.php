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

class SubcategoriaController extends Drumbit_CustomController 
{   
	
	public function indexAction() 
    {    	
    	$this->view->pageTitle = "Categorías";
		$session = new Zend_Session_Namespace();
		$params = array();
		
		$this->getHelper('dataGridManager')->initGrid('subcategoria',
							'subcategoria_id', 
							array ( 
								"categoria:categoria_id",
								"subcategoria:subcategoria_descripcion"
							)
		);	
		$this->view->categorias = models_Categoria::findAll(true);
    } 
    
	public function viewAction() 
    { 
    	$this->view->pageTitle = "Categoría";
    	$this->view->subcategoria = models_Subcategoria::findByPK($this->getRequest()->getParam('id'));
    }
    
	public function editAction() 
    { 
    	$this->view->pageTitle = "Edición de Categoría";
    	$subcategoria = models_Subcategoria::findByPK($this->getRequest()->getParam('id'));
    	$form = new forms_Subcategoria();
    	if ($this->getRequest()->isPost()) 
    	{
			if ($form->isValid($_POST)) 
			{
				$categoria_id = $form->getValue('categoria_id');
				$descripcion = $form->getValue('descripcion');
				$subcategoria->setAll($form->getValues());
				$subcategoria->descripcion = trim(ucwords($subcategoria->descripcion));
				$subcategoria->save();
				Zend_Registry::get('messagehandler')->add('INFO', 'Se guardaron los datos de la subcategoría.');
				return $this->_redirect(getControllerUrl('subcategoria'));
			}
    	}
    	else
    	{
    		$form->populate((array)$subcategoria);
    	}
		$this->view->form = $form;
    }
    
	public function deleteAction() 
    { 
    	if (!models_Subcategoria::isInUse($this->getRequest()->getParam('id')))
    	{
    		$subcategoria = models_Subcategoria::findByPK($this->getRequest()->getParam('id'));
	    	models_Subcategoria::delete($subcategoria);
	    	Zend_Registry::get('messagehandler')->add('INFO', 'Se eliminaron los datos de la subcategoría.');
    	}
    	else
    	{
    		Zend_Registry::get('messagehandler')->add('ERROR', 'No se puede eliminar la subcategoría porque aún está en uso.');
    	}
    	return $this->_redirect(getControllerUrl('subcategoria'));
    }
    
    public function getbycategoryAction() 
    { 
    	$ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('getbycategory', 'json')
                    ->initContext(); 
    	$this->view->subcategorias = models_Subcategoria::findinCategories($this->getRequest()->getParam('categoria_id'));
    } 
   
} 