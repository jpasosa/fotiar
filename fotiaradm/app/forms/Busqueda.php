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

class forms_Busqueda extends Zend_Form
{
	public function __construct($options = null)
	{
		parent::__construct($options);
	
		$this->setName('Buscar Fotos');
		$this->setAttrib('id', 'form_Busqueda');
		
		$session = new Zend_Session_Namespace();
		$isAdmin = models_Usuario::findByPK($session->uid)->isAdmin();
		
		$tipobusqueda = new Zend_Form_Element_Radio('tipobusqueda');
		$tipobusqueda->setLabel('Tipo de Búsqueda')
					->addMultiOptions(Array('0'=>'Normal','1'=>'Por Sesión','2'=>'Por Carga'))
					->setValue(0)
					->setSeparator(' ');					

		$this->addElement($tipobusqueda);

		if ($isAdmin)
		{
		$ordenbusqueda = new Zend_Form_Element_Radio('ordenbusqueda');
		$ordenbusqueda->setLabel('Ordenar Búsqueda')
					->addMultiOptions(Array(
						'fotografia.taken'=>'Fecha de Captura',
						'fotografia.usuario_id, fotografia.taken'=>'Fotógrafo',
						'categoria.descripcion, subcategoria.descripcion, fotografia.taken'=>'Categoría/Subcategoría'))
					->setValue('fotografia.taken')
					->setSeparator(' ');					
		}
		else 
		{
			$ordenbusqueda = new Zend_Form_Element_Radio('ordenbusqueda');
			$ordenbusqueda->setLabel('Ordenar Búsqueda')
						->addMultiOptions(Array(
							'fotografia.taken'=>'Fecha de Captura',
							'categoria.descripcion, subcategoria.descripcion, fotografia.taken'=>'Categoría/Subcategoría'))
						->setValue('fotografia.taken')
						->setSeparator(' ');					
				
		}
		$this->addElement($ordenbusqueda);
		
	    $categorias = array(''=>'-- Seleccione --');
		foreach (models_Categoria::findAll(false) as $k=>$v)
		{
			$categorias[$v->id] = $v;
		}
		$categoria_id = new Zend_Form_Element_Select('categoria_id');
		$categoria_id->setLabel('Categoría')
	    			->setmultiOptions($categorias);	
		
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
		
	    $lugar = new Zend_Form_Element_Text('etiquetalugar');
	    $lugar->setLabel('Etiquetas de Lugar')
	    			->addValidator('stringLength', false, array(0, 255))
	                ->setAttribs(array('class'=>'w590h110','rows'=>'1','cols'=>'45'));
	    
	    $checklugar = new Zend_Form_Element_Checkbox('checklugar');  
	    $checklugar->setLabel('Buscar por Lugares Populares');          
		
	    $tema_datos = models_Tema::findAll(true);
	    $temas = new Zend_Form_Element_MultiCheckbox('temas');
	    $temas->setLabel('Etiquetas de Tema populares')
	    			->setmultiOptions($tema_datos)
                   	->addValidator(new Zend_Validate_InArray(array_keys($tema_datos)))
                   	->setdecorators(array(
            						'Errors',
            						array('ViewScript', array('viewScript'=>'_forms/multicheckboxview.phtml'))));
		
	    $tema = new Zend_Form_Element_Text('etiquetatema');
	    $tema->setLabel('Etiquetas de Tema')
	    			->addValidator('stringLength', false, array(0, 255))
	                ->setAttribs(array('class'=>'w590h110','rows'=>'1','cols'=>'45'));
	    
	    $checktema = new Zend_Form_Element_Checkbox('checktema');    
	    $checktema->setLabel('Buscar por Temas Populares');

		
	    if($isAdmin)
	    {
		    $fotografos = array(''=>'-- Seleccione --');
			foreach (models_Usuario::findAll(false) as $k=>$v)
			{
				$fotografos[$v->id] = $v;
			}
			$usuario_id = new Zend_Form_Element_Select('usuario_id');
			$usuario_id->setLabel('Fotógrafo')
		    			->setmultiOptions($fotografos);

		    $this->addElement($usuario_id);
	    }
		    			
	    $fechainicial = new Zend_Form_Element_Text('fechainicial');
		$fechainicial->setLabel('Fecha Inicial');            

		$fechafinal = new Zend_Form_Element_Text('fechafinal');
		$fechafinal->setLabel('Fecha Final');
		
		$sesiones = array(''=>'-- Seleccione --');
		if ($isAdmin)
		{
			foreach (models_Sesion::findAll(false) as $k=>$v)
			{
				$sesiones[$v->id] = $v;
			}
			$sesion_id = new Zend_Form_Element_Select('sesion_id');
			$sesion_id->setLabel('Sesión de Fotos')
		    			->setmultiOptions($sesiones);		
		}
		else 
		{
			foreach (models_Sesion::findAllbyUsuario($session->uid, false) as $k=>$v)
			{
				$sesiones[$v->id] = $v;
			}
			$sesion_id = new Zend_Form_Element_Select('sesion_id');
			$sesion_id->setLabel('Sesión de Fotos')
		    			->setmultiOptions($sesiones);		
		}

		$cargas = array();
		foreach (models_Carga::findAllbyUser($session->uid, false) as $k=>$v)
		{
			$cantidad = models_Fotografia::countbyCarga($v->id);
			if ($cantidad > 0)
			{
				$cargas[$v->id] = $v. ' - Cantidad de Fotos: '.$cantidad;
			}
		}
		$carga_id = new Zend_Form_Element_Radio('carga_id');
		$carga_id->setLabel('Cargas');
		if (count($cargas))
		{
			$carga_id->setmultiOptions($cargas);
		}
		else 
		{
			$carga_id->addMultiOption('0','aún no ha realizado carga de fotografías');
		}
		
	
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Buscar');
	
		$this->addElements(array(
							$categoria_id,
							$subcategoria_id,
							$hidden_subcategoria_id,
							$checktema,
							$tema,
							$temas,
							$checklugar,
							$lugar,
							$lugares,
							$fechainicial,
							$fechafinal,
							$carga_id,							
							$sesion_id,
							$submit));
	}
}