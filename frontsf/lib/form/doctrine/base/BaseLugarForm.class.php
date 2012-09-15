<?php

/**
 * Lugar form base class.
 *
 * @method Lugar getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLugarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'descripcion'      => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'created_by'       => new sfWidgetFormInputText(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'updated_by'       => new sfWidgetFormInputText(),
      'deleted_at'       => new sfWidgetFormDateTime(),
      'deleted_by'       => new sfWidgetFormInputText(),
      'fotografias_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Fotografia')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion'      => new sfValidatorString(array('max_length' => 255)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'created_by'       => new sfValidatorInteger(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_by'       => new sfValidatorInteger(array('required' => false)),
      'deleted_at'       => new sfValidatorDateTime(array('required' => false)),
      'deleted_by'       => new sfValidatorInteger(array('required' => false)),
      'fotografias_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Fotografia', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lugar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lugar';
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
