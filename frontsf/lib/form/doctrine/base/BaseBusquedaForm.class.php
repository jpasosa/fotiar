<?php

/**
 * Busqueda form base class.
 *
 * @method Busqueda getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBusquedaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'usuario_id'      => new sfWidgetFormInputText(),
      'categoria_id'    => new sfWidgetFormInputText(),
      'subcategoria_id' => new sfWidgetFormInputText(),
      'preciomin'       => new sfWidgetFormInputText(),
      'preciomax'       => new sfWidgetFormInputText(),
      'fechainicial'    => new sfWidgetFormDateTime(),
      'fechafinal'      => new sfWidgetFormDateTime(),
      'etiquetalugar'   => new sfWidgetFormInputText(),
      'etiquetatema'    => new sfWidgetFormInputText(),
      'idetiquetalugar' => new sfWidgetFormInputText(),
      'idetiquetatema'  => new sfWidgetFormInputText(),
      'reviewed'        => new sfWidgetFormInputText(),
      'untagged'        => new sfWidgetFormInputText(),
      'sesion_id'       => new sfWidgetFormInputText(),
      'ordenbusqueda'   => new sfWidgetFormInputText(),
      'carga_id'        => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'created_by'      => new sfWidgetFormInputText(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'updated_by'      => new sfWidgetFormInputText(),
      'deleted_at'      => new sfWidgetFormDateTime(),
      'deleted_by'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'      => new sfValidatorInteger(array('required' => false)),
      'categoria_id'    => new sfValidatorInteger(array('required' => false)),
      'subcategoria_id' => new sfValidatorInteger(array('required' => false)),
      'preciomin'       => new sfValidatorNumber(array('required' => false)),
      'preciomax'       => new sfValidatorNumber(array('required' => false)),
      'fechainicial'    => new sfValidatorDateTime(array('required' => false)),
      'fechafinal'      => new sfValidatorDateTime(array('required' => false)),
      'etiquetalugar'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'etiquetatema'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'idetiquetalugar' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'idetiquetatema'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'reviewed'        => new sfValidatorInteger(array('required' => false)),
      'untagged'        => new sfValidatorInteger(array('required' => false)),
      'sesion_id'       => new sfValidatorInteger(array('required' => false)),
      'ordenbusqueda'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'carga_id'        => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'created_by'      => new sfValidatorInteger(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_by'      => new sfValidatorInteger(array('required' => false)),
      'deleted_at'      => new sfValidatorDateTime(array('required' => false)),
      'deleted_by'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('busqueda[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Busqueda';
  }

}
