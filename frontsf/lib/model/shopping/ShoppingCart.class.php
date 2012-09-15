<?php

class ShoppingCart
{
	protected $items = array();
	protected $orderId = null;
	
	public function getItem($id)
	{
		$ind = $this->getItemIndice($id);
		
		return (($ind !== null)) ? $this->items[$ind] : null;
	}
	
	public function getItemIndice($id)
	{
    $ind = null;

    foreach ($this->items as $key => $item)
    {
      if ($item->getId() == $id)
      {
        $ind = $key;
        break;
      }
    }

    return $ind;
	}
	
  public function addItem($item)
  {
    $existingItem = $this->getItem($item->getId());
    if ($existingItem)
    {
      $existingItem->addQuantity($item->getQuantity());
    }
    else
    {
      $this->items[] = $item;
    }
  }

  public function deleteItem($id)
  {
    foreach (array_keys($this->items) as $i)
    {
      if ($this->items[$i]->getId() == $id)
      {
        unset($this->items[$i]);
      }
    }
  }

  public function getOrderId()
  {
    return $this->orderId;
  }

  public function setOrderId($order)
  {
    $this->orderId = $order;
  }

  public function getTotal()
  {
    $total_ht = 0;

    foreach ($this->getItems() as $item)
    {
      $total_ht += $item->getQuantity() * $item->getPrice() * (1 - $item->getDiscount() / 100);
    }

    return $total_ht;
  }

  public function getItems()
  {
    $items = array();
    foreach ($this->items as $item)
    {
      if ($item->getQuantity() != 0)
      {
        $items[] = $item;
      }
    }

    return $items;
  }

  public function getNbItems($countQuantities = false)
  {
    if ($countQuantities)
    {
      $itemCount = 0;
      foreach ($this->items as $item)
      {
        $itemCount += $item->getQuantity();
      }

      return $itemCount;
    }

    return count($this->getItems());
  }

  public function isEmpty()
  {
    return ($this->getNbItems() ? false : true);
  }

  public function clear()
  {
    $this->items = array();
  }
}