<?php

/**
 * favoritas actions.
 *
 * @package    Fotiar
 * @subpackage favoritas
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class favoritasActions extends sfActions
{
  public function executeIndex(sfWebRequest $request) {
    $q = Doctrine_Query::create()
      ->from('Fotografia f')
      ->leftJoin('f.SfGuardUserProfileFotografias uf ON uf.fotografia_id = f.id')
      ->addWhere('uf.sf_guard_user_profile_id = ?', $this->getUser()->getGuardUser()->getProfile()->getId())
      ->addWhere('uf.status = ?', 'favorita')
      ->orderBy('uf.id desc');
    
    $this->pager = new sfDoctrinePager('Fotografia', 12);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  
  public function executePapelera(sfWebRequest $request) {
    $q = Doctrine_Query::create()
      ->from('Fotografia f')
      ->leftJoin('f.SfGuardUserProfileFotografias uf ON uf.fotografia_id = f.id')
      ->addWhere('uf.sf_guard_user_profile_id = ?', $this->getUser()->getGuardUser()->getProfile()->getId())
      ->addWhere('uf.status = ?', 'papelera')
      ->orderBy('uf.id desc');
    
    $this->pager = new sfDoctrinePager('Fotografia', 12);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
  
  
  public function executeAddFromResults(sfWebRequest $request) {
    if ($request->hasParameter('fotografia_id')):
      $favorita = new sfGuardUserProfileFotografia();
      $favorita->setSfGuardUserProfileId($this->getUser()->getGuardUser()->getProfile()->id);
      $favorita->setFotografiaId($request->getParameter('fotografia_id'));
      $favorita->setStatus('favorita'); // 1?
      $favorita->save();
    endif;
  }

  
  public function executeAddFromLightbox(sfWebRequest $request) {
    if ($request->hasParameter('fotografia_id')):
      $favorita = new sfGuardUserProfileFotografia();
      $favorita->setSfGuardUserProfileId($this->getUser()->getGuardUser()->getProfile()->id);
      $favorita->setFotografiaId($request->getParameter('fotografia_id'));
      $favorita->setStatus('favorita'); // 1?
      $favorita->save();
      $this->foto_id = $request->getParameter('fotografia_id');
    endif;
  }

  
  public function executeDeleteFromResults(sfWebRequest $request) {
    if ($request->hasParameter('fotografia_id')):
      $user_id = $this->getUser()->getGuardUser()->getProfile()->id;
      
      $favorita_existente = Doctrine_Query::create()
        ->from('sfGuardUserProfileFotografia')
        ->addWhere('sf_guard_user_profile_id = ?', $user_id)
        ->addWhere('fotografia_id = ?', $request->getParameter('fotografia_id'))
        ->fetchOne();
      $favorita_existente->setStatus('papelera'); // 3?
      $favorita_existente->save();
    endif;

    $this->redirect('@favoritas');
//    return sfView::NONE;
  }

  
  public function executeDeleteFromPapelera(sfWebRequest $request) {
    if ($request->hasParameter('fotografia_id')):
      $user_id = $this->getUser()->getGuardUser()->getProfile()->id;
      
      $favorita_existente = Doctrine_Query::create()
        ->from('sfGuardUserProfileFotografia')
        ->addWhere('sf_guard_user_profile_id = ?', $user_id)
        ->addWhere('fotografia_id = ?', $request->getParameter('fotografia_id'))
        ->fetchOne();
        
      $favorita_existente->delete();
    endif;
    
    $this->redirect('@papelera');
//    return sfView::NONE;
  }
  
  
  public function executeRestoreFromPapelera(sfWebRequest $request) {
    if ($request->hasParameter('fotografia_id')):
      $user_id = $this->getUser()->getGuardUser()->getProfile()->id;
      
      $favorita_existente = Doctrine_Query::create()
        ->from('sfGuardUserProfileFotografia')
        ->addWhere('sf_guard_user_profile_id = ?', $user_id)
        ->addWhere('fotografia_id = ?', $request->getParameter('fotografia_id'))
        ->fetchOne();
        
      $favorita_existente->setStatus('favorita'); // 3?
      $favorita_existente->save();
    endif;
    
    $this->redirect('@papelera');
//    return sfView::NONE;
  }

  
  public function executeVaciarPapelera(sfWebRequest $request) {
    $user_id = $this->getUser()->getGuardUser()->getProfile()->id;
    
    $favoritas_en_papelera = Doctrine_Query::create()
      ->from('sfGuardUserProfileFotografia uf')
      ->addWhere('uf.sf_guard_user_profile_id = ?', $user_id)
      ->addWhere('uf.status = ?', 'papelera')
      ->execute();
    
    foreach ($favoritas_en_papelera as $favorita_existente):
      $favorita_existente->delete();
    endforeach;
    
    $this->forward('favoritas', 'papelera');
  }
}