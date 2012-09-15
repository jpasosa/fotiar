<?php

/**
 * Fotografia
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Fotiar
 * @subpackage model
 * @author     Danilo R. Frid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Fotografia extends BaseFotografia
{
  public function getThumbSrc($to_be_used_in, $with_watermark=true) {
    $ret = "";
    switch ($to_be_used_in) {
      case 'checkout-list':
        $ret = Hormi::getThumbnail($this->getNombreArchivo(), sfConfig::get('app_url_backend').'fotos/', 'fotos', 69, 46, true, false);
        break;
      case 'search-list':
        // MODIFICADO A PARTIR DE UNA NOTORIA LENTITUD, EL CLIENTE PIDIO QUE CARGUE LOS THUMBS GENERADOS POR EL PANEL ADMIN
//        $ret = Hormi::getThumbnail($this->getNombreArchivo(), sfConfig::get('app_url_backend').'fotos/', 'fotos', 230, 153, true, false);
          $ret = sfConfig::get('app_url_backend').'fotos/thumbs/t'.$this->getNombreArchivo();
        break;
      case 'search-zoom':
        $ret = Hormi::getThumbnail($this->getNombreArchivo(), sfConfig::get('app_url_backend').'fotos/', 'fotos', 690, 459, false, $with_watermark);
        break;
    }
    return $ret;
  }
  
  
  public function isFavorita($frontuser_id) {
    $q = Doctrine_Query::create()
      ->from('sfGuardUserProfileFotografia')
      ->where('fotografia_id = ?', $this->id)
      ->addWhere('sf_guard_user_profile_id = ?', $frontuser_id)
      ->addWhere('status = ?', 'favorita')
      ->fetchOne();
    return (!empty($q));
  }
  
  
  public function isComprada($frontuser_id) {
    // sfGuardUser tiene un getPedidos()
    $pedidos = Doctrine_Query::create()
      ->from('Pedido')
      ->addWhere('user_id = ?', $frontuser_id)
      ->addWhere('is_pagado = ?', 1)
      ->execute();
    
    foreach($pedidos as $pedido):
      foreach($pedido->getItems() as $item):
        if($item->fotografia_id == $this->id):
          return true;
        endif;
      endforeach;
    endforeach;
    
    return false;
  }
  
  
  public function isPendiente($frontuser_id) {
    // sfGuardUser tiene un getPedidos()
    $pedidos = Doctrine_Query::create()
      ->from('Pedido')
      ->addWhere('user_id = ?', $frontuser_id)
      ->addWhere('status = ?', 'stable')
      ->addWhere('is_pagado = ?', 0)
      ->execute();
    
    foreach($pedidos as $pedido):
      foreach($pedido->getItems() as $item):
        if($item->fotografia_id == $this->id):
          return true;
        endif;
      endforeach;
    endforeach;
    
    return false;
  }
  
  
  public function getEtiquetasMezcladasAsString($cantidad=0) {
    $etiquetas = '';
    $temas = $this->getTemas();
    $lugares = $this->getLugares();
    
    if($cantidad == 0):
      $cantidad = count($temas) + count($lugares);
    endif;
    
    $ind = 0;
    $cont = 1;
    while($cont < $cantidad AND ($ind < count($temas) OR $ind < count($lugares))):
      if($ind < count($temas)):
        $etiquetas .= $temas[$ind].', ';
        $cont++;
      endif;
      if($cont < $cantidad):
        if($ind < count($lugares)):
          $etiquetas .= $lugares[$ind].', ';
          $cont++;
        endif;
      endif;
      $ind++;
    endwhile;
    if($etiquetas!=''):
      $etiquetas = substr($etiquetas, 0, strlen($etiquetas)-2);
    endif;
    
    return $etiquetas;
  }
}