<div id="user-box">
  <? if($sf_user->isAuthenticated()): ?>
    <?=__('Bienvenido').' '.$sf_user;?> | <?=link_to(__('Salir'), '@sf_guard_signout');?> | <?=link_to(__('Carrito (%1%)', array('%1%' => count($cart->getItems()))), '@shop', array('id'=>'carrito-header' , 'class'=>'carrito'))?>
  <? else: ?>
    <div class="line-links">
      <div class="login-msg"></div>
      <?=link_to(__('¿Aún no estas registrado?'), '@apply');?>
      <span class="separator">|</span>
      <?=link_to(__('Recuperar contraseña'), '@resetRequest');?>
    </div>

    <form id="login" name="login" enctype="application/x-www-form-urlencoded" method="post" action="<?php echo url_for('@sf_guard_signin') ?>">
        <dt id="username-label">
            <label for="username" class="required">Usuario:</label>
        </dt>
        <dd id="username-element">
            <?php echo $form['username']->render(array("class" => "text")) ?>
        </dd>
        <dt id="password-label">
            <label for="password" class="required">Contraseña:</label>
        </dt>
        <dd id="password-element">
            <?php echo $form['password']->render(array("class" => "text")) ?>
        </dd>

        <dt id="submit-label">&nbsp;</dt>
        <dd id="submit-element">
            <input type="submit" name="submit" id="submit" value="" class="submit">
        </dd>
        
        <?php echo $form->renderHiddenFields() ?>
    </form>
  <? endif; ?>
</div>