<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @method sfGuardUserProfile getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'email_new'        => new sfWidgetFormInputText(),
      'firstname'        => new sfWidgetFormInputText(),
      'lastname'         => new sfWidgetFormInputText(),
      'validate_at'      => new sfWidgetFormDateTime(),
      'validate'         => new sfWidgetFormInputText(),
      'country'          => new sfWidgetFormInputText(),
      'city'             => new sfWidgetFormInputText(),
      'address'          => new sfWidgetFormInputText(),
      'phone'            => new sfWidgetFormInputText(),
      'birthdate'        => new sfWidgetFormDateTime(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'fotografias_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Fotografia')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'email_new'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'firstname'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lastname'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'validate_at'      => new sfValidatorDateTime(array('required' => false)),
      'validate'         => new sfValidatorString(array('max_length' => 33, 'required' => false)),
      'country'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'birthdate'        => new sfValidatorDateTime(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'fotografias_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Fotografia', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('user_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('email_new'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['fotografias_list']))
    {
      $this->setDefault('fotografias_list', $this->object->Fotografias->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveFotografiasList($con);

    parent::doSave($con);
  }

  public function saveFotografiasList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['fotografias_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Fotografias->getPrimaryKeys();
    $values = $this->getValue('fotografias_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Fotografias', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Fotografias', array_values($link));
    }
  }

}
