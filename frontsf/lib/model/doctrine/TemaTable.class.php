<?php

/**
 * TemaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TemaTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object TemaTable
   */
  public static function getInstance() {
    return Doctrine_Core::getTable('Tema');
  }
  
  
  public function retrieveForSelect($q, $limit=10) {
    $etiquetas = Doctrine_Query::create()
      ->from('Tema t')
      ->where('t.descripcion like \'%'.$q.'%\'')
      ->limit($limit)
      ->execute();
      
    $ret_etiquetas = array();
    foreach ($etiquetas as $etiqueta):
      $ret_etiquetas[$etiqueta->getId()] = $etiqueta->getDescripcion();
    endforeach;
 
    return $ret_etiquetas;
  }
  
  
    public static function retrieveAllNotDeleted() {
      $categorias = Doctrine_Query::create()
        ->from('tema')
        ->addWhere('deleted_at IS NULL');  
      return $categorias->execute();
    }
}