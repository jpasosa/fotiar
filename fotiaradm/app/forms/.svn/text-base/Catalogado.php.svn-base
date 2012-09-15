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

class forms_Catalogado extends Zend_Form
{
	public function __construct($group = true)
	{
		parent::__construct();
	
		$this->setName('Catalogar Fotos');
		$this->setAttrib('id', 'form_Catalogado');
		
		$checkcategorias = new Zend_Form_Element_Checkbox('checkcategorias');  
	    $checkcategorias->setLabel('Modificar Categorías');   
		
	    $categorias = array(''=>'-- Seleccione --');
		foreach (models_Categoria::findAll(false) as $k=>$v)
		{
			$categorias[$v->id] = $v;
		}
		$categoria_id = new Zend_Form_Element_Select('categoria_id');
		$categoria_id->setLabel('Categoría')
	    			->setmultiOptions($categorias);	
	    if (!$group)
	    {
	    	$categoria_id->setLabel('Categoría*')
	    			->setRequired(true);
	    }	    			
		
	    foreach (models_Subcategoria::findAll(false) as $k=>$v)
		{
			$subcategoria_datos[$v->id] = $v;
		}
		$subcategoria_id = new Zend_Form_Element_Select('subcategoria_id');
		$subcategoria_id->setLabel('Sub Categoría')
					->addValidator(new Zend_Validate_InArray(array_keys($subcategoria_datos)));	
		
	    $hidden_subcategoria_id = new Zend_Form_Element_Hidden('hidden_subcategoria_id');
		$hidden_subcategoria_id->setDecorators(array('ViewHelper'));	    			

		$lugar_datos = models_Lugar::findAll(true);
	    $lugares = new Zend_Form_Element_MultiCheckbox('lugares');
	    $lugares->setLabel('Etiquetas de Lugar populares')
	    			->setmultiOptions($lugar_datos)
                   	->addValidator(new Zend_Validate_InArray(array_keys($lugar_datos)))
                   	->setdecorators(array(
            						'Errors',
            						array('ViewScript', array('viewScript'=>'_forms/multicheckboxview.phtml'))));
		
	    $lugar = new Zend_Form_Element_Text('lugar');
	    $lugar->setLabel('Etiquetas de Lugar')
	    			->addValidator('stringLength', false, array(0, 255))
	                ->setAttribs(array('class'=>'w590h110','rows'=>'1','cols'=>'45'));
	    
	    $checklugar = new Zend_Form_Element_Checkbox('checklugar');  
	    $checklugar->setLabel('Ver Etiquetas Populares');          
		
	    $tema_datos = models_Tema::findAll(true);
	    $temas = new Zend_Form_Element_MultiCheckbox('temas');
	    $temas->setLabel('Etiquetas de Tema populares')
	    			->setmultiOptions($tema_datos)
                   	->addValidator(new Zend_Validate_InArray(array_keys($tema_datos)))
                   	->setdecorators(array(
            						'Errors',
            						array('ViewScript', array('viewScript'=>'_forms/multicheckboxview.phtml'))));
		
	    $tema = new Zend_Form_Element_Text('tema');
	    $tema->setLabel('Etiquetas de Tema')
	    			->addValidator('stringLength', false, array(0, 255))
	                ->setAttribs(array('class'=>'w590h110','rows'=>'1','cols'=>'45'));
	    
	    $checktema = new Zend_Form_Element_Checkbox('checktema');    
	    $checktema->setLabel('Ver Etiquetas Populares'); 
	    
	    $precio = new Zend_Form_Element_Text('precio');
		
	    if (!$group)
	    {
	    $precio->setLabel('Precio*')
				->setRequired(true)
				->addValidator('float', false);
	    }
	    else
	    {
	    	$precio->setLabel('Precio')
				->setRequired(false)
				->addValidator('float', false);
	    	
	    }	    
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Catalogar Seleccionadas');
	
		$this->addElements(array(
							$checkcategorias,
							$categoria_id,
							$subcategoria_id,
							$hidden_subcategoria_id,
							$lugar,
							$checklugar,
							$lugares,
							$tema,
							$checktema,
							$temas,
							$precio,							
							$submit));
	}
}