<?php use_helper('I18N') ?>

<div class="left-col">

  <div class="col-content">
    <div class="banner">
      <h2 class="title"><?=__('POSTALES')?></h2>
      <div class="content2">
        <?=__('puedes enviarle una postal a un amigo seleccionando el siguiente ico')?>
      </div>
      <div class="icono"></div>
    </div>
  </div>
  
</div>

<div class="right-col">
  <h2><?=__('Completa tu correo electrónico y contraseña para ingresar al sitio.')?></h2>
  
  <?php // include_component('sfApply', 'login') ?>
  <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
</div>