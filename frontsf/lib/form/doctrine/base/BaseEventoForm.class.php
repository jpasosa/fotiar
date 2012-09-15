<?php

/**
 * Evento form base class.
 *
 * @method Evento getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEventoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'caption'           => new sfWidgetFormInputText(),
      'nombre_archivo_es' => new sfWidgetFormInputText(),
      'nombre_archivo_pt' => new sfWidgetFormInputText(),
      'nombre_archivo_en' => new sfWidgetFormInputText(),
      'nombre_icono'      => new sfWidgetFormInputText(),
      'categoria_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'subcategoria_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subcategoria'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormDateTime(),
      'created_by'        => new sfWidgetFormInputText(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'updated_by'        => new sfWidgetFormInputText(),
      'deleted_at'        => new sfWidgetFormDateTime(),
      'deleted_by'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'caption'           => new sfValidatorPass(array('required' => false)),
      'nombre_archivo_es' => new sfValidatorPass(array('required' => false)),
      'nombre_archivo_pt' => new sfValidatorPass(array('required' => false)),
      'nombre_archivo_en' => new sfValidatorPass(array('required' => false)),
      'nombre_icono'      => new sfValidatorPass(array('required' => false)),
      'categoria_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'required' => false)),
      'subcategoria_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Subcategoria'), 'required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'created_by'        => new sfValidatorInteger(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_by'        => new sfValidatorInteger(array('required' => false)),
      'deleted_at'        => new sfValidatorDateTime(array('required' => false)),
      'deleted_by'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('evento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Evento';
  }

}
