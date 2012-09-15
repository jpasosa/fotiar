<?php

/**
 * Busqueda filter form base class.
 *
 * @package    Fotiar
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBusquedaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'      => new sfWidgetFormFilterInput(),
      'categoria_id'    => new sfWidgetFormFilterInput(),
      'subcategoria_id' => new sfWidgetFormFilterInput(),
      'preciomin'       => new sfWidgetFormFilterInput(),
      'preciomax'       => new sfWidgetFormFilterInput(),
      'fechainicial'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fechafinal'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'etiquetalugar'   => new sfWidgetFormFilterInput(),
      'etiquetatema'    => new sfWidgetFormFilterInput(),
      'idetiquetalugar' => new sfWidgetFormFilterInput(),
      'idetiquetatema'  => new sfWidgetFormFilterInput(),
      'reviewed'        => new sfWidgetFormFilterInput(),
      'untagged'        => new sfWidgetFormFilterInput(),
      'sesion_id'       => new sfWidgetFormFilterInput(),
      'ordenbusqueda'   => new sfWidgetFormFilterInput(),
      'carga_id'        => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'      => new sfWidgetFormFilterInput(),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_by'      => new sfWidgetFormFilterInput(),
      'deleted_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'deleted_by'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'usuario_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'categoria_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subcategoria_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'preciomin'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'preciomax'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fechainicial'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fechafinal'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'etiquetalugar'   => new sfValidatorPass(array('required' => false)),
      'etiquetatema'    => new sfValidatorPass(array('required' => false)),
      'idetiquetalugar' => new sfValidatorPass(array('required' => false)),
      'idetiquetatema'  => new sfValidatorPass(array('required' => false)),
      'reviewed'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'untagged'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sesion_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ordenbusqueda'   => new sfValidatorPass(array('required' => false)),
      'carga_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_by'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deleted_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_by'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('busqueda_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Busqueda';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'usuario_id'      => 'Number',
      'categoria_id'    => 'Number',
      'subcategoria_id' => 'Number',
      'preciomin'       => 'Number',
      'preciomax'       => 'Number',
      'fechainicial'    => 'Date',
      'fechafinal'      => 'Date',
      'etiquetalugar'   => 'Text',
      'etiquetatema'    => 'Text',
      'idetiquetalugar' => 'Text',
      'idetiquetatema'  => 'Text',
      'reviewed'        => 'Number',
      'untagged'        => 'Number',
      'sesion_id'       => 'Number',
      'ordenbusqueda'   => 'Text',
      'carga_id'        => 'Number',
      'created_at'      => 'Date',
      'created_by'      => 'Number',
      'updated_at'      => 'Date',
      'updated_by'      => 'Number',
      'deleted_at'      => 'Date',
      'deleted_by'      => 'Number',
    );
  }
}
