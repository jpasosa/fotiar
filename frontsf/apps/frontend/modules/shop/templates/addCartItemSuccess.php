<div class="carrito added"><?=__('Se ha añadido al Carrito');?></div>

<?php slot('first_update') ?>
  <div class="carrito added"><span><?=__('Se ha añadido al Carrito');?></span></div>
<?php end_slot() ?>
 
<?php slot('second_update') ?>
  <div class="favorita added"><span><?=__('Se ha añadido a Favoritas');?></span></div>
<?php end_slot() ?>

<?php slot('third_update') ?>
  <?=__('Carrito').' ('.count($cart->getItems()).')'?>
<?php end_slot() ?>
 
<?php echo javascript_tag(
  
  jq_update_element_function('link-carrito-'.$id, array(
    'content' => get_slot('first_update'),
  ))
  .
  jq_update_element_function('link-favorita-'.$id, array(
    'content' => get_slot('second_update'),
  )) 
  .
  jq_update_element_function('carrito-header', array(
    'content' => get_slot('third_update'),
  )) 
  
) ?>