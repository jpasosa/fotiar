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

class forms_CargaSesion extends Zend_Form
{
	public function __construct($options = null)
	{
		parent::__construct($options);
	
		$this->setName('Carga de Fotos');
		$this->setAttrib('id', 'form_CargaSesion');
		
		$session = new Zend_Session_Namespace();
		
		$sesiones = array(''=>'-- Seleccione --','0'=>'-- Nueva Sesión --');
		foreach (models_Sesion::findAllbyUsuario($session->uid, false) as $k=>$v)
		{
			$sesiones[$v->id] = $v;
		}
		$sesion_id = new Zend_Form_Element_Select('sesion_id');
		$sesion_id->setLabel('Sesión de Fotos*')
	    			->setRequired(true)
	    			->setmultiOptions($sesiones);		
		
	    $hidden_sesion = new Zend_Form_Element_Text('hidden_sesion');
	    $hidden_sesion->setLabel('Nueva Sesión*');

		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Siguiente');

		$this->addElements(array($sesion_id,$hidden_sesion,$submit));
	}
}