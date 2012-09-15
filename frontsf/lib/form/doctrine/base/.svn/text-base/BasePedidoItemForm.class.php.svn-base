<?php

/**
 * PedidoItem form base class.
 *
 * @method PedidoItem getObject() Returns the current form's model object
 *
 * @package    Fotiar
 * @subpackage form
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePedidoItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'pedido_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pedido'), 'add_empty' => false)),
      'fotografia_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Fotografia'), 'add_empty' => false)),
      'precio'        => new sfWidgetFormInputText(),
      'comision'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'pedido_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pedido'))),
      'fotografia_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Fotografia'))),
      'precio'        => new sfValidatorNumber(),
      'comision'      => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('pedido_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PedidoItem';
  }

}
