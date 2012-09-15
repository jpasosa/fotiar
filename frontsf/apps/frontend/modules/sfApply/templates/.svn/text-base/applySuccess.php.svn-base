<?php
  // Override the login slot so that we don't get a login prompt on the
  // apply page, which is just odd-looking. 0.6
?>
<?php slot('sf_apply_login') ?>
<?php end_slot() ?>

<div class="left-col">
  <div class="col-content">
    <? include_partial('global/modulito_banner_postal') ?>
  </div>
</div>

<div class="right-col">
  <h2><?=__('Completa el Formulario y podrás acceder a todos los beneficios de FOTIAR')?></h2>
  
  <form method="post" action="<?=url_for('sfApply/apply')?>" name="sf_apply_apply_form" id="sf_apply_apply_form">
      <div class="half-col">
        <?=$form['firstname']->renderLabel(__('Nombre'))?>
        <?=$form['firstname']->render(array('class' => ($form['firstname']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['lastname']->renderLabel(__('Apellido'))?>
        <?=$form['lastname']->render(array('class' => ($form['lastname']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['email']->renderLabel(__('E-Mail'))?>
        <?=$form['email']->render(array('class' => ($form['email']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['email2']->renderLabel(__('Conf. E-Mail'))?>
        <?=$form['email2']->render(array('class' => ($form['email2']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['password']->renderLabel(__('Clave'))?>
        <?=$form['password']->render(array('class' => ($form['password']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['password2']->renderLabel(__('Conf. Clave'))?>
        <?=$form['password2']->render(array('class' => ($form['password2']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['country']->renderLabel(__('Pais'))?>
        <?=$form['country']->render(array('class' => ($form['country']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['city']->renderLabel(__('Ciudad'))?>
        <?=$form['city']->render(array('class' => ($form['city']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['address']->renderLabel(__('Dirección'))?>
        <?=$form['address']->render(array('class' => ($form['address']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['phone']->renderLabel(__('Teléfono'))?>
        <?=$form['phone']->render(array('class' => ($form['phone']->hasError())?'text error':'text'))?>
      </div>
      <div class="half-col">
        <?=$form['birthdate']->renderLabel(__('Fecha Nac.'))?>
        <?=$form['birthdate']->render(array('class' => ($form['birthdate']->hasError())?'text error':'text'))?>
      </div>
            
      <div class="half-col">
        <?=$form->renderHiddenFields()?>
        <div class="button-standarization r">
          <span class="left"></span>
          <?=link_to(__('Borrar'), '@registro', array('class' => 'borrar middle'))?>
          <span class="right"></span>
        </div>
        <div class="button-standarization r">
          <span class="left"></span>
          <input type="submit" class="submit middle" value="<?=__('Enviar')?>" />
          <span class="right"></span>
        </div>
      </div>
  </form>
</div>