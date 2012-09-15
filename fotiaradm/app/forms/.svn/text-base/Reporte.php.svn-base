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

class forms_Reporte extends Zend_Form
{
	public function __construct($options = null)
	{
		parent::__construct($options);
	
		$this->setName('Reporte de Ventas');
		$this->setAttrib('id', 'form_Reporte');
		
		$session = new Zend_Session_Namespace();
		$isAdmin = models_Usuario::findByPK($session->uid)->isAdmin();
		
	    $fotografos = array(''=>' -- Todos -- ');
		foreach (models_Usuario::findAll(false) as $k=>$v)
		{
			$fotografos[$v->id] = $v;
		}
		$usuario_id = new Zend_Form_Element_Select('usuario_id');
		$usuario_id->setLabel('Fotógrafo')
	    			->setmultiOptions($fotografos);

		    			
	    $fechainicial = new Zend_Form_Element_Text('fechainicial');
		$fechainicial->setLabel('Fecha Inicial')
					->setRequired(true);            

		$fechafinal = new Zend_Form_Element_Text('fechafinal');
		$fechafinal->setLabel('Fecha Final')
					->setRequired(true);


		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Enviar');
		
		$this->setDecorators(array(
          array('ViewScript', array('viewScript' => '_forms/reporte.phtml'))
      	));
	
		if ($isAdmin)
		{
			   	$this->addElement($usuario_id);
		}   
		$this->addElements(array(
							$fechainicial,
							$fechafinal,
							$submit));
							
		$this->setElementDecorators(array('ViewHelper', 'Errors'));							
	}
}