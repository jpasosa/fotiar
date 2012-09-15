<a href="<?=url_for('@busqueda')?>" class="banner">
    <?=__('BUSCA TU FOTO')?>
    <?//=image_tag('home/banner_home'.'_'.$sf_user->getCulture().'.jpg');?>
</a>

<? $i=1; ?>
<? foreach($eventos as $evento): ?>
  <? $clase = 'evento-destacado'; ?>
  <? if($i==1) $clase.=' first'; ?>
  <? if($i==4) $clase.=' last'; ?>
  <? $nombre_campo = 'nombre_archivo_'.$sf_user->getCulture(); ?>
  
    <? $params_url = ''; ?>
    <? // En Eventos, el parametro categoria_id existe seguro ?>
    <? if($evento->categoria_id != null) $params_url .= 'categoria_id='.$evento->categoria_id;  ?>
    <? if($evento->subcategoria_id != null) $params_url .= '&subcategoria_id='.$evento->subcategoria_id;  ?>

  <?=link_to(image_tag(sfConfig::get('app_url_backend').'eventos/'.$evento->$nombre_campo), '@eventos?'.$params_url, array('class'=>$clase));?>
  <? $i++; ?>
<? endforeach; ?>