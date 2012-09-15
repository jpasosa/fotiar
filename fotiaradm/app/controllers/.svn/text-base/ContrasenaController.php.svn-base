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

class ContrasenaController extends Drumbit_CustomController 
{   
 
	public function indexAction() 
    { 
    	$this->view->pageTitle = "Actualización de Contraseña";
    	$form = new forms_Contrasena();
    	if ($this->getRequest()->isPost()) 
    	{
			if ($form->isValid($_POST)) 
			{
				$session = new Zend_Session_Namespace();
				$usuario = models_Usuario::findByPK($session->uid);
				$usuario->setPassword($form->getValue('contrasena'));
				Zend_Registry::get('messagehandler')->add('INFO', 'Se actualizó su contraseña.');
				
				return $this->_redirect(getControllerUrl('index'));
			}
    	}
		$this->view->form = $form;
    }
   
} 