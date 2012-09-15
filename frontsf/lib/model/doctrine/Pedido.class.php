<?php

/**
 * Pedido
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Fotiar
 * @subpackage model
 * @author     Danilo R. Frid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Pedido extends BasePedido
{
  public function getItemsSorted() {
    $q = Doctrine_Query::create()
      ->from('PedidoItem pi')
      ->addWhere('pi.pedido_id = ?', $this->id)
      ->orderBy('pi.id desc');
    
    return $q->execute();
  }

  
  public function getTotal() {
    $total = 0;
    foreach($this->getItems() as $item):
      $total += $item->getPrecio();
    endforeach;
    return $total;
  }

  
  public function hasItem($fotoId) {
    foreach($this->getItems() as $item):
      if($fotoId == $item->getFotografiaId()):
        return true;
      endif;
    endforeach;
    return false;
  }
  
  
  public function addItem(Fotografia $foto) {
    if(!$this->hasItem($foto->getId())):
      $item = new PedidoItem();
      $item->setFotografiaId($foto->getId());
      $item->setPrecio($foto->getPrecio());
      $item->setComision($foto->getUsuario()->getComision());
      $item->setPedido($this);
      $item->save();
      
      $this->refresh(true);
    endif;
  }
  
  
  public function deleteItem($itemId) {
    foreach($this->getItems() as $item):
      if($itemId == $item->getId()):
        $item->delete();
      endif;
    endforeach;
    
    $this->refresh(true);
  }
}