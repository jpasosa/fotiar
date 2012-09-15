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

class forms_Carga extends Zend_Form
{
	public function __construct($options = null)
	{
		parent::__construct($options);
	
		$this->setName('Carga de Fotos');
		$this->setAttrib('id', 'form_Carga');
		
		$categorias = array(''=>'-- Seleccione --');
		foreach (models_Categoria::findAll(false) as $k=>$v)
		{
			$categorias[$v->id] = $v;
		}
		$categoria_id = new Zend_Form_Element_Select('categoria_id');
		$categoria_id->setLabel('Categoría*')
	    			->setRequired(true)
	    			->setmultiOptions($categorias);	
		$subcategorias = array(''=>'-- Seleccione --');
		foreach (models_Subcategoria::findAll(false) as $k=>$v)
		{
			$subcategorias[$v->id] = $v;
		}
		$subcategoria_id = new Zend_Form_Element_Select('subcategoria_id');
		$subcategoria_id->setLabel('Sub Categoría')
						->addValidator(new Zend_Validate_InArray(array_keys($subcategorias)));;	
		
	    $hidden_subcategoria_id = new Zend_Form_Element_Hidden('hidden_subcategoria_id');
		$hidden_subcategoria_id->setDecorators(array('ViewHelper'));	

		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Siguiente');

		$this->addElements(array($categoria_id,$subcategoria_id,$hidden_subcategoria_id,$submit));
	}
}