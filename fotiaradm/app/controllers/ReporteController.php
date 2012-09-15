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

class ReporteController extends Drumbit_CustomController
{
	var $_parent;
	
	function indexAction()
    {
		$session = new Zend_Session_Namespace();
		$isAdmin = models_Usuario::findByPK($session->uid)->isAdmin();
		$form = new forms_Reporte();
		
		
		if ($this->getRequest()->isPost())
			{
			if($form->isValid($_POST))
	    		{
	    			if($isAdmin && !$form->getValue('usuario_id'))
	    			{
	    				$this->_redirect(getControllerUrl('reporte','results', array(
	    											'fechainicial' => $form->getValue('fechainicial'),
	    											'fechafinal' => $form->getValue('fechafinal')
	    											)));
	    			}
	    			else 
	    			{
	    				if ($isAdmin)
	    				{
	    					$fotografo = $form->getValue('usuario_id');	
	    				}
	    				else 
	    				{
	    					$fotografo = $session->uid;
	    				}
	    				
	    				$this->_redirect(getControllerUrl('reporte','details', array(
	    											'fechainicial' => $form->getValue('fechainicial'),
	    											'fechafinal' => $form->getValue('fechafinal'),
	    											'fotografo' => $fotografo
	    											)));
	    			}
	    		}
			}
		$this->view->pageTitle = "Reporte de Ventas";
		$this->view->form = $form;
		
    }   

    function resultsAction()
    {
		$this->view->pageTitle = "Reporte de Ventas";
		$fechainicial = $this->getRequest()->getParam('fechainicial');
		$fechafinal = $this->getRequest()->getParam('fechafinal');

		$ItemsReporte = models_ItemReporte::reporteVentas($fechainicial, $fechafinal);

		$this->view->fechainicial = $fechainicial;
		$this->view->fechafinal = $fechafinal;
		$this->view->ItemsReporte = $ItemsReporte;
		$this->view->pageTitle = "Reporte de Ventas";
    }   
    
    function detailsAction()
    {
		$session = new Zend_Session_Namespace();
		
    	$fotografo = $this->getRequest()->getParam('fotografo');
		$isAdmin = models_Usuario::findByPK($session->uid)->isAdmin();
		
    	if (!($fotografo != $session->uid AND !$isAdmin))
    	{
	    	$this->view->pageTitle = "Detalle de Ventas";
			$fechainicial = $this->getRequest()->getParam('fechainicial');
			$fechafinal = $this->getRequest()->getParam('fechafinal');
	
			$ItemsDetalle = models_ItemsDetalle::reporteVentas($fechainicial, $fechafinal,$fotografo);
	
	    	$this->view->img_folder = Zend_Registry::get('config')->img_folder;
	    	$this->view->thumb_max_width = Zend_Registry::get('config')->thumb_max_width;
	    	$this->view->thumb_max_height = Zend_Registry::get('config')->thumb_max_height;
			$this->view->fechainicial = $fechainicial;
			$this->view->fechafinal = $fechafinal;
			$this->view->fotografo = $fotografo;
			$this->view->ItemsDetalle = $ItemsDetalle;
			$this->view->pageTitle = "Reporte de Ventas";
    	}
    	else 
    	{
    		Zend_Registry::get('messagehandler')->add('ERROR', 'No tiene privilegios para realizar esta acción.');
    		$this->_redirect(getControllerUrl('index','index'));
    	}
    }  
}