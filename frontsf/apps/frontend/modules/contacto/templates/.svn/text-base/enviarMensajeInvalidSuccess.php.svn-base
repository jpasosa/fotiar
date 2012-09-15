  <?=jq_form_remote_tag(array(
      'update'  => 'contact-container',
      'url'     => '@enviar_mensaje',
      'loading' => '$("#enviar-mensaje-buttons").hide();$("#enviar-mensaje-indicator").show();',
      'complete' => '$("#enviar-mensaje-indicator").fadeOut();',
  ), array(
      'id'     => 'enviar-mensaje-form',
      'method' => 'post',
  ));?>
  
    <?=$form->renderHiddenFields();?>
    <div class="row">
      <?=$form['nombre']->renderLabel(__('Nombre'));?>
      <?=$form['nombre']->render(array('class' => ($form['nombre']->hasError())?'text error':'text'));?>
      <?//=$form['nombre']->renderError();?>
    </div>
    <div class="row">
      <?=$form['telefono']->renderLabel(__('Teléfono'));?>
      <?=$form['telefono']->render(array('class' => ($form['telefono']->hasError())?'text error':'text'));?>
      <?//=$form['telefono']->renderError();?>
    </div>
    <div class="row">
      <?=$form['email']->renderLabel(__('E-Mail'));?>
      <?=$form['email']->render(array('class' => ($form['email']->hasError())?'text error':'text'));?>
      <?//=$form['email']->renderError();?>
    </div>
    <div class="row">
      <?=$form['mensaje']->renderLabel(__('Mensaje'));?>
      <?=$form['mensaje']->render(array('class' => ($form['mensaje']->hasError())?'error':''));?>
      <?//=$form['mensaje']->renderError();?>
    </div>

    <div id="enviar-mensaje-buttons" class="buttons" style="">
      <div class="button-standarization r">
        <span class="left"></span>
        <?=link_to(__('Borrar'), '@contacto', array('class' => 'btn middle'))?>
        <span class="right"></span>
      </div>
      <div class="button-standarization r">
        <span class="left"></span>
        <input name="enviar" type="submit" class="btn middle" value="<?=__('Enviar')?>" />
        <span class="right"></span>
      </div>
    </div>
    
    <div id="enviar-mensaje-indicator" class="buttons" style="display:none;">
      <div class="button-standarization">
        <span class="left"></span>
        <?=link_to(__('Cancelar'), '@contacto', array('class' => 'btn middle'))?>
        <span class="right"></span>
      </div>
      <div class="button-standarization">
        <div><?=__('Enviando...');?></div>
        <?=image_tag('enviando.gif', array('width' => '33', 'height' => '32'))?>
      </div>
    </div>
  </form>