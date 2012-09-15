<?php use_helper('I18N') ?>

<form method="post" action="<?=url_for("@sf_guard_signin")?>" name="sf_guard_signin" id="sf_guard_signin" class="sf_apply_signin_inline">

  <div class="half-col">
    <?=$form['username']->renderLabel(__('E-Mail'))?>
    <?=$form['username']->render(array('class' => ($form['username']->hasError())?'text error':'text'))?>
    <?//=$form['username']->renderError()?>
  </div>
  
  <div class="half-col">
    <?=$form['password']->renderLabel(__('Contraseña'))?>
    <?=$form['password']->render(array('class' => ($form['password']->hasError())?'text error':'text'))?>
    <?//=$form['password']->renderError()?>
  </div>
  
  <div class="entire-col">
    <?=$form->renderHiddenFields()?>
    <div class="button-standarization">
      <span class="left"></span>
      <input type="submit" value="<?=__('Acceder')?>" class="submit middle" />
      <span class="right"></span>
    </div>
  </div>
</form>

<div class="entire-col other-actions">
  <?=link_to(__('¿Aún no estas registrado?'), 'sfApply/apply')?> |
  <?=link_to(__('Recuperar contraseña'), 'sfApply/resetRequest')?>
</div>