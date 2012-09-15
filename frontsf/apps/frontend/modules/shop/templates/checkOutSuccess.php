<div class="left-col">

	<div class="col-content">
  	<div class="modulito">
      <div class="top"></div>
      <div class="content">
        <h3><?=__('Confirmar Compra');?></h3>
				<div id="info-seccion-carrito">
					<p><?=__('Tienes (%1%) fotos pendientes de confirmación.', array('%1%' => count($cart->getItems())))?></p>
					<p><?=__('Desde aquí podrás confirmar las fotos que desees comprar.')?></p>
					<p><?=__('Puedes también consultar tus COMPRAS ANTERIORES o volver a MI CARRITO.')?></p>
          <p class="bigger"><?=__('Importe Total: ')?><span class="precio-total-dinamico">Arg. $<?=$cart->getTotal()?></span></p>
				</div>
      </div>
      <div class="bottom"></div>
    </div>

    <?=link_to(__('Volver al ').'<strong>'.__('Carrito').' ></strong>', '@shop', array('class' => 'botonote carrito'))?>    
<!--    <a href="https://www.mercadopago.com/checkout/pay?pref_id=<?//=$prefId?>" name="MP-payButton" class="botonote" mp-mode="modal"><?//=__('Realizar ').'<strong>'.__('Pago').'</strong> >'?></a>-->
    <a href="https://www.mercadopago.com/checkout/pay?pref_id=<?=$prefId?>" name="MP-payButton" class="botonote carrito" mp-mode="modal" callback="execute_my_callback"><?=__('Realizar ').'<strong>'.__('Pago').'</strong> >'?></a>
    <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
    
    <? include_partial('global/banner2') ?>
  </div>  
</div>

<div class="right-col checkout">
	<div class="resultados col-content">
    <h2><?=__('Confirmación de compra')?></h2>
    <p class="general-text"><?=__('Estás a punto de confirmar tu compra. Revisa los items y luego haz click en el botón').' <strong>'.__('Realizar Pago').'</strong> '.__('para continuar.')?></p>

		<? foreach($cart->getItemsSorted() as $item): ?>
   
  		<div id="carrito-foto-<?=$item->getId()?>" class="item">
    
  			<div class="foto">
          <?=link_to(image_tag($item->getFotografia()->getThumbSrc('checkout-list'),
                      array(
                        'alt'    => 'Ampliar Imagen',
                        'title'  => 'Ampliar Imagen',
                        'height' => 46,
                        'width'  => 69)),
              '@foto_lightbox?id='.$item->getFotografia()->id,
              array(
                'rel'   =>'ampliar-foto',
                'title' => $item->getFotografia()->descripcion
          ))?>
  			</div>
  
  			<div class="details">
          <div class="content">
    				<p><strong><?=__('Fotógrafo')?>:</strong> <?=$item->getFotografia()->getUsuario()->getNombre() . " " . $item->getFotografia()->getUsuario()->getApellido()?> | <strong><?=__('Fecha de captura')?>:</strong> <?=$item->getFotografia()->getTaken()?></p>
    			  <p><strong><?=__('Precio')?>:</strong> Arg. $<?=$item->getPrecio()?></p>
  			  </div>
        </div>
  		</div>
    
		<? endforeach; ?>
	</div>
 
  <div class="col-footer">
    <div class="f-left">
      <a href="https://www.mercadopago.com/checkout/pay?pref_id=<?=$prefId?>" name="MP-payButton" class="botonote carrito" mp-mode="modal" callback="execute_my_callback"><?=__('Realizar ').'<strong>'.__('Pago').'</strong> >'?></a>
      <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
    </div>
    <div class="f-left">
		  <?=image_tag('carrito/tarjetas_2.png')?>
    </div>
    <p class="precio"><strong><?=__('Total')?>:</strong> <span id="precio-total-dinamico">Arg. $<?=$cart->getTotal()?></span></p>
  </div>
</div>


<script type="text/javascript">
  function execute_my_callback (json) {
    if (json.collection_status=='approved') {
        console.log(json);
      $.post(json.back_url, {external_reference: json.external_reference}, function(data){
        if(data == "OK") {
        	window.location.replace("<?=url_for('@pago_aceptado_rta')?>");
        }
       });
    } else if (json.collection_status=='pending') {
    	console.log(json);
      $.post(json.back_url, {external_reference: json.external_reference}, function(data){
          if(data == "OK") {
            window.location.replace("<?=url_for('@pago_pendiente_rta')?>");
          }
       });
/*        alert ('El usuario no completó el pago. Ir a: '+json.back_url); */
    } else if (json.collection_status=='in_process') {
/*        alert ('El pago está siendo revisado. Ir a: '+json.back_url); */
      window.location.replace(json.back_url);
    } else if (json.collection_status=='rejected') {
/*        alert ('El pago fué rechazado, el usuario puede intentar nuevamente el pago. Ir a: '+json.back_url); */
    } else if (json.collection_status==null) {
/*    	window.location.replace(json.back_url); */
        alert ('El usuario no completó el proceso de pago, no se ha generado ningún pago');
    }
  }
</script>