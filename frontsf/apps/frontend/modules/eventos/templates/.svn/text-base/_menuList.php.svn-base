<? foreach($eventos as $evento): ?>
  <? $url_ico = sfConfig::get('app_url_backend').'eventos/'.$evento->nombre_icono; ?>
  <li>
    <? $params_url = ''; ?>
    <? // En Eventos, el parametro categoria_id existe seguro ?>
    <? if($evento->categoria_id != null) $params_url .= 'categoria_id='.$evento->categoria_id;  ?>
    <? if($evento->subcategoria_id != null) $params_url .= '&subcategoria_id='.$evento->subcategoria_id;  ?>
    <?=link_to($evento->caption, '@eventos?'.$params_url, array('style' => 'background-image: url(\''.$url_ico.'\');'));?>
  </li>
<? endforeach; ?>