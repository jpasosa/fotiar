<?php

/**
 * ConfSeguridad filter form base class.
 *
 * @package    Fotiar
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConfSeguridadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'min_letras'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'min_numeros'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'min_simbolos'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'simbolos'       => new sfWidgetFormFilterInput(),
      'largo_min'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'largo_max'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dias_caducidad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_by'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_by'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'deleted_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_by'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'min_letras'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'min_numeros'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'min_simbolos'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'simbolos'       => new sfValidatorPass(array('required' => false)),
      'largo_min'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'largo_max'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dias_caducidad' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_by'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deleted_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_by'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('conf_seguridad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfSeguridad';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'min_letras'     => 'Number',
      'min_numeros'    => 'Number',
      'min_simbolos'   => 'Number',
      'simbolos'       => 'Text',
      'largo_min'      => 'Number',
      'largo_max'      => 'Number',
      'dias_caducidad' => 'Number',
      'created_at'     => 'Date',
      'created_by'     => 'Number',
      'updated_at'     => 'Date',
      'updated_by'     => 'Number',
      'deleted_at'     => 'Date',
      'deleted_by'     => 'Number',
    );
  }
}
