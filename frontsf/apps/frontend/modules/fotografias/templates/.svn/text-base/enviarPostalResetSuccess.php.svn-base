  <?=jq_form_remote_tag(array(
      'update'  => 'postal-container',
      'url'     => '@enviar_postal',
      'loading' => '$("#enviar-postal-buttons").hide();$("#enviar-postal-indicator").show();',
      'complete' => '$("#enviar-postal-indicator").fadeOut();',
  ), array(
      'id'     => 'enviar-postal-form',
      'method' => 'post',
  ));?>
  
    <?=$postal_form->renderHiddenFields();?>
    <div class="left-col">
      <div class="row">
        <?=$postal_form['mensaje']->renderLabel(__('Mensaje'));?>
        <?=$postal_form['mensaje']->render(array('class' => ($postal_form['mensaje']->hasError())?'error':''));?>
      </div>
    </div>
    <div class="right-col">
      <div class="row">
        <?=$postal_form['nombre']->renderLabel(__('Nombre Destinatario'))?>
        <?=$postal_form['nombre']->render(array('class' => ($postal_form['nombre']->hasError())?'text error':'text'));?>
      </div>
      <div class="row">
        <?=$postal_form['email']->renderLabel(__('E-Mail Destinatario'))?>
        <?=$postal_form['email']->render(array('class' => ($postal_form['email']->hasError())?'text error':'text'));?>
      </div>
      <div id="enviar-postal-buttons" class="buttons">
        <?=jq_link_to_function(__('Borrar'),
            '$(this).parents("form").each (function(){this.reset();});',
            array('class' => 'btn'));?>
        <input name="enviar" type="submit" class="btn" value="<?=__('Enviar');?>" />
      </div>
    </div>
    <div id="enviar-postal-indicator" class="buttons" style="display:none;">
      <?=jq_link_to_function(__('Cancelar'),
          '$.colorbox.close()',
          array('class' => 'btn'));?>
      
      <div><?=__('Enviando...');?></div>
      <?=image_tag('enviando.gif', array('width' => '33', 'height' => '32'));?>
    </div>    
  </form>