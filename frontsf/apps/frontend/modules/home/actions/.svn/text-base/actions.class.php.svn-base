<?php

/**
 * home actions.
 *
 * @package    fotiar
 * @subpackage home
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request) {
    if (!$request->getParameter('sf_culture')):
      if ($this->getUser()->isFirstRequest()):
        $culture = $request->getPreferredCulture(array('es', 'en', 'pt'));
        $this->getUser()->setCulture($culture);
        $this->getUser()->isFirstRequest(false);
      else:
        $culture = $this->getUser()->getCulture();
      endif;
      $this->redirect('localized_homepage');
    endif;
    
    $this->eventos = Doctrine_Query::create()
      ->from('evento')
      ->limit(4) // lo limito por las dudas aunque segun Gaston siempre seran cuatro
      ->execute();
  }
}