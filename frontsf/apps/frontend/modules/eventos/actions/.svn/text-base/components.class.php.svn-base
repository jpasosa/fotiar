<?php

/**
 * eventos components.
 *
 * @package    Fotiar
 * @subpackage eventos
 * @author     Danilo R. Frid
 * @version    SVN: $Id: components.class.php $
 */
class eventosComponents extends sfComponents
{
  public function executeIndex(sfWebRequest $request) {
  }
  
  public function executeMenuList(sfWebRequest $request) {
    $this->eventos = Doctrine_Query::create()
      ->from('evento')
      ->limit(4) // lo limito por las dudas aunque segun Gaston siempre seran cuatro
      ->execute();
  }
}