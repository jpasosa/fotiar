<?php

/**
 * Fotografia form base class.
 *
 * @method Fotografia getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFotografiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'descripcion'     => new sfWidgetFormTextarea(),
      'nombre_archivo'  => new sfWidgetFormInputText(),
      'camera'          => new sfWidgetFormInputText(),
      'model'           => new sfWidgetFormInputText(),
      'fstop'           => new sfWidgetFormInputText(),
      'exposuretime'    => new sfWidgetFormInputText(),
      'isospeed'        => new sfWidgetFormInputText(),
      'focallength'     => new sfWidgetFormInputText(),
      'taken'           => new sfWidgetFormDateTime(),
      'mimetype'        => new sfWidgetFormInputText(),
      'usuario_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'categoria_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'subcategoria_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subcategoria'), 'add_empty' => true)),
      'sesion_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sesion'), 'add_empty' => true)),
      'carga_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Carga'), 'add_empty' => true)),
      'precio'          => new sfWidgetFormInputText(),
      'reviewed'        => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'created_by'      => new sfWidgetFormInputText(),
      'updated_by'      => new sfWidgetFormInputText(),
      'deleted_at'      => new sfWidgetFormDateTime(),
      'deleted_by'      => new sfWidgetFormInputText(),
      'lugares_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Lugar')),
      'temas_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tema')),
      'profile_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUserProfile')),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'descripcion'     => new sfValidatorString(array('required' => false)),
      'nombre_archivo'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'camera'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'model'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fstop'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'exposuretime'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'isospeed'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'focallength'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'taken'           => new sfValidatorDateTime(array('required' => false)),
      'mimetype'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'usuario_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'categoria_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'required' => false)),
      'subcategoria_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Subcategoria'), 'required' => false)),
      'sesion_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sesion'), 'required' => false)),
      'carga_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Carga'), 'required' => false)),
      'precio'          => new sfValidatorNumber(array('required' => false)),
      'reviewed'        => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'created_by'      => new sfValidatorInteger(array('required' => false)),
      'updated_by'      => new sfValidatorInteger(array('required' => false)),
      'deleted_at'      => new sfValidatorDateTime(array('required' => false)),
      'deleted_by'      => new sfValidatorInteger(array('required' => false)),
      'lugares_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Lugar', 'required' => false)),
      'temas_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tema', 'required' => false)),
      'profile_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUserProfile', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fotografia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fotografia';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['lugares_list']))
    {
      $this->setDefault('lugares_list', $this->object->Lugares->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['temas_list']))
    {
      $this->setDefault('temas_list', $this->object->Temas->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['profile_list']))
    {
      $this->setDefault('profile_list', $this->object->Profile->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveLugaresList($con);
    $this->saveTemasList($con);
    $this->saveProfileList($con);

    parent::doSave($con);
  }

  public function saveLugaresList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['lugares_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Lugares->getPrimaryKeys();
    $values = $this->getValue('lugares_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Lugares', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Lugares', array_values($link));
    }
  }

  public function saveTemasList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['temas_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Temas->getPrimaryKeys();
    $values = $this->getValue('temas_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Temas', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Temas', array_values($link));
    }
  }

  public function saveProfileList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['profile_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Profile->getPrimaryKeys();
    $values = $this->getValue('profile_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Profile', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Profile', array_values($link));
    }
  }

}
