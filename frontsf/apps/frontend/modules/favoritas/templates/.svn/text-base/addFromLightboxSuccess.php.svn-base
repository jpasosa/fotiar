<?php slot('first_update') ?>
  <div class="favorita added"><span><?=__('Añadida a Favoritas');?></span></div>
<?php end_slot() ?>
 
<?php slot('second_update') ?>
  <div class="favorita added"><span><?=__('Añadida a Favoritas');?></span></div>
<?php end_slot() ?>
 
<?php echo javascript_tag(
 
  jq_update_element_function('link-favorita-lb-'.$foto_id, array(
    'content' => get_slot('first_update'),
  ))
  .
  jq_update_element_function('link-favorita-'.$foto_id, array(
    'content' => get_slot('second_update'),
  )) 
 
) ?>