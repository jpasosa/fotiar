<?php

/**
 * @package    Fotiar
 * @author     Danilo R. Frid
 */
class PostalForm extends BaseForm
{
  public function configure() {
    $this->setWidgets(array(
      'nombre'  => new sfWidgetFormInputText(),
      'email'   => new sfWidgetFormInputText(),
      'mensaje' => new sfWidgetFormTextarea(),
    ));

    $this->widgetSchema->setNameFormat('postal[%s]');
    
    // TODO: incluir I18N
    $this->setValidators(array(
      'nombre'   => new sfValidatorString(array(), array('required' => 'Debes ingresar un nombre')),
      'email'    => new sfValidatorEmail(array(), array('required' => 'Debes ingresar un email', 'invalid' => 'El email que ingresaste no es válido')),
      'mensaje'  => new sfValidatorString(array(), array('required' => 'Debes ingresar un mensaje')),
    ));
    
    $this->widgetSchema->setFormFormatterName('list');
  }
}