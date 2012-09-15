<?php

/**
 * Sesion form base class.
 *
 * @method Sesion getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSesionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
      'usuario_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'created_at'  => new sfWidgetFormDateTime(),
      'created_by'  => new sfWidgetFormInputText(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'updated_by'  => new sfWidgetFormInputText(),
      'deleted_at'  => new sfWidgetFormDateTime(),
      'deleted_by'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'usuario_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'created_by'  => new sfValidatorInteger(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_by'  => new sfValidatorInteger(array('required' => false)),
      'deleted_at'  => new sfValidatorDateTime(array('required' => false)),
      'deleted_by'  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sesion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sesion';
  }

}
