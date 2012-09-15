<?php

/**
 * BasePedidoItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $pedido_id
 * @property integer $fotografia_id
 * @property float $precio
 * @property float $comision
 * @property Pedido $Pedido
 * @property Fotografia $Fotografia
 * 
 * @method integer    getPedidoId()      Returns the current record's "pedido_id" value
 * @method integer    getFotografiaId()  Returns the current record's "fotografia_id" value
 * @method float      getPrecio()        Returns the current record's "precio" value
 * @method float      getComision()      Returns the current record's "comision" value
 * @method Pedido     getPedido()        Returns the current record's "Pedido" value
 * @method Fotografia getFotografia()    Returns the current record's "Fotografia" value
 * @method PedidoItem setPedidoId()      Sets the current record's "pedido_id" value
 * @method PedidoItem setFotografiaId()  Sets the current record's "fotografia_id" value
 * @method PedidoItem setPrecio()        Sets the current record's "precio" value
 * @method PedidoItem setComision()      Sets the current record's "comision" value
 * @method PedidoItem setPedido()        Sets the current record's "Pedido" value
 * @method PedidoItem setFotografia()    Sets the current record's "Fotografia" value
 * 
 * @package    Fotiar
 * @subpackage model
 * @author     Danilo R. Frid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePedidoItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pedido_item');
        $this->hasColumn('pedido_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('fotografia_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('precio', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
        $this->hasColumn('comision', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Pedido', array(
             'local' => 'pedido_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasOne('Fotografia', array(
             'local' => 'fotografia_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}