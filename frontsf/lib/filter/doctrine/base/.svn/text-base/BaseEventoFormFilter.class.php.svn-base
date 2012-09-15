<?php

/**
 * Evento filter form base class.
 *
 * @package    Fotiar
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEventoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'caption'           => new sfWidgetFormFilterInput(),
      'nombre_archivo_es' => new sfWidgetFormFilterInput(),
      'nombre_archivo_pt' => new sfWidgetFormFilterInput(),
      'nombre_archivo_en' => new sfWidgetFormFilterInput(),
      'nombre_icono'      => new sfWidgetFormFilterInput(),
      'categoria_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'subcategoria_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subcategoria'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'        => new sfWidgetFormFilterInput(),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_by'        => new sfWidgetFormFilterInput(),
      'deleted_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'deleted_by'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'caption'           => new sfValidatorPass(array('required' => false)),
      'nombre_archivo_es' => new sfValidatorPass(array('required' => false)),
      'nombre_archivo_pt' => new sfValidatorPass(array('required' => false)),
      'nombre_archivo_en' => new sfValidatorPass(array('required' => false)),
      'nombre_icono'      => new sfValidatorPass(array('required' => false)),
      'categoria_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'id')),
      'subcategoria_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Subcategoria'), 'column' => 'id')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deleted_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('evento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Evento';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'caption'           => 'Text',
      'nombre_archivo_es' => 'Text',
      'nombre_archivo_pt' => 'Text',
      'nombre_archivo_en' => 'Text',
      'nombre_icono'      => 'Text',
      'categoria_id'      => 'ForeignKey',
      'subcategoria_id'   => 'ForeignKey',
      'created_at'        => 'Date',
      'created_by'        => 'Number',
      'updated_at'        => 'Date',
      'updated_by'        => 'Number',
      'deleted_at'        => 'Date',
      'deleted_by'        => 'Number',
    );
  }
}
