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

class forms_aCatalogar extends Zend_Form
{
	public function __construct($fotografias)
	{
		parent::__construct();
	
		$this->setName('Catalogar Fotos');
		$this->setAttrib('id', 'form_acatalogar');
		
		$selectall = new Zend_Form_Element_Checkbox('selectall');
		$selectall->setDecorators(array(array('ViewHelper')));
		
		foreach ($fotografias as $c=>$f):
			$name = 'c'.strval($f->id);
			$checks[$f->id] = new Zend_Form_Element_Checkbox($name);
		endforeach;
		
     	$submit = new Zend_Form_Element_Submit('submit');
     	$submit->setLabel('Catalogar Fotos Seleccionadas')
     			->setDecorators(array(array('ViewHelper')));
     	
		
     	foreach ($checks as $c):
			$this->addElement($c);
		endforeach;
		$this->addElements(array($submit,$selectall));

	
		
	}
}