<?php

/**
 * PedidoItem filter form base class.
 *
 * @package    Fotiar
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePedidoItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pedido_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pedido'), 'add_empty' => true)),
      'fotografia_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Fotografia'), 'add_empty' => true)),
      'precio'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comision'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'pedido_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pedido'), 'column' => 'id')),
      'fotografia_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Fotografia'), 'column' => 'id')),
      'precio'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'comision'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pedido_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PedidoItem';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'pedido_id'     => 'ForeignKey',
      'fotografia_id' => 'ForeignKey',
      'precio'        => 'Number',
      'comision'      => 'Number',
    );
  }
}
