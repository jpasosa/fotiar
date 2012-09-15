<?php

/**
 * sfGuardUserProfileFotografia filter form base class.
 *
 * @package    Fotiar
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileFotografiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fotografia_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Fotografia'), 'add_empty' => true)),
      'sf_guard_user_profile_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SfGuardUserProfile'), 'add_empty' => true)),
      'status'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'favorita' => 'favorita', 'papelera' => 'papelera'))),
    ));

    $this->setValidators(array(
      'fotografia_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Fotografia'), 'column' => 'id')),
      'sf_guard_user_profile_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SfGuardUserProfile'), 'column' => 'id')),
      'status'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('favorita' => 'favorita', 'papelera' => 'papelera'))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_fotografia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfileFotografia';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'fotografia_id'            => 'ForeignKey',
      'sf_guard_user_profile_id' => 'ForeignKey',
      'status'                   => 'Enum',
    );
  }
}
