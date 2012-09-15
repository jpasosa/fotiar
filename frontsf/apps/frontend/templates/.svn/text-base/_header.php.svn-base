  <div id="header">
    <div id="h-logo">
      <?=link_to(image_tag('layout/header_logo.png'), '@homepage');?>
    </div>
    
    <div id="h-cont">
    
      <div id="h-misc">
        <div class="lang">
          <div><?=link_to_unless(($sf_user->getCulture()=='es'), 'Español', '@change_language?lang=es');?></div>
          <div class="separator">|</div>
          <div><?=link_to_unless(($sf_user->getCulture()=='en'), 'English', '@change_language?lang=en');?></div>
          <div class="separator">|</div>
          <div><?=link_to_unless(($sf_user->getCulture()=='pt'), 'Portugues', '@change_language?lang=pt');?></div>
        </div>
        
        <? include_component('user', 'loginBox'); ?>

       </div>
      
      <div id="h-buttons">
        <div class="principal">
          <div class="left item">&nbsp;</div>
          
          <ul id="jsddm">
            <li class="item">
              <?=link_to(__('Home'), '@homepage', array('class' => ($sf_context->getModuleName()=='home')?'active':''));?>
            </li>
            <li class="separator item">&nbsp;</li>
            <li class="item">
              <?=link_to(__('Buscar Fotos'), '@busqueda', array('class' => ($sf_context->getModuleName()=='busqueda')?'active':''));?>
            </li>
            <li class="separator item">&nbsp;</li>
            <li class="item">
              <?=link_to(__('Eventos'), '@homepage', array('class' => ($sf_context->getModuleName()=='eventos')?'active':''));?>
              <ul><? include_component('eventos', 'menuList'); ?></ul>
            </li>
            <li class="separator item">&nbsp;</li>
            <li class="item">
              <?=link_to(__('Favoritas'), '@favoritas', array('class' => ($sf_context->getModuleName()=='favoritas')?'active':''));?>
            </li>
            <li class="separator item">&nbsp;</li>
            <li class="item">
              <?=link_to(__('Contacto'), '@contacto', array('class' => ($sf_context->getModuleName()=='contacto')?'active':''));?>
            </li>
          </ul>
          
        <div class="right item">&nbsp;</div>
        </div>
      </div>
      
    </div>
  </div>