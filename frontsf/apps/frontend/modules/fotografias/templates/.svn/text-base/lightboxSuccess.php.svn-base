<? use_helper('Date') ?>

<div class="lb-image">
  <? if($location=='first' && $url_prev_page != 'none'): ?>
    <a id="cboxPrevious-first" href="<?=$url_prev_page?>"></a>
  <? endif; ?>
  
  <?=image_tag($foto->getThumbSrc('search-zoom', !$comprada));?>
  
  <? if($location=='last' && $url_next_page != 'none'): ?>
    <a id="cboxNext-last" href="<?=$url_next_page?>"></a>
  <? endif; ?>  
</div>

<div class="lb-functions">

  <? if($sf_user->getGuardUser()): ?>

<!-- MASINFO LOGGED -->
    <div id="link-masinfo-lb-<?=$foto->id?>" class="link-lb">
      <?=jq_link_to_function('<span>'.__('Más Información').'</span>',
          'desplegar_extra("masinfo");',
          array('class' => 'masinfo'));?>
      <div id="result-m-lb-<?=$foto->id?>"></div>
    </div>
    
<!-- FAVORITA LOGGED -->
    <div id="link-favorita-lb-<?=$foto->id?>" class="link-lb">
      <? if($foto->isFavorita($sf_user->getGuardUser()->getProfile()->getId())): ?>
        <div class="favorita added"><span><?=__('Añadida a Favoritas');?></span></div>
      <? else: ?>
        <?=jq_link_to_remote('<span>'.__('Añadir a Favoritas').'</span>',
            array(
              'url'    => 'favoritas/addFromLightbox?fotografia_id='.$foto->id,
              'update' => 'result-f-lb-'.$foto->id,
              'script' => true),
            array(
              'class' => 'favorita')
        );?>
        <div id="result-f-lb-<?=$foto->id?>"></div>
      <? endif; ?>
    </div>

<!-- ENVIAR LOGGED -->
    <div id="link-enviar-lb-<?=$foto->id?>" class="link-lb">
      <?=jq_link_to_function('<span>'.__('Enviar Postal').'</span>',
          'desplegar_extra("enviar");',
          array('class' => 'enviar'));?>
      <div id="result-m-lb-<?=$foto->id?>"></div>
    </div>

<!-- CARRITO LOGGED -->
    <div id="link-carrito-lb-<?=$foto->id?>" class="link-lb">
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
              'update' => 'result-c-lb-'.$foto->id,
              'script' => true),
            array(
              'class' => 'carrito')
        );?>
        <div id="result-c-lb-<?=$foto->id?>"></div>
      <? endif; ?>
    </div>

  <? else: ?>

<!-- MASINFO UNLOGGED -->
    <div id="link-masinfo-lb-<?=$foto->id?>" class="link-lb">
      <?=link_to('<span>'.__('Más Información').'</span>', '@sf_guard_signin', array('class'=>'masinfo'));?>
    </div>
    
<!-- FAVORITA UNLOGGED -->
    <div id="link-favorita-lb-<?=$foto->id?>" class="link-lb">
      <?=link_to('<span>'.__('Añadir a Favoritas').'</span>', '@sf_guard_signin', array('class'=>'favorita'));?>
    </div>

<!-- ENVIAR UNLOGGED -->
    <div id="link-enviar-lb-<?=$foto->id?>" class="link-lb">
      <?=link_to('<span>'.__('Enviar Postal').'</span>', '@sf_guard_signin', array('class'=>'enviar'));?>
    </div>

<!-- CARRITO UNLOGGED -->
    <div id="link-carrito-lb-<?=$foto->id?>" class="link-lb">    
      <?=link_to('<span>'.__('Añadir al Carrito').'</span>', '@sf_guard_signin', array('class'=>'carrito'));?>
    </div>

  <? endif; ?>
    
  
<!-- PRECIO -->
  <div class="precio-lb">
    <span class="entero">Arg. $<?=substr($foto->precio, 0, strpos($foto->precio, ".")+1)?></span>
    <span class="decimales"><?=substr($foto->precio, strpos($foto->precio, ".")+1)?></span>
  </div>
</div>

<div class="lb-extra">
  <div id="extra-masinfo" class="extra" style="display:none;">
    <div class="franja gris">
      <div class="col-1">
        <strong><?=__('Fotógrafo')?>:</strong> <?=$foto->getUsuario()->getNombre()." ".$foto->getUsuario()->getApellido()?> |
      </div>
      <div class="col-2">
        <strong><?=__('Fecha de Captura')?>:</strong> <?=format_date($foto->getTaken(), 'd')?>
      </div>
    </div>
    
    <div class="franja blanca">
      <div class="col-1">
        <strong><?=__('Categoría')?>:</strong> <?=$foto->getCategoria()->getDescripcion()?> |
        <strong><?=__('Subcategoría')?>:</strong> <?=$foto->getSubcategoria()->getDescripcion()?>
      </div>
      <div class="col-2">
        <strong><?=__('Tipo de Imagen')?>:</strong> <?=$foto->getMimetype()?>
      </div>
    </div>

    <div class="franja gris">
      <div class="col-1">
        <strong><?=__('Cámara')?>:</strong> <?=$foto->getCamera()?> |
        <strong><?=__('Modelo')?>:</strong> <?=$foto->getModel();?>
      </div>
      <div class="col-2">
        <strong><?=__('Tiempo de exposición')?>:</strong> <?=$foto->getExposuretime()?> |
        <strong><?=__('Velocidad ISO')?>:</strong> <?=$foto->getIsospeed()?>
      </div>
    </div>
    
    <? $ets = $foto->getEtiquetasMezcladasAsString(); ?>
    <? if($ets != ''): ?>
      <div class="franja blanca">
        <div class="col-unica">
          <strong><?=__('Etiquetas')?>:</strong> <?=$ets?>
        </div>
      </div>
    <? endif; ?>
  </div>

  <div id="extra-enviar" class="extra" <? if($extra!='enviar'): echo 'style="display:none;"'; endif; ?>>
    <div id="postal-container">
      <?=jq_form_remote_tag(array(
          'update'  => 'postal-container',
          'url'     => '@enviar_postal?id='.$foto->id.'&file='.$foto->getThumbSrc('search-zoom', !$comprada),
          'loading' => '$("#enviar-postal-buttons").hide();$("#enviar-postal-indicator").show();',
  //        'complete' => '$("#enviar-mensaje-indicator").fadeOut();',
      ), array(
          'id'     => 'enviar-postal-form',
          'method' => 'post',
      ))?>
        <?=$postal_form->renderHiddenFields()?>
        <div class="left-col">
          <div class="row">
            <?=$postal_form['mensaje']->renderLabel(__('Mensaje'))?>
            <?=$postal_form['mensaje']->render(array('class' => 'textarea'))?>
          </div>
        </div>
        
        <div class="right-col">
          <div class="row">
            <?=$postal_form['nombre']->renderLabel(__('Nombre Destinatario'))?>
            <?=$postal_form['nombre']->render(array('class' => 'text'))?>
          </div>
          <div class="row">
            <?=$postal_form['email']->renderLabel(__('E-Mail Destinatario'))?>
            <?=$postal_form['email']->render(array('class' => 'text'))?>
          </div>
          <div id="enviar-postal-buttons" class="buttons" style="">
            <?=jq_link_to_function(__('Borrar'),
                '$(this).parents("form").each (function(){this.reset();});',
                array('class' => 'btn'));?>
            <input name="enviar" type="submit" class="btn" value="<?=__('Enviar')?>" />
          </div>
          <div id="enviar-postal-indicator" class="buttons" style="display:none;">
            <?=jq_link_to_function(__('Cancelar'), '$.colorbox.close()', array('class' => 'btn'))?>
            <div><?=__('Enviando...')?></div>
            <?=image_tag('enviando.gif', array('width' => '33', 'height' => '32'))?>
          </div>
        </div>
        
      </form>
    </div>
  </div>
</div>