<?php slot('sf_apply_login') ?>
<?php end_slot() ?>

<div class="left-col">
  <div class="col-content">
    <? include_partial('global/modulito_banner_postal') ?>
  </div>
</div>

<div class="right-col">
  <h2><?=__('Gracias por confirmar tu dirección de correo')?></h2>
  <p><?=__('Ahora puedes cambiar tu contraseña completando estos campos:')?></p>
  
  <form method="post" action="<?=url_for("sfApply/reset")?>" name="sf_apply_reset_form" id="sf_apply_reset_form">
    <div class="entire-col">
      <p class="centered">
        <?=$form['password']->renderLabel(__('Contraseña Nueva'))?>
        <?=$form['password']->render(array('class' => ($form['password']->hasError())?'text error':'text'))?>
      </p>
    </div>
    <div class="entire-col">
      <p class="centered">
        <?=$form['password2']->renderLabel(__('Conf. contraseña'))?>
        <?=$form['password2']->render(array('class' => ($form['password2']->hasError())?'text error':'text'))?>
      </p>
    </div>
    
    <div class="entire-col">
      <?=$form->renderHiddenFields()?>
      <div class="button-standarization">
        <span class="left"></span>
        <input type="submit" class="submit middle" value="<?=__('Reestablecer')?>">
        <span class="right"></span>
      </div>
    </div>
  </form>
</div>