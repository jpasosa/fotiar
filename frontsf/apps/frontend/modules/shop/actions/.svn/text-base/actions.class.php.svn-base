<?php
class shopActions extends sfActions
{
  public function executeMyCart(sfWebRequest $request) {
		$this->cart = $this->getUser()->getShoppingCart();
	}

	
  public function executeCheckOut(sfWebRequest $request) {
    $this->cart = $this->getUser()->getShoppingCart();
    if(count($this->cart->getItems()) == 0):
      $this->redirect('@shop');
    endif;
    try {
    	$authService = new AuthService();
    	$accessData= $authService->create_access_data('3269','6U6duA3QCnkcbfMF5ijQbw9HFbzXj5IA');
    	unset($authService);
    	if(gettype($accessData)=='string'):
		     throw new exception($checkoutPreference);
		  else: 
        $checkoutPreferenceData = $this->getPreferenceValues($this->cart);
      	$checkoutService = new CheckoutService();
        $checkoutPreference = $checkoutService->create_checkout_preference($checkoutPreferenceData, $accessData->getAccessToken());
      	unset($checkoutService);
      	unset($accessData);
  
      	if(gettype($checkoutPreference)=='string'):
  		    throw new exception($checkoutPreference);
  		  endif;
        //unset($checkoutPreference);
		  endif;
    }
    catch (Exception $e) {
     	echo $e->getMessage();
    }

    $this->prefId = $checkoutPreference->getId();
    $this->cart->setPreference_id($this->prefId);
    $this->cart->save();
  }

  
  function getPreferenceValues($cart) {
  	$checkoutPreferenceDataPayer = new CheckoutPreferenceDataPayer(); 
  	$checkoutPreferenceDataPayer->setName($this->getUser()->getGuardUser()->getFirstName());
  	$checkoutPreferenceDataPayer->setSurname($this->getUser()->getGuardUser()->getLastName());
  	$checkoutPreferenceDataPayer->setEmail($this->getUser()->getGuardUser()->getEmailAddress());

    $checkoutPreferenceDataBackUrls = new CheckoutPreferenceDataBackUrls();
//  	$checkoutPreferenceDataBackUrls->setSuccessUrl("http://fotiarfront.cooph.com.ar/frontend_dev.php/es/shop/pago-aceptado");
//  	$checkoutPreferenceDataBackUrls->setPendingUrl("http://fotiarfront.cooph.com.ar/frontend_dev.php/es/shop/pago-pendiente");
    $checkoutPreferenceDataBackUrls->setSuccessUrl("http://www.fotiar.com.ar/es/shop/pago-aceptado");
    $checkoutPreferenceDataBackUrls->setPendingUrl("http://www.fotiar.com.ar/es/shop/pago-pendiente");
//    $checkoutPreferenceDataBackUrls->setSuccessUrl("http://fotiar.com:8888/frontend_dev.php/es/shop/pago-aceptado");
//    $checkoutPreferenceDataBackUrls->setPendingUrl("http://fotiar.com:8888/frontend_dev.php/es/shop/pago-pendiente");

  	$checkoutPreferenceDataPaymentMethods = new CheckoutPreferenceDataPaymentMethods(); 

  	foreach(array('ticket','bank_transfer','atm') as $paymentMethod):
    	$checkoutPreferenceDataExcludedPaymentTypes = new CheckoutPreferenceDataExcludedPaymentTypes(); 
    	$checkoutPreferenceDataExcludedPaymentTypes->setExcludedPaymentTypesId($paymentMethod);
    	$checkoutPreferenceDataPaymentMethods->setExcludedPaymentTypes($checkoutPreferenceDataExcludedPaymentTypes);	
    	unset($checkoutPreferenceDataPaymentTypes);
  	endforeach;

  	$checkoutPreferenceData = new CheckoutPreferenceData(); 
  	$checkoutPreferenceData->setExternalReference($cart->getExternal_reference());
    $checkoutPreferenceData->setExpires(false);
    
    $items = $cart->getItems();
    
    foreach($items as $item):
      $checkoutPreferenceDataItems = new CheckoutPreferenceDataItems();
//      $checkoutPreferenceDataItems->setItemsId($item->id); // OPCIONAL
//      $checkoutPreferenceDataItems->setTitle(count($items).' fotografías');
//      $checkoutPreferenceDataItems->setTitle($item->getFotografia()->getNombreArchivo());
      $checkoutPreferenceDataItems->setTitle('Fotos');
//      $checkoutPreferenceDataItems->setDescription($item->getFotografia()->getDescripcion()); // OPCIONAL
      $checkoutPreferenceDataItems->setQuantity(1);
      $checkoutPreferenceDataItems->setUnitPrice((float)$item->getFotografia()->getPrecio());
      $checkoutPreferenceDataItems->setCurrencyId('ARS');
//      $checkoutPreferenceDataItems->setPictureUrl(sfConfig::get('sf_web_dir').$item->getFotografia()->getThumbSrc('search-zoom')); // OPCIONAL
      $checkoutPreferenceData->setItems($checkoutPreferenceDataItems);
    endforeach;

  	$checkoutPreferenceData->setPayer($checkoutPreferenceDataPayer);	
  	$checkoutPreferenceData->setBackUrls($checkoutPreferenceDataBackUrls);
  	$checkoutPreferenceData->setPaymentMethods($checkoutPreferenceDataPaymentMethods);

  	return $checkoutPreferenceData;
  }	
	
  
  public function executePagoAceptado(sfWebRequest $request) {
//    $pedido = $this->getUser()->getShoppingCart();
    if($request->hasParameter('external_reference')):
      $pedido = Doctrine::getTable('Pedido')->findOneBy('external_reference', $request->getParameter('external_reference'));
//    if(count($pedido->getItems())>0):
      $pedido->setStatus('stable');
      $pedido->setIsPagado(1);
      $pedido->save();
      return $this->renderText("OK");
    else:
      $this->redirect('@homepage');
    endif;
  }

  
  public function executePagoAceptadoRta(sfWebRequest $request) {

  }
  
  
  public function executePagoPendiente(sfWebRequest $request) {
//    $pedido = $this->getUser()->getShoppingCart();
    if($request->hasParameter('external_reference')):
      $pedido = Doctrine::getTable('Pedido')->findOneBy('external_reference', $request->getParameter('external_reference'));
//    if(count($pedido->getItems())>0):
      $pedido->setStatus('stable');
      $pedido->save();
      return $this->renderText("OK");
    else:
      $this->redirect('@homepage');
    endif;
  }
  
  
  public function executePagoPendienteRta(sfWebRequest $request) {

  }
  
  
  public function executeAddCartItem(sfWebRequest $request) {
    if ($request->hasParameter('id'))
    {
      $this->id = $request->getParameter('id');
      $foto = Doctrine::getTable('Fotografia')->findOneById($this->id);
      
      $this->id = $request->getParameter('id');
      $foto = Doctrine::getTable('Fotografia')->findOneById($this->id);

      $shopping_cart = $this->getUser()->getShoppingCart();
      $shopping_cart->addItem($foto);

      self::registrarCambiosFavorita($request->getParameter('id'));
      
      $this->cart = $shopping_cart;
    }
  }

  
  public function executeAddCartItemFromLightbox(sfWebRequest $request) {
    if ($request->hasParameter('id'))
    {
      $this->id = $request->getParameter('id');
      $foto = Doctrine::getTable('Fotografia')->findOneById($this->id);

      $shopping_cart = $this->getUser()->getShoppingCart();
      $shopping_cart->addItem($foto);

      self::registrarCambiosFavorita($request->getParameter('id'));
      
      $this->cart = $shopping_cart;
    }
  }
  
  
  public function executeDeleteCartItem(sfWebRequest $request) {
    if ($request->hasParameter('id')):
      $this->shopping_cart = $this->getUser()->getShoppingCart();
      $this->shopping_cart->deleteItem($request->getParameter('id'));
    endif;
  }
  
  
  private function registrarCambiosFavorita($id) {
    $user_id = $this->getUser()->getGuardUser()->getProfile()->id;
    
    $favorita_existente = Doctrine_Query::create()
      ->from('sfGuardUserProfileFotografia')
      ->addWhere('sf_guard_user_profile_id = ?', $user_id)
      ->addWhere('fotografia_id = ?', $id)
      ->fetchOne();
    if($favorita_existente)
    {  
//      $favorita_existente->setStatus('carrito'); // 3?
//      $favorita_existente->save();
    }
    else
    {
      $favorita = new sfGuardUserProfileFotografia();
      $favorita->setSfGuardUserProfileId($user_id);
      $favorita->setFotografiaId($id);
      $favorita->setStatus('favorita'); // 1?
//      $favorita->setStatus('carrito'); // 3?
      $favorita->save();
    }
  }
}