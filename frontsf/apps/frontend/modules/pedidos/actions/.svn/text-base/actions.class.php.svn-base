<?php

/**
 * pedidos actions.
 *
 * @package    Fotiar
 * @subpackage pedidos
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pedidosActions extends sfActions
{
  public function executeIndex(sfWebRequest $request) {
    $pedidos = $this->getUser()->getGuardUser()->getPedidos();

    $ids_compradas = array();
    // Le agrego el 0 como indice pues de otro modo, en el cso en que ids_compradas es vacio la query me trae todos.
    $ids_compradas[] = 0;
    
    foreach($pedidos as $pedido):
      // Este if se podria obviar armando un getPedidosPagados para sfGuardUser y usandolo mas arriba
      if($pedido->getIsPagado() == 1):
        foreach($pedido->getItems() as $item):
          $ids_compradas[] = $item->fotografia_id;
        endforeach;
      endif;
    endforeach;
    
    $q = Doctrine_Query::create()
      ->from('Fotografia f')
      ->whereIn('id', $ids_compradas);
    
    $this->pager = new sfDoctrinePager('Fotografia', 12);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  
  public function executeDescargar(sfWebRequest $request) {
    $foto = doctrine::getTable('fotografia')->findOneById($request->getParameter('fotografia_id'));
//    $comprada = Doctrine_Query::create()
//      ->from('sfGuardUserProfileFotografia')
//      ->addWhere('sf_guard_user_profile_id = ?', $this->getUser()->getGuardUser()->getProfile()->id)
//      ->addWhere('fotografia_id = ?', $request->getParameter('fotografia_id'))
//      ->addWhere('status = ?', 'comprada')
//      ->fetchOne();
    
//    if($comprada):
    if($foto->isComprada($this->getUser()->getGuardUser()->id)):
      header('Content-Type: image/jpeg');
//      header('Content-Length: 1234');
      header('Content-Disposition: attachment;filename="'.$foto->getNombreArchivo().'"');
      $fp = fopen(sfConfig::get('app_url_backend').'fotos/'.$foto->getNombreArchivo(), 'r');
      fpassthru($fp);
      fclose($fp);
//      $this->redirect(sfConfig::get('app_url_backend').'fotos/'.$foto->getNombreArchivo());
    else:
      $this->redirect('@pedidos_anteriores');
    endif;
    return sfView::NONE;
  }
}
