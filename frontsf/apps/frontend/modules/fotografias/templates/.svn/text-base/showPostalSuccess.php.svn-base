<? use_helper('Date') ?>

<div class="left-col">
  <div class="col-content">
    <? include_partial('global/modulito_banner_postal') ?>
  </div>
</div>

<div class="right-col" id="pbContent">
  <div class="top"></div>
  <div class="content">
    <h2><?=__('Te han enviado esta Postal')?></h2>
    <div class="image">
      <?=image_tag($foto->getThumbSrc('search-zoom'))?>
    </div>
  

  
    <div class="pb-functions">
    
      <? if($sf_user->getGuardUser()): ?>
    
        <!-- CARRITO LOGGED -->
        <div id="link-carrito-pb-<?=$foto->id?>" class="link-pb">
          <? if($sf_user->getShoppingCart()->hasItem($foto->id)): ?>
            <div class="carrito added"><span><?=__('Añadida al Carrito');?></span></div>
          <? elseif($comprada): ?>
            <div class="carrito comprada"><?=__('Foto comprada')?></div>
          <? elseif($foto->isPendiente($sf_user->getGuardUser()->getId())): ?>
            <div class="carrito comprada"><?=__('Compra en proceso')?></div>
          <? else: ?>
            <?=jq_link_to_remote('<span>'.__('Añadir al Carrito').'</span>',
                array(
                  'url'    => 'shop/addCartItemFromLightbox?id='.$foto->id,
                  'update' => 'result-c-pb-'.$foto->id,
                  'script' => true),
                array(
                  'class' => 'carrito')
            );?>
            <div id="result-c-pb-<?=$foto->id?>"></div>
          <? endif; ?>
        </div>
    
        <!-- FAVORITA LOGGED -->
        <div id="link-favorita-pb-<?=$foto->id?>" class="link-pb">
          <? if($foto->isFavorita($sf_user->getGuardUser()->getProfile()->getId())): ?>
            <div class="favorita added"><span><?=__('Añadida a Favoritas')?></span></div>
          <? else: ?>
            <?=jq_link_to_remote('<span>'.__('Añadir a Favoritas').'</span>',
                array(
                  'url'    => 'favoritas/addFromLightbox?fotografia_id='.$foto->id,
                  'update' => 'result-f-pb-'.$foto->id,
                  'script' => true),
                array(
                  'class' => 'favorita')
            );?>
            <div id="result-f-pb-<?=$foto->id?>"></div>
          <? endif; ?>
        </div>
    
      <? else: ?>
    
        <!-- CARRITO UNLOGGED -->
        <div id="link-carrito-pb-<?=$foto->id?>" class="link-pb">
          <?=link_to('<span>'.__('Añadir al Carrito').'</span>', '@sf_guard_signin', array('class'=>'carrito'))?>
        </div>
        
        <!-- FAVORITA UNLOGGED -->
        <div id="link-favorita-pb-<?=$foto->id?>" class="link-pb">
          <?=link_to('<span>'.__('Añadir a Favoritas').'</span>', '@sf_guard_signin', array('class'=>'favorita'))?>
        </div>
   
      <? endif ?>
        
    </div>
    
  </div>
  <div class="bottom"></div>
</div>