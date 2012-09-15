<div class="left-col">

  <div class="col-content">
    <div class="modulito">
      <div class="top"></div>
      <div class="content">
        <h3><?=__('Papelera Favoritas')?></h3>
        <div>
          <p><?=__('Tienes (%1%) fotos en tus PAPELERA de favoritas.', array('%1%' => $pager->count()))?></p>
          <p><?=__('Aquí puedes encontrar las fotos eliminadas de tus FAVORITAS.')?></p>
          <p><?=__('Puedes restaurarlas a tu carpeta de Favoritas o eliminarlas definitivamente.')?></p>
        </div>
      </div>
      <div class="bottom"></div>
    </div>

    <?=link_to(__('Vaciar ').'<strong>'.__('Papelera').' ></strong>', '@papelera_vaciar', array('class' => 'botonote'))?>
    <?=link_to(__('Ir a ').'<strong>'.__('Favoritas').' ></strong>', '@favoritas', array('class' => 'botonote favoritas'))?>

    <div class="banner">
      <h2 class="title"><?=__('POSTALES')?></h2>
      <div class="content2">
        <?=__('puedes enviarle una postal a un amigo seleccionando el siguiente ico')?>
      </div>
      <div class="icono"></div>
    </div>
  </div>
  
  <div class="col-footer">
    <?=__('Todos los derechos se encuentran registrados')?>
  </div>
</div>

<div class="right-col">
  <div class="col-footer">
    <div class="pager">
      <? if($pager->haveToPaginate()): ?>
     
        <div class="part">
          <? if($pager->getPage() == $pager->getFirstPage()): ?>
            <span class="inactive"> <<<< <?=__('prev.')?></span>
          <? else: ?>
            <?=link_to(' <<<< '.__('prev.'), '@papelera?page='.$pager->getPreviousPage())?>
          <? endif; ?>
          
          <? foreach($pager->getLinks(5) as $page_num): ?>
          
            <? if($page_num == $pager->getPage()): ?>
              <span class="active page-number"><?=$page_num;?></span>
            <? else: ?>
              <?=link_to($page_num, '@papelera?page='.$page_num, array('class'=>'page-number'))?>
            <? endif; ?>
            
          <? endforeach; ?>
          
          <? if($pager->getPage() == $pager->getLastPage()): ?>
            <span class="inactive"><?=__('prox.')?> >>>> </span>
          <? else: ?>
            <?=link_to(__('prox.').' >>>> ', '@papelera?page='.$pager->getNextPage())?>
          <? endif; ?>
        </div>
  
        <div class="separator"><?=' - '?></div>      
      <? endif; ?>
  
      <div class="part"><?=__('Página').' '.$pager->getPage().' '.__('de').' '.$pager->getLastPage()?></div>
      
      <div class="separator"><?=' - '?></div>
      
      <div class="part"><?=$pager->count().__(' fotos')?></div>
    </div>
  </div>
  

  <? if($pager->count() > 0): ?>
    <? include_partial('favoritas/papelera_results', array('fotografias' => $pager->getResults())) ?>    
  <? else: ?>
    <?=__('No tienes fotos en tu Papelera.')?>
  <? endif; ?>

  
  <div class="col-footer">
    <div class="pager">
      <? if($pager->haveToPaginate()): ?>
     
        <div class="part">
          <? if($pager->getPage() == $pager->getFirstPage()): ?>
            <span class="inactive"> <<<< <?=__('prev.')?></span>
          <? else: ?>
            <?=link_to(' <<<< '.__('prev.'), '@papelera?page='.$pager->getPreviousPage())?>
          <? endif; ?>
          
          <? foreach($pager->getLinks(5) as $page_num): ?>
          
            <? if($page_num == $pager->getPage()): ?>
              <span class="active page-number"><?=$page_num;?></span>
            <? else: ?>
              <?=link_to($page_num, '@papelera?page='.$page_num, array('class'=>'page-number'))?>
            <? endif; ?>
            
          <? endforeach; ?>
          
          <? if($pager->getPage() == $pager->getLastPage()): ?>
            <span class="inactive"><?=__('prox.')?> >>>> </span>
          <? else: ?>
            <?=link_to(__('prox.').' >>>> ', '@papelera?page='.$pager->getNextPage())?>
          <? endif; ?>
        </div>
  
        <div class="separator"><?=' - '?></div>      
      <? endif; ?>
  
      <div class="part"><?=__('Página').' '.$pager->getPage().' '.__('de').' '.$pager->getLastPage()?></div>
      
      <div class="separator"><?=' - '?></div>
      
      <div class="part"><?=$pager->count().__(' fotos')?></div>
    </div>
  </div>
</div>