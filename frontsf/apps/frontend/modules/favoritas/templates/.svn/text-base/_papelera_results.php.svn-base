<div class="resultados col-content">

  <? $i=1; ?>
  <? foreach($fotografias as $foto): ?>
    <?
      $clase = 'foto';

      if(fmod($i, 3) == 1) $clase.=' first-col';
      if(fmod($i, 3) == 0) $clase.=' last-col';
    ?>
    
    <div id="item-<?=$foto->id;?>" class="<?=$clase?>">
      <?=image_tag($foto->getThumbSrc('search-list'), array(
          'class'  => $clase,
          'height' => 153,
          'width'  => 230
      ))?>

      <div id="link-restore-<?=$foto->id?>">
        <?=link_to('<span>'.__('Restaurar').'</span>', 'favoritas/restoreFromPapelera?fotografia_id='.$foto->id, array('class' => 'restore-icon'))?>
      </div>

      <div id="link-delete-<?=$foto->id?>">
        <?=link_to('<span>'.__('Eliminar').'</span>', 'favoritas/deleteFromPapelera?fotografia_id='.$foto->id, array('class' => 'delete-icon'))?>
      </div>

    </div>
    <? $i++; ?>
  <? endforeach; ?>
  
</div>