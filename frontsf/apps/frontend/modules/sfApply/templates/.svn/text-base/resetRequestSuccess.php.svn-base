<?php slot('sf_apply_login') ?>
<?php end_slot() ?>

<div class="left-col">
  <div class="col-content">
    <? include_partial('global/modulito_banner_postal') ?>
  </div>
</div>

<div class="right-col">
  <h2><?=__('Has olvidado tu contraseña?')?></h2>
  <p><?=__('Ingresa tu email y te enviaremos un correo con indicaciones.')?></p>
  
  <form method="POST" action="<?=url_for('sfApply/resetRequest')?>" name="sf_apply_reset_request" id="sf_apply_reset_request">
    <div class="entire-col">
      <p class="centered">
        <?=$form['username_or_email']->renderLabel(__('E-Mail'))?>  
        <?=$form['username_or_email']->render(array('class' => ($form['username_or_email']->hasError())?'text error':'text'))?>
      </p>
    </div>
    <div class="entire-col">
      <?=$form->renderHiddenFields()?>
      <div class="button-standarization">
        <span class="left"></span>
        <input type="submit" class="submit middle" value="<?=__("Recuperar")?>">
        <span class="right"></span>
      </div>
    </div>
  </form>
</div>
