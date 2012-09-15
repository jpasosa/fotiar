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

class EventoController extends Drumbit_CustomController 
{   
	
	public function indexAction() 
    {    	
    	$this->view->pageTitle = "Edición de Eventos Principales";
		
    	$evento1 = models_Evento::findByPK('1');
		$evento2 = models_Evento::findByPK('2');
		$evento3 = models_Evento::findByPK('3');
		$evento4 = models_Evento::findByPK('4');
		
		$this->view->evento1 = $evento1;
    	$this->view->evento2 = $evento2;
    	$this->view->evento3 = $evento3;
    	$this->view->evento4 = $evento4;
    	
    	$this->view->event_folder = Zend_Registry::get('config')->event_folder;  
    
    }
	
    public function editAction() 
    { 
    	$eventid = $this->getRequest()->getParam('id');
    	$this->view->pageTitle = "Edición de Evento Número ".$eventid;
    	$evento = models_evento::findByPK($eventid);
    	$form = new forms_Evento();
    	    	
    	if ($this->getRequest()->isPost()) 
    	{
			if ($form->isValid($_POST)) 
			{
				$evento->setAll($form->getValues());
				$evento->nombre_archivo_es = 'evento'.$eventid.'_es.jpg';
				$evento->nombre_archivo_pt = 'evento'.$eventid.'_pt.jpg';
				$evento->nombre_archivo_en = 'evento'.$eventid.'_en.jpg';
				$evento->nombre_icono = 'icono'.$eventid.'.png';
				$evento->save();
				Zend_Registry::get('messagehandler')->add('INFO', 'Se guardaron los datos del evento.');
				
				if (!empty($_FILES)) 
				{
					if(!empty($_FILES['nombre_archivo_es']))
					{
						$tempFile = $_FILES['nombre_archivo_es']['tmp_name'];
						move_uploaded_file($tempFile,Zend_Registry::get('config')->event_folder.'/evento'.$eventid.'_es.jpg');
					}
					if(!empty($_FILES['nombre_archivo_pt']))
					{
						$tempFile = $_FILES['nombre_archivo_pt']['tmp_name'];
						move_uploaded_file($tempFile,Zend_Registry::get('config')->event_folder.'/evento'.$eventid.'_pt.jpg');
					}
					if(!empty($_FILES['nombre_archivo_en']))
					{
						$tempFile = $_FILES['nombre_archivo_en']['tmp_name'];
						move_uploaded_file($tempFile,Zend_Registry::get('config')->event_folder.'/evento'.$eventid.'_en.jpg');
					}
					if(!empty($_FILES['nombre_icono']))
					{
						$tempFile = $_FILES['nombre_icono']['tmp_name'];
						move_uploaded_file($tempFile,Zend_Registry::get('config')->event_folder.'/icono'.$eventid.'.png');
					}
				}
			
				return $this->_redirect(getControllerUrl('evento'));
			}
    	}
    	else
    	{
    		$form->populate((array)$evento);
    		$form->populate(array('hidden_subcategoria_id' => $evento->subcategoria_id));
    		
    	}
    	$this->view->event_folder = Zend_Registry::get('config')->event_folder; 
    	$this->view->evento = $evento;
		$this->view->form = $form;
    }  
} 