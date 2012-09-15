<div class="resultados col-content">

  <? $i=1; ?>
  <? foreach($fotografias as $foto): ?>
    <?
      if($i == 1):
        $location = 'first';
      elseif($i == count($fotografias)):
        $location = 'last';
      else:
        $location = 'mid';
      endif;
      
      $clase_col = 'foto';
      
      if(fmod($i, 3) == 1) $clase_col.=' first-col';
      if(fmod($i, 3) == 0) $clase_col.=' last-col';
    ?>
    
    <div id="item-<?=$foto->id?>" class="<?=$clase_col?>">
      <? $clase_a = 'thumb'; ?>
      
      <? if($sf_user->getGuardUser()): ?>
        <? if($foto->isComprada($sf_user->getGuardUser()->getId())): ?>
          <? $clase_a .= ' comprada'; ?>
        <? endif ?>
      <? endif ?>
      
      <?=link_to(image_tag($foto->getThumbSrc('search-list'),
                  array(
                    'alt'    => 'Ampliar Imagen',
                    'title'  => 'Ampliar Imagen',
                    'class'  => $clase_col,
                    'height' => 153,
                    'width'  => 230)),
          '@foto_lightbox?id='.$foto->id.'&location='.$location.'&url_prev_page='.$url_prev_page.'&url_next_page='.$url_next_page,
          array(
            'rel'   =>'ampliar-foto',
            'title' => $foto->getDescripcion(),
            'class' => $clase_a
      ))?>
      
      <div id="link-carrito-<?=$foto->id?>">
        <? if($sf_user->getShoppingCart()->hasItem($foto->id)): ?>
          <div class="carrito added">
            <span><?=__('En Carrito')?></span>
          </div>
        <? elseif($foto->isComprada($sf_user->getGuardUser()->getId())): ?>
          <div class="carrito comprada">
            <span><?=__('Foto comprada')?></span>
          </div>
        <? elseif($foto->isPendiente($sf_user->getGuardUser()->getId())): ?>
          <div class="carrito comprada">
            <span><?=__('Compra en proceso')?></span>
          </div>
        <? else: ?>
          <?=jq_link_to_remote('<span>'.__('Carrito').'</span>',
              array(
                'url'    => 'shop/addCartItem?id='.$foto->id,
                'update' => 'link-carrito-'.$foto->id),
              array(
                'class' => 'carrito'
          ))?>
        <? endif; ?>
      </div>

      <div id="link-papelera-<?=$foto->id;?>">
        <?=link_to('<span>'.__('Papelera').'</span>', 'favoritas/deleteFromResults?fotografia_id='.$foto->id, array('class' => 'delete-icon'))?>
      </div>

      <?=link_to('<span>'.__('Postales').'</span>', '@foto_lightbox?id='.$foto->id.'&extra=enviar',
          array(
            'rel'   => 'enviar',
            'title' => $foto->getDescripcion(),
            'class' => 'enviar'
      ))?>
      
      <?=link_to('<span>'.__('Ampliar').'</span>', '@foto_lightbox?id='.$foto->id.'&location='.$location.'&url_prev_page='.$url_prev_page.'&url_next_page='.$url_next_page, array(
          'rel'   => 'ampliar',
          'title' => $foto->getDescripcion(),
          'class' => 'zoom'
      ))?>
      
    </div>
    <? $i++; ?>
  <? endforeach ?>
  
</div>