<?php

class myUser extends sfGuardSecurityUser
{
  public function isFirstRequest($boolean = null) {
    if (is_null($boolean)):
      return $this->getAttribute('first_request', true);
    endif;
   
    $this->setAttribute('first_request', $boolean);
  }

  
	public function getShoppingCart()	{
	  $pedido = Doctrine_Query::create()
	   ->from('Pedido p')
	   ->addWhere('p.user_id = ?', $this->getGuardUser()->id)
	   ->addWhere('p.status = ?', 'draft')
	   ->fetchOne();
		if(!$pedido):
		  $pedido = new Pedido();
		  $pedido->setUser($this->getGuardUser());
		  $pedido->setExternalReference($this->getGuardUser()->id.'-'.time());
		  $pedido->save();
		endif;
		
		return $pedido;
	}
	
	
  public function emptyCart() {

  }
  
  /*
  public function recordSearchParams($params) {
    $this->setAttribute('search_params', $params);
  }
  
  
  public function getSearchParams($params) {
    $this->getAttribute('search_params', array());
  }*/
}