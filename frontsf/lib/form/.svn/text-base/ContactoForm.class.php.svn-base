<?php

/**
 * @package    Fotiar
 * @author     Danilo R. Frid
 */
class ContactoForm extends BaseForm
{
  public function configure() {
    $this->setWidgets(array(
      'nombre'   => new sfWidgetFormInputText(),
      'telefono' => new sfWidgetFormInputText(),
      'email'    => new sfWidgetFormInputText(),
      'mensaje'  => new sfWidgetFormTextarea(),
    ));

    $this->widgetSchema->setNameFormat('contacto[%s]');
    
    // TODO: incluir I18N
    $this->setValidators(array(
      'nombre'   => new sfValidatorString(array(), array('required' => 'Debes ingresar tu nombre')),
      'telefono' => new sfValidatorString(array(), array('required' => 'Debes ingresar tu teléfono')),
      'email'    => new sfValidatorEmail(array(), array('required' => 'Debes ingresar tu email', 'invalid' => 'El email que ingresaste no es válido')),
      'mensaje'  => new sfValidatorString(array(), array('required' => 'Debes ingresar un mensaje')),
    ));
    
    $this->widgetSchema->setFormFormatterName('list');
  }
}