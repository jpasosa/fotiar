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
    
    <div class="<?=$clase_col?>">
      <? $clase_a = 'thumb'; ?>
      
      <? if($sf_user->getGuardUser()): ?>
        <? if($foto->isComprada($sf_user->getGuardUser()->getId())): ?>
          <? $clase_a .= ' comprada'; ?>
        <? endif; ?>
      <? endif; ?>
      
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
            'title' => $foto->descripcion,
            'class' => $clase_a
      ))?>
              
      <div id="link-carrito-<?=$foto->id?>">
        <? if($sf_user->getGuardUser()): ?>
          <? if($foto->isComprada($sf_user->getGuardUser()->getId())): ?>
            <div class="carrito comprada">
              <span><?=__('Foto comprada')?></span>
            </div>
          <? elseif($foto->isPendiente($sf_user->getGuardUser()->getId())): ?>
            <div class="carrito comprada">
              <span><?=__('Compra en proceso')?></span>
            </div>
          <? elseif($sf_user->getShoppingCart()->hasItem($foto->id)): ?>
            <div class="carrito added">
              <span><?=__('En Carrito')?></span>
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
        <? else: ?>
          <?=link_to('<span>'.__('Carrito').'</span>', '@sf_guard_signin', array('class'=>'carrito'))?>
        <? endif; ?>
      </div>

      <div id="link-favorita-<?=$foto->id;?>">
        <? if($sf_user->getGuardUser()): ?>
          <? if($foto->isComprada($sf_user->getGuardUser()->getProfile()->getId())): ?>
            <div class="favorita comprada"></div>
          <? elseif($foto->isFavorita($sf_user->getGuardUser()->getProfile()->getId())): ?>
            <div class="favorita added">
              <span><?=__('En Favoritas')?></span>
            </div>
          <? else: ?>
            <?=jq_link_to_remote('<span>'.__('Favoritas').'</span>',
                array(
                  'url'    => 'favoritas/addFromResults?fotografia_id='.$foto->id, 
                  'update' => 'link-favorita-'.$foto->id),
                array(
                  'class' => 'favorita'
            ))?>
          <? endif; ?>
        <? else: ?>
          <?=link_to('<span>'.__('Favoritas').'</span>', '@sf_guard_signin', array('class'=>'favorita'))?>
        <? endif; ?>
      </div>

      <? if($sf_user->getGuardUser()): ?>
        <?=link_to('<span>'.__('Postales').'</span>', '@foto_lightbox?id='.$foto->id.'&extra=enviar', array('rel'=>'enviar', 'title' => $foto->descripcion, 'class' => 'enviar'))?>
      <? else: ?>
        <?=link_to('<span>'.__('Postales').'</span>', '@sf_guard_signin', array('class'=>'enviar'))?>
      <? endif; ?>

      <?=link_to(__('<span>'.'Ampliar').'</span>', '@foto_lightbox?id='.$foto->id, array('rel'=>'ampliar', 'title' => $foto->descripcion, 'class' => 'zoom'));?>

    </div>
    
    <? $i++; ?>
  <? endforeach; ?>
  
</div>