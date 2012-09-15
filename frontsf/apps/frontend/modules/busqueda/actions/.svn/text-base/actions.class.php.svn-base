<?php

/**
 * busqueda actions.
 *
 * @package    Fotiar
 * @subpackage busqueda
 * @author     Danilo R. Frid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class busquedaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request) {
    $this->search_form = new SearchForm();
    /*
    $this->etiquetas_populares = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Tema',
      'method'    => 'getDescripcion',
      'add_empty' => 'Etiquetas más populares...'
    ));
    */

  	$q = Doctrine_Query::create()
  	  ->from('Fotografia f')
  	  ->leftJoin('f.FotografiaTema ft')
  	  ->leftJoin('f.FotografiaLugar fl')
  	  ->leftJoin('f.Sesion s')
  	  ->leftJoin('f.Usuario u')
  	  ->addWhere('f.deleted_at IS NULL');

    if($request->isMethod('POST')):
      $params_busqueda = $request->getParameter('busqueda', array());
      $this->getUser()->setAttribute('search_params', $params_busqueda);
      $this->search_form->bind($params_busqueda);

      $sesion = $params_busqueda['sesion'];
      
      // Si busca por sesion => desestima el resto de los criterios...
      if($sesion != $this->search_form->getDefault('sesion')):
        $q->addWhere('s.descripcion = ?', $sesion);
      // Si no busca por sesion => tiene en cuenta el resto de los criterios...        
      else:
        $q->addWhere('f.sesion_id IS NULL');
        
        $categoria_id = $params_busqueda['categoria_id'];
        if($categoria_id != 0):
          $q->addWhere('f.categoria_id = ?', $categoria_id);
        endif;
        $subcategoria_id = $params_busqueda['subcategoria_id'];
        if($subcategoria_id != 0):
          $q->addWhere('f.subcategoria_id = ?', $subcategoria_id);
        endif;
  
        if(isset($params_busqueda['tema_id']) && !empty($params_busqueda['tema_id'])):
//          $tema_id = implode(',', $params_busqueda['tema_id']);
          $tema_id = $params_busqueda['tema_id'];
          $q->andWhereIn('ft.tema_id', $tema_id);
        endif;
  
        if(isset($params_busqueda['lugar_id']) && !empty($params_busqueda['lugar_id'])):
//          $lugar_id = implode(',', $params_busqueda['lugar_id']);
          $lugar_id = $params_busqueda['lugar_id'];
          $q->andWhereIn('fl.lugar_id', $lugar_id);
        endif;
        
        $fotografo_id = $params_busqueda['usuario_id'];
        if($fotografo_id != 0):
          $q->addWhere('u.id = ?', $fotografo_id);
        endif;
        
        $fechas = $params_busqueda['fechas'];
        $desde = $fechas['from']['year'].'-'.$fechas['from']['month'].'-'.$fechas['from']['day'];
        $hasta = $fechas['to']['year'].'-'.$fechas['to']['month'].'-'.$fechas['to']['day'];
        $q->addWhere('f.taken >= \''.$desde.' 00:00:00\'');
        $q->addWhere('f.taken <= \''.$hasta.' 23:59:59\'');
      endif;

    else:
      $reset_search_params = true;
      // Si busca por sesion => desestima el resto de los criterios...
      if($request->hasParameter('sesion')):
        $sesion = $request->getParameter('sesion');
        if($sesion != $this->search_form->getDefault('sesion')):
          $q->addWhere('s.descripcion = ?', $sesion);
          $this->search_form->setDefault('sesion', $sesion);
          $reset_search_params = false;
        endif;
      // Si no busca por sesion => tiene en cuenta el resto de los criterios...
      else:
        $q->addWhere('f.sesion_id IS NULL');

        if($request->hasParameter('categoria_id')):
          $categoria_id = $request->getParameter('categoria_id');
          $q->addWhere('f.categoria_id = ?', $categoria_id);
          $this->search_form->setDefault('categoria_id', $categoria_id);
          $reset_search_params = false;
        endif;
        if($request->hasParameter('subcategoria_id')):
          $subcategoria_id = $request->getParameter('subcategoria_id');
          $q->addWhere('f.subcategoria_id = ?', $subcategoria_id);
          $this->search_form->setDefault('subcategoria_id', $subcategoria_id);
          $reset_search_params = false;
        endif;
  
        if($request->hasParameter('tema_id')):
          $tema_id = $request->getParameter('tema_id');
          $q->andWhereIn('ft.tema_id', $tema_id);
          $this->search_form->setDefault('tema_id', $tema_id);
          $reset_search_params = false;
        endif;
  
        if($request->hasParameter('lugar_id')):
          $lugar_id = $request->getParameter('lugar_id');
          $q->andWhereIn('fl.lugar_id', $lugar_id);
          $this->search_form->setDefault('lugar_id', $lugar_id);
          $reset_search_params = false;
        endif;
  
        if($request->hasParameter('fotografo_id')):
          $fotografo_id = $request->getParameter('fotografo_id');
          $q->addWhere('u.id = ?', $fotografo_id);
          $this->search_form->setDefault('usuario_id', $fotografo_id);
          $reset_search_params = false;
        endif;
        // TODO: cotejar desde y hasta por separado ?
        if($request->hasParameter('desde') && $request->hasParameter('hasta')):
          $desde = $request->getParameter('desde');
          list($from_year, $from_month, $from_day) = explode('-', $desde);
          $q->addWhere('f.taken >= \''.$desde.' 00:00:00\'');
          $hasta = $request->getParameter('hasta');
          list($to_year, $to_month, $to_day) = explode('-', $hasta);
          $q->addWhere('f.taken <= \''.$hasta.' 23:59:59\'');
          $this->search_form->setDefault('fechas', array(
            'from' => array('day' => $from_day, 'month' => $from_month, 'year' => $from_year),
            'to'   => array('day' => $to_day, 'month' => $to_month, 'year' => $to_year)
          ));
          $reset_search_params = false;
        endif;
      endif;
      if($reset_search_params == true):
        $this->getUser()->setAttribute('search_params', array());
      endif;
      
    endif;
    $q->orderBy('f.taken DESC');
    // TODO: no encuentro como extraer el default desde el template mismo, seria mejor
  	$this->defaultValSesion = $this->search_form->getDefault('sesion');
  	
  	$this->pager = new sfDoctrinePager('Fotografia', 48);
  	$this->pager->setQuery($q);
  	$this->pager->setPage($request->getParameter('page', 1));
  	if(isset($categoria_id)) $this->pager->setParameter('categoria_id', $categoria_id);
  	if(isset($subcategoria_id)) $this->pager->setParameter('subcategoria_id', $subcategoria_id);
  	if(isset($tema_id)) $this->pager->setParameter('tema_id', $tema_id);
  	if(isset($lugar_id)) $this->pager->setParameter('lugar_id', $lugar_id);
  	if(isset($sesion)):
  	 if($sesion != $this->search_form->getDefault('sesion')) $this->pager->setParameter('sesion', $sesion);
    endif;
  	if(isset($fotografo_id)) $this->pager->setParameter('fotografo_id', $fotografo_id);
  	if(isset($desde)) $this->pager->setParameter('desde', $desde);
  	if(isset($hasta)) $this->pager->setParameter('hasta', $hasta);
//    $this->pager->setParameter('busqueda', $params_busqueda);
  	$this->pager->init();
  }
  

  public function executeGuardada(sfWebRequest $request) {
    $this->search_form = new SearchForm();

    $q = Doctrine_Query::create()
      ->from('Fotografia f')
      ->leftJoin('f.FotografiaTema ft')
      ->leftJoin('f.FotografiaLugar fl')
      ->leftJoin('f.Sesion s')
      ->leftJoin('f.Usuario u')
      ->addWhere('f.deleted_at IS NULL');

    $search_params = $this->getUser()->getAttribute('search_params', array());

    // Si busca por sesion => desestima el resto de los criterios...
    if(isset($search_params['sesion'])):
      if($search_params['sesion'] != $this->search_form->getDefault('sesion')):
        $q->addWhere('s.descripcion = ?', $search_params['sesion']);
        $this->search_form->setDefault('sesion', $search_params['sesion']);
      // Si no busca por sesion => tiene en cuenta el resto de los criterios...
      else:
        $this->search_form->setDefault('sesion', $search_params['sesion']);
        $q->addWhere('f.sesion_id IS NULL');
  
        if(isset($search_params['categoria_id'])):
          if($search_params['categoria_id'] != ''):
            $categoria_id = $search_params['categoria_id'];
            $q->addWhere('f.categoria_id = ?', $categoria_id);
            $this->search_form->setDefault('categoria_id', $categoria_id);
          endif;
        endif;
        if(isset($search_params['subcategoria_id'])):
          if($search_params['subcategoria_id'] != ''):
            $subcategoria_id = $search_params['subcategoria_id'];
            $q->addWhere('f.subcategoria_id = ?', $subcategoria_id);
            $this->search_form->setDefault('subcategoria_id', $subcategoria_id);
          endif;
        endif;
  
        if(isset($search_params['tema_id'])):
          $tema_id = $search_params['tema_id'];
          $q->andWhereIn('ft.tema_id', $tema_id);
          $this->search_form->setDefault('tema_id', $tema_id);
        endif;
  
        if(isset($search_params['lugar_id'])):
          $lugar_id = $search_params['lugar_id'];
          $q->andWhereIn('fl.lugar_id', $lugar_id);
          $this->search_form->setDefault('lugar_id', $lugar_id);
        endif;
  
        if(isset($search_params['fotografo_id'])):
          $fotografo_id = $search_params['fotografo_id'];
          $q->addWhere('u.id = ?', $fotografo_id);
          $this->search_form->setDefault('usuario_id', $fotografo_id);
        endif;
        // TODO: cotejar desde y hasta por separado ?
        if(isset($search_params['fechas']['from']) && isset($search_params['fechas']['to'])):
          $from_year = $search_params['fechas']['from']['year'];
          $from_month = $search_params['fechas']['from']['month'];
          $from_day = $search_params['fechas']['from']['day'];
          $desde = $from_year.'-'.$from_month.'-'.$from_day;
          $q->addWhere('f.taken >= \''.$desde.' 00:00:00\'');
          $to_year = $search_params['fechas']['to']['year'];
          $to_month = $search_params['fechas']['to']['month'];
          $to_day = $search_params['fechas']['to']['day'];
          $hasta = $to_year.'-'.$to_month.'-'.$to_day;
          $q->addWhere('f.taken <= \''.$hasta.' 23:59:59\'');
          $this->search_form->setDefault('fechas', array(
            'from' => array('day' => $from_day, 'month' => $from_month, 'year' => $from_year),
            'to'   => array('day' => $to_day, 'month' => $to_month, 'year' => $to_year)
          ));
        endif;
      endif;
    else:
      $q->addWhere('f.sesion_id IS NULL');
    endif;
      
    $q->orderBy('f.taken DESC');
    // TODO: no encuentro como extraer el default desde el template mismo, seria mejor
    $this->defaultValSesion = $this->search_form->getDefault('sesion');
    
    $this->pager = new sfDoctrinePager('Fotografia', 48);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    if(isset($categoria_id)) $this->pager->setParameter('categoria_id', $categoria_id);
    if(isset($subcategoria_id)) $this->pager->setParameter('subcategoria_id', $subcategoria_id);
    if(isset($tema_id)) $this->pager->setParameter('tema_id', $tema_id);
    if(isset($lugar_id)) $this->pager->setParameter('lugar_id', $lugar_id);
    if(isset($sesion)):
     if($sesion != $this->search_form->getDefault('sesion')) $this->pager->setParameter('sesion', $sesion);
    endif;
    if(isset($fotografo_id)) $this->pager->setParameter('fotografo_id', $fotografo_id);
    if(isset($desde)) $this->pager->setParameter('desde', $desde);
    if(isset($hasta)) $this->pager->setParameter('hasta', $hasta);
//    $this->pager->setParameter('busqueda', $params_busqueda);
    $this->pager->init();
    $this->setTemplate('index');
  }
 
  
  public function executeAutocompletarEtiquetas($request) {
    $this->getResponse()->setContentType('application/json');
    $etiquetas = Doctrine::getTable('Tema')
      ->retrieveForSelect($request->getParameter('q'), $request->getParameter('limit'));
    return $this->renderText(json_encode($etiquetas));
  }
}