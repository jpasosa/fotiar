<div class="left-col">

	<div class="col-content">
  	<div class="modulito">
      <div class="top"></div>
      <div class="content">
        <h3><?=__('Mi Carrito');?></h3>
				<div id="info-seccion-carrito">
					<p><?=__('Tienes (%1%) fotos en tu carrito.', array('%1%' => count($cart->getItems())))?></p>
					<p><?=__('Desde aquí podrás confirmar las fotos que desees comprar y descargarlas en formato digital en alta resolución.')?></p>
					<p><?=__('Puedes también descargar las fotos de tus').' '.link_to(__('COMPRAS ANTERIORES'), '@pedidos_anteriores').' '.__('o volver a').' '.link_to(_('FAVORITAS'), '@favoritas').' '.__('para seleccionar mas fotos.')?></p>
          <p class="bigger"><?=__('Importe Total: ')?><span class="precio-total-dinamico">Arg. $<?=$cart->getTotal()?></span></p>
				</div>
      </div>
      <div class="bottom"></div>
    </div>

    <?=link_to(__('Confirmar ').'<strong>'.__('Compra').' ></strong>', '@checkout', array('class' => 'botonote carrito'))?>
    <?=link_to(__('Buscar más ').'<strong>'.__('Fotos').' ></strong>', '@busqueda_guardada', array('class' => 'botonote'))?>
    <?=link_to(__('Ir a ').'<strong>'.__('Favoritas').' ></strong>', '@favoritas', array('class' => 'botonote favoritas'))?>
    
    <? include_partial('global/banner2') ?>
  </div>  
</div>

<? if(count($cart->getItems())>0): ?>
  <div class="right-col">
  	<div class="resultados col-content">
  		<? foreach($cart->getItemsSorted() as $item): ?>
     
    		<div id="carrito-foto-<?=$item->getId()?>" class="item">
      
    			<div class="foto">
            <?=link_to(image_tag($item->getFotografia()->getThumbSrc('search-list'),
                        array(
                          'alt'    => 'Ampliar Imagen',
                          'title'  => 'Ampliar Imagen',
                          'height' => 153,
                          'width'  => 230)),
                '@foto_lightbox?id='.$item->getFotografia()->id,
                array(
                  'rel'   =>'ampliar-foto',
                  'title' => $item->getFotografia()->descripcion
            ))?>
    			</div>
    
    			<div class="details">
            <div class="top"></div>
            <div class="content">
      				<p><strong><?=__('Fotógrafo')?>:</strong> <?=$item->getFotografia()->getUsuario()->getNombre() . " " . $item->getFotografia()->getUsuario()->getApellido()?> | <strong><?=__('Fecha de captura')?>:</strong> <?=$item->getFotografia()->getTaken()?></p>
      			  <p><strong><?=__('Cámara')?>:</strong> <?=$item->getFotografia()->getCamera()?> | <strong><?=__('Modelo')?>:</strong> <?=$item->getFotografia()->getModel()?></p>
      			 	<p><strong><?=__('Tiempo de exposición')?>:</strong> <?=$item->getFotografia()->getExposuretime()?> | <strong><?=__('Velocidad')?>:</strong> <?=$item->getFotografia()->getIsospeed()?></p>
      			  <p><strong><?=__('Tipo de imagen')?>:</strong> <?=$item->getFotografia()->getMimetype()?></p>
              <?=jq_link_to_remote('',
                  array(
                    'url'      => 'shop/deleteCartItem?id='.$item->getId(),
                    'complete' => '$("#carrito-foto-'.$item->getId().'").fadeOut("fast"); return false;',
                    'update'   => 'precio-total-dinamico'),
                  array(
                    'class' => 'delete-icon',
                    'title' => __('Quitar del Carrito')));
              ?>
      				<p class="precio"><strong><?=__('Precio') ?>:</strong> Arg. $<?=$item->getPrecio() ?></p>
    			  </div>
            <div class="bottom"></div>
          </div>
    		</div>
      
  		<? endforeach; ?>
  	</div>
    <div class="col-footer">
      <div class="f-left">
        <?=link_to(__('Confirmar ').'<strong>'.__('Compra').' ></strong>', '@checkout', array('class' => 'botonote carrito'))?>
      </div>
      <div class="f-left">
        <?=image_tag('carrito/tarjetas_2.png')?>
      </div>
      <p class="precio"><strong><?=__('Total')?>:</strong> <span id="precio-total-dinamico"> Arg. $<?=$cart->getTotal()?></span></p>
    </div>
  </div>
<? else: ?>
  <div class="right-col simple">
    <h2><?=__('Tu carrito está vacío')?></h2>
    <p class="general-text"><?=__('Actualmente no tienes fotos en tu carrito.')?></p>
  </div>
<? endif; ?>