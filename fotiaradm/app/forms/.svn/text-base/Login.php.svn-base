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

class forms_Login extends Zend_Form
{
	public function __construct($options = null)
	{
		parent::__construct($options);
	
		$this->setName('Entrada de usuarios');
		$this->setAttrib('id', 'form_login');
		$this->setDecorators(array(
		   array('ViewScript', array('viewScript' => '_forms/login.phtml'))
		));
		
		$hash = new Zend_Form_Element_Hash('hash');
		$hash->setSalt('form_login')
			 ->setDecorators(array('ViewHelper'))
			 ->removeDecorator('Errors');

		$usuario = new Zend_Form_Element_Text('usuario');
		$usuario->setLabel('Usuario')
				->setRequired(true)
				->removeDecorator('Errors');
					
		$contrasena = new Zend_Form_Element_Password('contrasena');
		$contrasena->setLabel('Contraseña')
			 	   ->setRequired(true)
			 	   ->removeDecorator('Errors');
			
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Ingresar');

		$this->addElements(
			array(	
				$hash,
				$usuario, 
				$contrasena, 
				$submit
			)
		);
		$this->setElementDecorators(array('ViewHelper'));
	}
}