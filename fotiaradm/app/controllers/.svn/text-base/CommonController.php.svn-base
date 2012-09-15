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

class CommonController extends Zend_Controller_Action
{
  public function navigationAction()
  {
    $this->getHelper("ViewRenderer")->setNoRender();

    $session = new Zend_Session_Namespace();
    $usuario = models_Usuario::findByPK($session->uid);
    if ($usuario->id )
    {
      $sections = array(
        'index' => 'Inicio',
        'carga' => 'Carga de FotografÃ­as',
        'fotografia' => 'Busqueda de FotografÃ­as',
       	'reporte' => 'Reportes',
       	'administracion' => 'AdministraciÃ³n'
      );
    }
    else
    {
      $sections = array(
        'index' => 'Inicio'
      );
    }
    $currentNavSection = $this->_getParam('controller');
    $linkAttributes = array();

    foreach ($sections as $k=>$v)
    {
        switch ($k)
        {
        	case 'index': 
        	{
        		$linkAttributes[$k] = array('class'=>'index');
        		break;	
        	}
      		case 'carga': 
      		{
      			$linkAttributes[$k] = array('class'=>'carga');
      			break;
      		}
      		case 'fotografia': 
      		{
      			$linkAttributes[$k] = array('class'=>'fotografia');
      			break;
        	}
        	case 'administracion': 
        	{
        		$linkAttributes[$k] = array('class'=>'administracion');
        		break;
        	}
      		case 'usuario': 
      		{
      			$linkAttributes[$k] = array('class'=>'usuario');
      			break;
        	}
      		case 'reporte': 
      		{
      			$linkAttributes[$k] = array('class'=>'reporte');
      			break;
        	}
	    }
    }
    $this->view->sections = $sections;
    $this->view->linkAttributes = $linkAttributes;

    $this->getResponse()->append('navigation', $this->view->render('common/navigation.phtml'));
  }

  public function messagesAction()
  {
    $this->getHelper("ViewRenderer")->setNoRender();
    $messages = Zend_Registry::get('messagehandler')->get();

    if(is_array($messages))
    {
      $this->view->messages = $messages;
      $this->getResponse()->append('messages', $this->view->render('common/messages.phtml'));
    }
  }

  public function loginAction()
  {
    $this->getHelper("ViewRenderer")->setNoRender();
      
    $session = new Zend_Session_Namespace();
    $usuario = models_Usuario::findByPK($session->uid);
      
    if ($usuario->id)
    {
      $this->view->usuario = $usuario;
      $this->view->rol = models_Rol::findByPK($usuario->rol_id);
      $this->getResponse()->append('userinfo', $this->view->render('common/userinfo.phtml'));
    }
    else
    {
      $form = new forms_Login();
      if ($this->getRequest()->isPost())
      {
        if ($form->isValid($_POST))
        {
          $usuario = models_Usuario::authenticate($form->getValue('usuario'), $form->getValue('contrasena'));
          if ($usuario->id)
          {
            $session->uid = $usuario->id;

            $this->_redirect(getControllerUrl('index'));
            $this->dispatch();
          }
          else
          {//  session_unregister('UID');
            Zend_Registry::get('messagehandler')->add('ERROR', 'Nombre de usuario o contraseÃ±a incorrectos.');
          }
        }
      }
      $this->view->form = $form;
      $this->getResponse()->append('userinfo', $this->view->render('common/login.phtml'));
    }
      
  }
}