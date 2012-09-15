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
 
class IndexController extends Drumbit_CustomController 
{ 
	public function indexAction() 
    {    	
        $session = new Zend_Session_Namespace();
    	$usuario = models_Usuario::findByPK($session->uid);
   		if ($usuario->id )
   		{
   			$this->view->loggedin = true;
   		}
   		else
   		{
   			$this->view->loggedin = false;
   		}
   		$this->view->usuario = $usuario;
   		$this->view->acl = Zend_Registry::get('acl');
    } 
    
    function logoutAction()
    {
    	$session = new Zend_Session_Namespace();
		$session->uid = null;
    	return $this->_redirect(getControllerUrl('index'));
    }
} 