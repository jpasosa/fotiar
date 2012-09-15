<?php slot('first_update') ?>
  $<?=$shopping_cart->getTotal()?>
<?php end_slot() ?>
 
<?php slot('second_update') ?>
  <p><?=__('Tienes (%1%) fotos en tu carrito.', array('%1%' => count($shopping_cart->getItems())))?></p>
  <p><?=__('Desde aquí podrás confirmar las fotos que desees comprar y descargarlas en formato digital en alta resolución.')?></p>
  <p><?=__('Puedes también descargar las fotos de tus').' '.link_to(__('COMPRAS ANTERIORES'), '@pedidos_anteriores').' '.__('o volver a').' '.link_to(_('FAVORITAS'), '@favoritas').' '.__('para seleccionar mas fotos.')?></p>
  <p class="bigger"><?=__('Importe Total: ')?><span class="precio-total-dinamico">Arg. $<?=$shopping_cart->getTotal()?></span></p>
<?php end_slot() ?>
 
<?php slot('third_update') ?>
  <?=__('Carrito').' ('.count($shopping_cart->getItems()).')'?>
<?php end_slot() ?>

<?php echo javascript_tag(
  
  jq_update_element_function('precio-total-dinamico', array(
    'content' => get_slot('first_update'),
  ))
  .
  jq_update_element_function('info-seccion-carrito', array(
    'content' => get_slot('second_update'),
  )) 
  .
  jq_update_element_function('carrito-header', array(
    'content' => get_slot('third_update'),
  )) 
  
) ?>