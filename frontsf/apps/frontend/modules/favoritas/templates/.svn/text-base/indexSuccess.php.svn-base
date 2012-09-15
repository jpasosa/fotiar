<div class="left-col">
  <div class="col-content">

    <div class="modulito">
      <div class="top"></div>
      <div class="content">
        <h3><?=__('Mis Favoritas')?></h3>
        <div>
          <p><?=__('Tienes (%1%) fotos guardadas en tus FAVORITAS.', array('%1%' => $pager->count()))?></p>
          <p><?=__('Desde aquí podrás agregarlas al CARRITO DE COMPRAS o enviarlas como POSTAL a un amigo.')?></p>
          <p><?=__('Puedes recuperar las favoritas que hayas eliminado accediendo a tu papelera.')?></p>
        </div>
      </div>
      <div class="bottom"></div>
    </div>
  
    <?=link_to(__('Ir a mi ').'<strong>'.__('Carrito').' ></strong>', '@shop', array('class' => 'botonote carrito'))?>
    <?=link_to(__('Buscar más ').'<strong>'.__('Fotos').' ></strong>', '@busqueda_guardada', array('class' => 'botonote'))?>
  
    <? include_partial('global/banner2') ?>
  </div>
  
  <div class="col-footer">
    <?=__('Todos los derechos se encuentran registrados')?>
  </div>
</div>

<div class="right-col">

  <div class="col-footer">
    <div class="pager">
      <? $url_prev_page = 'none'; ?>
      <? $url_next_page = 'none'; ?>
      <? if($pager->haveToPaginate()): ?>
     
        <div class="part">
          <? if($pager->getPage() == $pager->getFirstPage()): ?>
            <span class="inactive"> <<<< <?=__('prev.')?></span>
          <? else: ?>
            <? $url_prev_page = url_for('@favoritas?page='.$pager->getPreviousPage()); ?>
            <?=link_to(' <<<< '.__('prev.'), $url_prev_page)?>
          <? endif ?>
          
          <? foreach($pager->getLinks(5) as $page_num): ?>
          
            <? if($page_num == $pager->getPage()): ?>
              <span class="active page-number"><?=$page_num?></span>
            <? else: ?>
              <?=link_to($page_num, '@favoritas?page='.$page_num, array('class'=>'page-number'))?>
            <? endif ?>
            
          <? endforeach ?>
          
          <? if($pager->getPage() == $pager->getLastPage()): ?>
            <span class="inactive"><?=__('prox.')?> >>>> </span>
          <? else: ?>
            <? $url_next_page = url_for('@favoritas?page='.$pager->getNextPage()); ?>
            <?=link_to(__('prox.').' >>>> ', $url_next_page)?>
          <? endif ?>
        </div>
  
        <div class="separator"><?=' - '?></div>
      <? endif ?>
  
      <div class="part"><?=__('Página').' '.$pager->getPage().' '.__('de').' '.$pager->getLastPage()?></div>
      
      <div class="separator"><?=' - '?></div>
      
      <div class="part"><?=$pager->count().__(' fotos')?></div>
    </div>
  </div>


  <? if($pager->count() > 0): ?>
    <? include_partial('favoritas/results', array(
        'fotografias'   => $pager->getResults(),
        'url_prev_page' => $url_prev_page,
        'url_next_page' => $url_next_page
    )); ?>    
  <? else: ?>
    <?=__('Aún no has seleccionado fotos favoritas.')?>
  <? endif; ?>

  
  <div class="col-footer">
    <div class="pager">
      <? if($pager->haveToPaginate()): ?>
     
        <div class="part">
          <? if($pager->getPage() == $pager->getFirstPage()): ?>
            <span class="inactive"> <<<< <?=__('prev.')?></span>
          <? else: ?>
            <?=link_to(' <<<< '.__('prev.'), $url_prev_page)?>
          <? endif ?>
          
          <? foreach($pager->getLinks(5) as $page_num): ?>
          
            <? if($page_num == $pager->getPage()): ?>
              <span class="active page-number"><?=$page_num?></span>
            <? else: ?>
              <?=link_to($page_num, '@favoritas?page='.$page_num, array('class'=>'page-number'))?>
            <? endif ?>
            
          <? endforeach ?>
          
          <? if($pager->getPage() == $pager->getLastPage()): ?>
            <span class="inactive"><?=__('prox.')?> >>>> </span>
          <? else: ?>
            <?=link_to(__('prox.').' >>>> ', $url_next_page)?>
          <? endif ?>
        </div>
  
        <div class="separator"><?=' - '?></div>      
      <? endif ?>
  
      <div class="part"><?=__('Página').' '.$pager->getPage().' '.__('de').' '.$pager->getLastPage()?></div>
      
      <div class="separator"><?=' - '?></div>
      
      <div class="part"><?=$pager->count().__(' fotos')?></div>
    </div>
  </div>
</div>