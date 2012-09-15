<?php

/**
 * ConfSeguridad form base class.
 *
 * @method ConfSeguridad getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConfSeguridadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'min_letras'     => new sfWidgetFormInputText(),
      'min_numeros'    => new sfWidgetFormInputText(),
      'min_simbolos'   => new sfWidgetFormInputText(),
      'simbolos'       => new sfWidgetFormInputText(),
      'largo_min'      => new sfWidgetFormInputText(),
      'largo_max'      => new sfWidgetFormInputText(),
      'dias_caducidad' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'created_by'     => new sfWidgetFormInputText(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'updated_by'     => new sfWidgetFormInputText(),
      'deleted_at'     => new sfWidgetFormDateTime(),
      'deleted_by'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'min_letras'     => new sfValidatorInteger(array('required' => false)),
      'min_numeros'    => new sfValidatorInteger(array('required' => false)),
      'min_simbolos'   => new sfValidatorInteger(array('required' => false)),
      'simbolos'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'largo_min'      => new sfValidatorInteger(array('required' => false)),
      'largo_max'      => new sfValidatorInteger(array('required' => false)),
      'dias_caducidad' => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'created_by'     => new sfValidatorInteger(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_by'     => new sfValidatorInteger(array('required' => false)),
      'deleted_at'     => new sfValidatorDateTime(array('required' => false)),
      'deleted_by'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('conf_seguridad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfSeguridad';
  }

}
