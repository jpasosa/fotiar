<?php

/**
 * Usuario filter form base class.
 *
 * @package    Fotiar
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contrasena'            => new sfWidgetFormFilterInput(),
      'contrasena_updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'nombre'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo'                => new sfWidgetFormFilterInput(),
      'precio'                => new sfWidgetFormFilterInput(),
      'rol_id'                => new sfWidgetFormChoice(array('choices' => array('' => '', 'admin' => 'admin', 'fotografo' => 'fotografo'))),
      'comision'              => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'            => new sfWidgetFormFilterInput(),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_by'            => new sfWidgetFormFilterInput(),
      'deleted_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'deleted_by'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario'               => new sfValidatorPass(array('required' => false)),
      'contrasena'            => new sfValidatorPass(array('required' => false)),
      'contrasena_updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'nombre'                => new sfValidatorPass(array('required' => false)),
      'apellido'              => new sfValidatorPass(array('required' => false)),
      'correo'                => new sfValidatorPass(array('required' => false)),
      'precio'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'rol_id'                => new sfValidatorChoice(array('required' => false, 'choices' => array('admin' => 'admin', 'fotografo' => 'fotografo'))),
      'comision'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_by'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deleted_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_by'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'usuario'               => 'Text',
      'contrasena'            => 'Text',
      'contrasena_updated_at' => 'Date',
      'nombre'                => 'Text',
      'apellido'              => 'Text',
      'correo'                => 'Text',
      'precio'                => 'Number',
      'rol_id'                => 'Enum',
      'comision'              => 'Number',
      'created_at'            => 'Date',
      'created_by'            => 'Number',
      'updated_at'            => 'Date',
      'updated_by'            => 'Number',
      'deleted_at'            => 'Date',
      'deleted_by'            => 'Number',
    );
  }
}
