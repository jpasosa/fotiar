<script type="text/javascript">
  $(document).ready(function(){
    $(".multiselect").multiselect({
        selectedText: '# de # seleccionados',
        noneSelectedText: 'Seleccione',
        selectedList: 10,
        checkAllText: 'Todos',
        uncheckAllText: 'Ninguno',
  			minWidth: 193
    }).multiselectfilter({
        label: 'Filtrar'
    });
  });
</script>

<div class="left-col">
  <div class="col-content">

    <form method="POST" action="<?=url_for('@eventos')?>" name="busqueda">
      <div class="modulito" style="display:none;">
        <?=$search_form['categoria_id']?>
        <?=$search_form['subcategoria_id']?>
      </div>

      <div class="modulito">
        <div class="top"></div>
        <div class="content">
          <h3><?=__('Búsqueda por Fotógrafo')?></h3>
          <div><?=$search_form['usuario_id']?></div>
          <div><?=$search_form['sesion']?></div>
        </div>
        <div class="bottom"></div>
      </div>

      <div class="modulito fechas">
        <div class="top"></div>
        <div class="content">
          <h3><?=__('Búsqueda por Fechas')?></h3>
          <div><?=$search_form['fechas']?></div>
          <div>
            <input id="hoy-button" type="button" name="hoy" value="<?=__('Hoy')?>" />
            <input id="ayer-button" type="button" name="ayer" value="<?=__('Ayer')?>" />
            <input id="semana-button" type="button" name="semana" value="<?=__('Semana')?>" />
          </div>
        </div>
        <div class="bottom"></div>
      </div>
      
      <div class="modulito">
        <div class="top"></div>
        <div class="content">
          <h3><?=__('Búsqueda por Lugar')?></h3>
          <div><?=$search_form['lugar_id']->render(array('class' => 'multiselect'))?></div>
        </div>
        <div class="bottom"></div>
      </div>
      
      <div class="modulito">
        <div class="top"></div>
        <div class="content">
          <h3><?=__('Búsqueda por Etiqueta')?></h3>
          <div><?=$search_form['tema_id']->render(array('class' => 'multiselect'))?></div>
        </div>
        <div class="bottom"></div>
      </div>
      
      <input type="submit" value="<?=__('Buscar Foto >')?>" class="botonote" />
      <?=$search_form->renderHiddenFields()?>
    </form>
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
        <?
          $url_busqueda_pre = '@eventos?page=';
          $url_busqueda_post = '';
          if($pager->getParameter('categoria_id'))
            $url_busqueda_post .= '&categoria_id='.$pager->getParameter('categoria_id');
          if($pager->getParameter('subcategoria_id'))
            $url_busqueda_post .= '&subcategoria_id='.$pager->getParameter('subcategoria_id');
          if($pager->getParameter('etiqueta_id'))
            $url_busqueda_post .= '&etiqueta_id='.$pager->getParameter('etiqueta_id');
          if($pager->getParameter('sesion'))
            $url_busqueda_post .= '&sesion='.$pager->getParameter('sesion');
          if($pager->getParameter('fotografo_id'))
            $url_busqueda_post .= '&fotografo_id='.$pager->getParameter('fotografo_id');
          if($pager->getParameter('desde'))
            $url_busqueda_post .= '&desde='.$pager->getParameter('desde');
          if($pager->getParameter('hasta'))
            $url_busqueda_post .= '&hasta='.$pager->getParameter('hasta');
        ?>
        
        <div class="part">
          <? if($pager->getPage() == $pager->getFirstPage()): ?>
            <span class="inactive"> <<<< <?=__('prev.')?></span>
          <? else: ?>
            <? $url_prev_page = url_for($url_busqueda_pre.$pager->getPreviousPage().$url_busqueda_post); ?>
            <?=link_to(' <<<< '.__('prev.'), $url_busqueda_pre.$pager->getPreviousPage().$url_busqueda_post)?>
          <? endif; ?>
          
          <? foreach($pager->getLinks(5) as $page_num): ?>
          
            <? if($page_num == $pager->getPage()): ?>
              <span class="active page-number"><?=$page_num?></span>
            <? else: ?>
              <?=link_to($page_num, $url_busqueda_pre.$page_num.$url_busqueda_post, array('class'=>'page-number'))?>
            <? endif; ?>
            
          <? endforeach; ?>
          
          <? if($pager->getPage() == $pager->getLastPage()): ?>
            <span class="inactive"><?=__('prox.')?> >>>> </span>
          <? else: ?>
            <? $url_next_page = url_for($url_busqueda_pre.$pager->getNextPage().$url_busqueda_post); ?>
            <?=link_to(__('prox.').' >>>> ', $url_busqueda_pre.$pager->getNextPage().$url_busqueda_post)?>
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
    <? include_partial('busqueda/results', array(
        'fotografias'  => $pager->getResults(),
        'url_prev_page' => $url_prev_page,
        'url_next_page' => $url_next_page
    )); ?>
  <? else: ?>
    <?=__('No se han encontrado fotos en este evento que coincidan con la búsqueda que realizaste.')?>
  <? endif; ?>

  
  <div class="col-footer">
    <div class="pager">
    
      <? if($pager->haveToPaginate()): ?>
        <?
          $url_busqueda_pre = '@eventos?page=';
          $url_busqueda_post = '';
          if($pager->getParameter('categoria_id'))
            $url_busqueda_post .= '&categoria_id='.$pager->getParameter('categoria_id');
          if($pager->getParameter('subcategoria_id'))
            $url_busqueda_post .= '&subcategoria_id='.$pager->getParameter('subcategoria_id');
          if($pager->getParameter('etiqueta_id'))
            $url_busqueda_post .= '&etiqueta_id='.$pager->getParameter('etiqueta_id');
          if($pager->getParameter('sesion'))
            $url_busqueda_post .= '&sesion='.$pager->getParameter('sesion');
          if($pager->getParameter('fotografo_id'))
            $url_busqueda_post .= '&fotografo_id='.$pager->getParameter('fotografo_id');
          if($pager->getParameter('desde'))
            $url_busqueda_post .= '&desde='.$pager->getParameter('desde');
          if($pager->getParameter('hasta'))
            $url_busqueda_post .= '&hasta='.$pager->getParameter('hasta');
        ?>
        
        <div class="part">
          <? if($pager->getPage() == $pager->getFirstPage()): ?>
            <span class="inactive"> <<<< <?=__('prev.')?></span>
          <? else: ?>
            <?=link_to(' <<<< '.__('prev.'), $url_busqueda_pre.$pager->getPreviousPage().$url_busqueda_post)?>
          <? endif; ?>
          
          <? foreach($pager->getLinks(5) as $page_num): ?>
          
            <? if($page_num == $pager->getPage()): ?>
              <span class="active page-number"><?=$page_num?></span>
            <? else: ?>
              <?=link_to($page_num, $url_busqueda_pre.$page_num.$url_busqueda_post, array('class'=>'page-number'))?>
            <? endif; ?>
            
          <? endforeach; ?>
          
          <? if($pager->getPage() == $pager->getLastPage()): ?>
            <span class="inactive"><?=__('prox.')?> >>>> </span>
          <? else: ?>
            <?=link_to(__('prox.').' >>>> ', $url_busqueda_pre.$pager->getNextPage().$url_busqueda_post)?>
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

<script type="text/javascript">
/*<![CDATA[*/
  $(document).ready(function() {
   
   /* Parche, porque no se por que el combo "padre" pierde la propagacion del valor de la busqueda */
    $('#busqueda_categoria_id').val('<?=$search_form['categoria_id']->getValue()?>');
    <? if(!$search_form['subcategoria_id']->getValue()): ?>
      $('#busqueda_categoria_id').change();
    <? endif; ?>
    
/*    $('#busqueda_etiquetas_populares').change(function() {*/
/*      $('#autocomplete_busqueda_etiqueta_id').val($("#busqueda_etiquetas_populares option:selected").text());*/
    $('#etiquetas_populares').change(function() {
      $('#autocomplete_busqueda_etiqueta_id').val($("#etiquetas_populares option:selected").text());
      $('#busqueda_etiqueta_id').val($(this).val());
    });

    $('#autocomplete_busqueda_etiqueta_id').change(function() {
      if($(this).val()=='') {
        $('#busqueda_etiqueta_id').val('');
      }
      $('#etiquetas_populares').val('');
    });

    $('#busqueda_sesion').focus(function(){
      $(this).select();
    });

    $('#busqueda_sesion').change(function(){
        if($(this).val()=='') {
          $(this).val('<?=$defaultValSesion;?>');
        }
      });

    var hoy = new Date();
    $('#hoy-button').click(function(){
      $('#busqueda_fechas_from_day').val(hoy.getDate());
      $('#busqueda_fechas_to_day').val(hoy.getDate());
      $('#busqueda_fechas_from_month').val(hoy.getMonth()+1);
      $('#busqueda_fechas_to_month').val(hoy.getMonth()+1);
      $('#busqueda_fechas_from_year').val(hoy.getFullYear());
      $('#busqueda_fechas_to_year').val(hoy.getFullYear());
    });

    var ayer = new Date(hoy - new Date(24*60*60*1000));
    $('#ayer-button').click(function(){
        $('#busqueda_fechas_from_day').val(ayer.getDate());
        $('#busqueda_fechas_to_day').val(ayer.getDate());
        $('#busqueda_fechas_from_month').val(ayer.getMonth()+1);
        $('#busqueda_fechas_to_month').val(ayer.getMonth()+1);
        $('#busqueda_fechas_from_year').val(ayer.getFullYear());
        $('#busqueda_fechas_to_year').val(ayer.getFullYear());
    });
    
    var weekago = new Date(hoy - new Date(7*24*60*60*1000));
    $('#semana-button').click(function(){
        $('#busqueda_fechas_from_day').val(weekago.getDate());
        $('#busqueda_fechas_to_day').val(hoy.getDate());
        $('#busqueda_fechas_from_month').val(weekago.getMonth()+1);
        $('#busqueda_fechas_to_month').val(hoy.getMonth()+1);
        $('#busqueda_fechas_from_year').val(weekago.getFullYear());
        $('#busqueda_fechas_to_year').val(hoy.getFullYear());
    });
    
  });
/*]]>*/
</script>