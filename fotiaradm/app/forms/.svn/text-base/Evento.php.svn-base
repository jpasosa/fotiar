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

class forms_Evento extends Zend_Form
{
	public function __construct($options = null)
	{
		parent::__construct($options);
	
		$this->setName('Edición de Evento');
		$this->setAttrib('id', 'form_evento');
		$this->setAttrib('enctype', 'multipart/form-data');
		

		$id = new Zend_Form_Element_Hidden('id');
		$id->setDecorators(array('ViewHelper'));
		
		$categorias = array(''=>'-- Seleccione --');
		foreach (models_Categoria::findAll(false) as $k=>$v)
		{
			$categorias[$v->id] = $v;
		}
		$categoria_id = new Zend_Form_Element_Select('categoria_id');
		$categoria_id->setLabel('Categoría*')
	    			->setRequired(true)
	    			->setmultiOptions($categorias);	
		
		foreach (models_Subcategoria::findAll(false) as $k=>$v)
		{
			$subcategorias[$v->id] = $v;
		}
		$subcategoria_id = new Zend_Form_Element_Select('subcategoria_id');
		$subcategoria_id->setLabel('Sub Categoría')
						->addValidator(new Zend_Validate_InArray(array_keys($subcategorias)));	
		
	    $hidden_subcategoria_id = new Zend_Form_Element_Hidden('hidden_subcategoria_id');
		$hidden_subcategoria_id->setDecorators(array('ViewHelper'));
		
	
		$nombre_archivo_es = new Zend_Form_Element_File('nombre_archivo_es');
		$nombre_archivo_es->setLabel('Imagen Español')
							->addValidator('Extension', false, 'jpg,jpeg' )
				            ->setDestination(Zend_Registry::get('config')->event_folder)
            				->setValueDisabled(true);

		
		$nombre_archivo_pt = new Zend_Form_Element_File('nombre_archivo_pt');
		$nombre_archivo_pt->setLabel('Imagen Portugues')
							->addValidator('Extension', false, 'jpg,jpeg' )
				            ->setDestination(Zend_Registry::get('config')->event_folder)
            				->setValueDisabled(true);
		
		$nombre_archivo_en = new Zend_Form_Element_File('nombre_archivo_en');
		$nombre_archivo_en->setLabel('Imagen Inglés')
							->addValidator('Extension', false, 'jpg,jpeg' )
				            ->setDestination(Zend_Registry::get('config')->event_folder)
            				->setValueDisabled(true);
		

		$nombre_icono = new Zend_Form_Element_File('nombre_icono');
		$nombre_icono->setLabel('Icono')
							->addValidator('Extension', false, 'png' )
				            ->setDestination(Zend_Registry::get('config')->event_folder)
            				->setValueDisabled(true);
		
				
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Guardar');
	
		$this->addElements(
			array(
				$id,
				$categoria_id,
				$subcategoria_id,
				$hidden_subcategoria_id,
				$nombre_archivo_es,
				$nombre_archivo_pt,
				$nombre_archivo_en,
				$nombre_icono,
				$submit
			)
		);
	}
}