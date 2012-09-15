<?php
class userComponents extends sfComponents
{
  public function executeLoginBox(sfWebRequest $request)
  {
    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
    $this->form = new $class();
    if($this->getUser()->isAuthenticated()){
      $this->cart = $this->getUser()->getShoppingCart();
    }
  }
}