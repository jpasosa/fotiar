<?php

/**
 * Search form.
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 */
class SearchForm extends BaseForm
{
  // TODO: incluir I18N
  public function configure() {
//    $this->widgetSchema['categoria_id'] = new sfWidgetFormDoctrineChoice(array(
//      'model'     => 'Categoria',
//      'method'    => 'getDescripcion',
//      'add_empty' => 'Seleccione una categoría...'));
//    $this->validatorSchema['categoria_id'] = new sfValidatorDoctrineChoice(array(
//      'model'    => 'Categoria',
//      'required' => false));
//    $this->widgetSchema['subcategoria_id'] = new sfWidgetFormDoctrineChoice(array(
//      'model'     => 'subcategoria',
//      'method'    => 'getDescripcion',
//      'add_empty' => 'Seleccione una subcategoría...'));
//    $this->validatorSchema['subcategoria_id'] = new sfValidatorDoctrineChoice(array(
//      'model'    => 'subcategoria',
//      'required' => false));

    
    // categoria_id
    $this->widgetSchema['categoria_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'        => 'categoria',
      'method'       => 'getDescripcion',
      'table_method' => 'retrieveAllNotDeleted',
      'add_empty'    => 'Seleccione una categoría...',
    ));

    $this->validatorSchema['categoria_id'] = new sfValidatorDoctrineChoice(array(
      'model'    => 'categoria',
      'required' => false
    ));
    
    
    // subcategoria_id    
    $this->widgetSchema['subcategoria_id'] = new sfWidgetFormDoctrineDependentSelect(array(
      'model'        => 'subcategoria',
      'method'       => 'getDescripcion',
      'depends'      => 'Categoria',
      'table_method' => 'retrieveAllNotDeleted',
      'add_empty'    => 'Seleccione una subcategoría...',
    ));

    $this->validatorSchema['subcategoria_id'] = new sfValidatorDoctrineChoice(array(
      'model'    => 'subcategoria',
      'required' => false
    ));
    
    // always the selects order has to be according to the dependency.
//    $this->widgetSchema->moveField('subcategoria_id', 'after', 'categoria_id');

        
    // tema_id
    $this->widgetSchema['tema_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'        => 'Tema',
      'table_method' => 'retrieveAllNotDeleted',
      'multiple'     => true
    ));

    $this->validatorSchema['tema_id'] = new sfValidatorDoctrineChoice(array(
      'model'    => 'Tema',
      'required' => false,
			'multiple' => true
    ));

    // lugar_id
	  $this->widgetSchema['lugar_id'] = new sfWidgetFormDoctrineChoice(array(
	    'model'        => 'Lugar',
      'table_method' => 'retrieveAllNotDeleted',
	    'multiple'     => true,
			'method'       => 'getDescripcion'
	  ));

	  $this->validatorSchema['lugar_id'] = new sfValidatorDoctrineChoice(array(
	    'model'    => 'Lugar',
	    'required' => false,
			'multiple' => true
	  ));
/*
    $this->widgetSchema['etiqueta_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'            => 'Tema',
      'renderer_class'   => 'sfWidgetFormDoctrineJQueryAutocompleter',
      'renderer_options' => array(
        'model' => 'Tema',
        'url'   => 'autocompletarEtiquetas')
    ));

    $this->validatorSchema['etiqueta_id'] = new sfValidatorDoctrineChoice(array(
      'model'    => 'Tema',
      'required' => false
    ));
*/
    
    // sesion
    $this->widgetSchema['sesion'] = new sfWidgetFormInput();
    $this->validatorSchema['sesion'] = new sfValidatorPass(array());
    $this->setDefault('sesion', 'Complete sesión asignada...');
    
    // usuario_id
    $this->widgetSchema['usuario_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'        => 'Usuario',
      'method'       => 'getNombreCompleto',
      'table_method' => 'retrieveFotogrofos',
      'add_empty'    => 'Seleccione Fotógrafo'
    ));
    
    $this->validatorSchema['usuario_id'] = new sfValidatorDoctrineChoice(array(
      'model'    => 'Usuario',
      'required' => false
    ));
    
    
    // fechas
    $years = range(2000, date('Y'));
    
    $widget_from = new sfWidgetFormDate(array(
      'format' => '%day%%month%%year%',
      'years' => array_combine($years, $years)
    ));
    $widget_to = new sfWidgetFormDate(array(
      'format' => '%day%%month%%year%',
      'years' => array_combine($years, $years)
    ));
    
    $this->widgetSchema['fechas'] = new sfWidgetFormDateRange(array(
      'from_date' => $widget_from,
      'to_date'   => $widget_to,
      'template'  => '<div>Desde: %from_date%</div><div>Hasta: %to_date%</div>',
    ));

    $this->setDefault('fechas', array(
      'from' => array('day' => 1, 'month' => 1, 'year' => 2000),
      'to'   => array('day' => date('j'), 'month' => date('n'), 'year' => date('Y'))
    ));
    
    
//    $this->widgetSchema['fechas'] = new sfWidgetFormDateRange(array(
//      'from_date' => new sfWidgetFormDate(array(
//        'format' => '%day%/%month%/%year%')),
//      'to_date'   => new sfWidgetFormDate(array(
//        'format' => '%day%/%month%/%year%',
//        'can_be_empty' => true,
//        'empty_values' => array('year'=>'h', 'month'=>'e', 'day'=>'z'),
//        'default' => false)),
//      'template'  => '<div>Desde: %from_date%</div><div>Hasta: %to_date%</div>',
//    ));
    
    $this->validatorSchema['fechas'] = new sfValidatorDateRange(array(
      'from_date' => new sfValidatorDate(array('required'  => false)),
      'to_date'   => new sfValidatorDate(array('required'  => false)),
    ));
    
//    $this->setDefault('fechas_from_day', '');

    
    $this->widgetSchema->setNameFormat('busqueda[%s]');
  }
}