<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'usuario'               => new sfWidgetFormInputText(),
      'contrasena'            => new sfWidgetFormInputText(),
      'contrasena_updated_at' => new sfWidgetFormDateTime(),
      'nombre'                => new sfWidgetFormInputText(),
      'apellido'              => new sfWidgetFormInputText(),
      'correo'                => new sfWidgetFormInputText(),
      'precio'                => new sfWidgetFormInputText(),
      'rol_id'                => new sfWidgetFormChoice(array('choices' => array('admin' => 'admin', 'fotografo' => 'fotografo'))),
      'comision'              => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'created_by'            => new sfWidgetFormInputText(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'updated_by'            => new sfWidgetFormInputText(),
      'deleted_at'            => new sfWidgetFormDateTime(),
      'deleted_by'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contrasena'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contrasena_updated_at' => new sfValidatorDateTime(array('required' => false)),
      'nombre'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellido'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'correo'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'precio'                => new sfValidatorNumber(array('required' => false)),
      'rol_id'                => new sfValidatorChoice(array('choices' => array(0 => 'admin', 1 => 'fotografo'), 'required' => false)),
      'comision'              => new sfValidatorNumber(array('required' => false)),
      'created_at'            => new sfValidatorDateTime(array('required' => false)),
      'created_by'            => new sfValidatorInteger(array('required' => false)),
      'updated_at'            => new sfValidatorDateTime(array('required' => false)),
      'updated_by'            => new sfValidatorInteger(array('required' => false)),
      'deleted_at'            => new sfValidatorDateTime(array('required' => false)),
      'deleted_by'            => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}
