<?php

/**
 * language actions.
 *
 * @package    Fotiar
 * @subpackage language
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class languageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request) {
  }
  
  
  public function executeChangeLanguage(sfWebRequest $request) {    
    $old_lang = $this->getUser()->getCulture();
    $old_url = $request->getReferer();
    $new_lang = $request->getParameter('lang');
    $new_url = str_replace('/'.$old_lang.'/', '/'.$new_lang.'/', $old_url);
    $this->getUser()->setCulture($new_lang);
    
    return $this->redirect($new_url);
  }
}