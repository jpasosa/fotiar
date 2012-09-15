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
      
      $clase = 'foto';
      
      if(fmod($i, 3) == 1) $clase.=' first-col';
      if(fmod($i, 3) == 0) $clase.=' last-col';
    ?>
    
    <div id="item-<?=$foto->id?>" class="<?=$clase?>">
      <?=link_to(image_tag($foto->getThumbSrc('search-list'),
                  array(
                    'alt'   => 'Ampliar Imagen',
                    'title' => 'Ampliar Imagen',
                    'class' => $clase,
                    'height' => 153,
                    'width'  => 230)),
          '@foto_lightbox?id='.$foto->id.'&location='.$location.'&url_prev_page='.$url_prev_page.'&url_next_page='.$url_next_page,
          array(
            'rel'   => 'ampliar-foto',
            'title' => $foto->getDescripcion(),
            'class' => 'thumb'
      ))?>

      <div id="link-download-<?=$foto->id?>">
        <?=link_to('<span>'.__('Descargar').'</span>', 'pedidos/descargar?fotografia_id='.$foto->id, array('class' => 'download-icon'))?>
      </div>
      
      <?=link_to('<span>'.__('Ampliar').'</span>', '@foto_lightbox?id='.$foto->id.'&location='.$location.'&url_prev_page='.$url_prev_page.'&url_next_page='.$url_next_page,
          array(
            'rel'   => 'ampliar',
            'title' => $foto->getDescripcion(),
            'class' => 'zoom'
      ))?>
      
    </div>
    <? $i++; ?>
  <? endforeach ?>

</div>