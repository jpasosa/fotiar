<?php
class ShoppingCartItem
{
  private
    $quantity         = 0,
    $price            = 0,
    $discount         = 0,
    $obj            = '',
    $id               = 0,
    $parameter_holder = null;

  public function __construct($obj, $id)
  {
    $this->obj            = $obj;
    $this->id               = $id;
    $this->parameter_holder = new sfParameterHolder();
  }

public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getObj()
  {
    return $this->obj;
  }

  public function setObj($obj)
  {
    $this->class = $obj;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function getShoppingCart()
  {
    return $this->shopping_cart;
  }

  public function setShoppingCart($cart)
  {
    $this->shopping_cart = $cart;
  }

  public function getDiscount()
  {
    return $this->discount;
  }

  public function setDiscount($discount)
  {
    $this->discount = $discount;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }

  public function setQuantity($quantity)
  {
    if (!preg_match('~^\d+$~', $quantity))
    {
      $this->quantity = 1;
    }
    else
    {
      $this->quantity = $quantity;
    }
  }

  public function addQuantity($quantity)
  {
    $this->quantity += $quantity;
  }

  public function getParameterHolder()
  {
    return $this->parameter_holder;
  }

  public function getParameter($name, $default = null, $ns = null)
  {
    return $this->parameter_holder->get($name, $default, $ns);
  }

  public function hasParameter($name, $ns = null)
  {
    return $this->parameter_holder->has($name, $ns);
  }

  public function setParameter($name, $value, $ns = null)
  {
    return $this->parameter_holder->set($name, $value, $ns);
  }
}
