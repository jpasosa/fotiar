<?php
/**
 * Copyright (C) 2008 Marcelo Costanzi - www.dotdev.com.ar
 * 
 * This file is part of Sistema RENYCOA
 *
 * Sistema RENYCOA is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Sistema RENYCOA is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Sistema RENYCOA.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

class FotografiaController extends Drumbit_CustomController
{
	var $_parent;
	
	function indexAction()
    {
		$session = new Zend_Session_Namespace();
		
		$form = new forms_Busqueda();
		
		if ($this->getRequest()->getParam('id'))
		{
			$busqueda = models_Busqueda::findByPK($this->getRequest()->getParam('id'));
			$busqueda->fechainicial = str_replace('-','/',substr($busqueda->fechainicial, 0, 10));
			$busqueda->fechafinal = str_replace('-','/',substr($busqueda->fechafinal, 0, 10));
			$form->populate((array)$busqueda);
			
			$idlugares = explode(',',$busqueda->idetiquetalugar);
			foreach ($idlugares as $l)
			{
				$lugares[$l] = models_Lugar::findByPK($l);
				
			}			
			$form->populate(array('lugares'=> extractAttributeArray($lugares,'id')));

			$idtemas = explode(',',$busqueda->idetiquetatema);
			foreach ($idtemas as $t)
			{
				$temas[$t] = models_Tema::findByPK($t);
				
			}			
			$form->populate(array('temas'=> extractAttributeArray($temas,'id')));
			
			$form->populate(array('hidden_subcategoria_id' => $busqueda->subcategoria_id));
			
		}
		else 
		{
			$busqueda = new models_Busqueda();
		}
		
		if ($this->getRequest()->isPost())
			{
			if($form->isValid($_POST))
	    		{
	    			$busqueda->setAll($form->getValues());
	    			
	    			if(!$form->getElement('carga_id')->getValue())
	    			{
	    				$busqueda->carga_id = null;	
	    			}	
	    			
	    			if (!$busqueda->sesion_id)
					{
						$busqueda->idetiquetalugar = implode(',',(array)$form->getValue('lugares'));
						$busqueda->idetiquetatema = implode(',',(array)$form->getValue('temas'));
					}
					$busqueda->untagged = false;
	    			$busqueda->save();	

	    			$this->_redirect(getControllerUrl('fotografia','results', array('id' => $busqueda->id)));
	    		}
			}
		
		$this->view->pageTitle = "Busqueda de Fotografías";
		$this->view->form = $form;
    }   
    
    function resultsAction()
    {
    	$session = new Zend_Session_Namespace();

    	$fotografias = array();
    	
    	$busqueda = models_Busqueda::findByPK($this->getRequest()->getParam('id'));
    	
    	$fotografias = models_Fotografia::search($busqueda);
      	
		if (count($fotografias))
		{
			$form = new forms_aCatalogar($fotografias);
		} 

		$idsCatalogo = '';

		if ($this->getRequest()->isPost())
			{
			if($form->isValid($_POST))
	    		{
		        	foreach ($fotografias as $p)
					{
						if ($form->getElement('c'.$p->id)->isChecked())
						{
							if($idsCatalogo == '')
							{
								$idsCatalogo = $p->id;
								
							}
							else 
							{
								$idsCatalogo = $idsCatalogo.','.$p->id;
							}
						}
					}
					if($idsCatalogo != '')
					{
						if($p->sesion_id)
						{
							$this->_redirect(getControllerUrl('fotografia','editgroupsesion', array('idsCatalogo' => $idsCatalogo, 'busqueda'=>$busqueda->id)));
						}
						else 
						{
							$this->_redirect(getControllerUrl('fotografia','editgroup', array('idsCatalogo' => $idsCatalogo, 'busqueda'=>$busqueda->id)));	
						}
					}
					else 
					{
						Zend_Registry::get('messagehandler')->add('INFO', 'Debe seleccionar al menos una fotografia para catalogar.');
					}
				}	
	   		}
	     	$this->view->pageTitle = "Catalogar Fotografías";
	    	$this->view->img_folder = Zend_Registry::get('config')->img_folder;
	    	$this->view->thumb_max_width = Zend_Registry::get('config')->thumb_max_width;
	    	$this->view->thumb_max_height = Zend_Registry::get('config')->thumb_max_height;
	    	$this->view->fotografias = $fotografias;
	    	$this->view->control = 'fotografia';
	    	$this->view->act = 'results';
	    	$this->view->busqueda = $busqueda->id;
	    	if (count($fotografias)){$this->view->form = $form;}       
	}
    
	function editgroupAction()
    {
		$session = new Zend_Session_Namespace();
		$form = new forms_Catalogado();
		$ids = explode(',',$this->getRequest()->getParam('idsCatalogo')); 
		if ($this->getRequest()->isPost())
			{
			if($form->isValid($_POST))
	    		{
	    			foreach($ids as $f)
	    			{
	    				$fotografia = models_Fotografia::findByPK($f);
	    				if ($form->getValue('categoria_id'))
	    				{
	    					$fotografia->categoria_id = $form->getValue('categoria_id');
	    					$fotografia->subcategoria_id = $form->getValue('subcategoria_id');
	    				}
	    				if ($form->getValue('precio'))
	    				{
	    					$fotografia->precio = str_replace(',','.',$form->getValue('precio'));
	    				}

	    				$fotografia->save();

				        foreach ((array)$form->getValue('temas') as $tema_id)
				        {
					        if(!models_FotografiaTema::findFotografiaTema($fotografia->id, $tema_id))
					        {
					        	$ft = new models_FotografiaTema();
						        $ft->fotografia_id = $fotografia->id;
						        $ft->tema_id = $tema_id;
						        $ft->save();	
					        }
				        }
						if ($this->getRequest()->getParam('tema'))
						{
		    				foreach ((array)explode(',',$this->getRequest()->getParam('tema')) as $tema)
					        {
						        $tema = trim(ucwords($tema));
						        $tema_id = models_Tema::findbyDescription($tema);
					        	if(!$tema_id && $tema != '')
						        {
						        	$t = new models_Tema();
							        $t->descripcion = $tema;
							        $t->save();
							        $t = models_Tema::findbyDescription($tema);
							        $ft = new models_FotografiaTema();
							        $ft->fotografia_id = $fotografia->id;
							        $ft->tema_id = $t;
							        $ft->save();	
						        }
						        else 
						        {
							        if(!models_FotografiaTema::findFotografiaTema($fotografia->id, $tema_id))
							        {
							        	$ft = new models_FotografiaTema();
								        $ft->fotografia_id = $fotografia->id;
								        $ft->tema_id = $tema_id;
								        $ft->save();	
							        }
						        }
					        }
						}
					    foreach ((array)$form->getValue('lugares') as $lugar_id)
				        {
					        if(!models_FotografiaLugar::findFotografiaLugar($fotografia->id, $lugar_id))
					        {
					        	$fl = new models_FotografiaLugar();
						        $fl->fotografia_id = $fotografia->id;
						        $fl->lugar_id = $lugar_id;
						        $fl->save();	
					        }
				        }
				        
						if ($this->getRequest()->getParam('lugar'))
						{
		    				foreach ((array)explode(',',$this->getRequest()->getParam('lugar')) as $lugar)
					        {
						        $lugar = trim(ucwords($lugar));
						        $lugar_id = models_Lugar::findbyDescription($lugar);
					        	if(!$lugar_id && $lugar != '')
						        {
						        	$l = new models_Lugar();
							        $l->descripcion = $lugar;
							        $l->save();
							        $l = models_Lugar::findbyDescription($lugar);
							        $fl = new models_FotografiaLugar();
							        $fl->fotografia_id = $fotografia->id;
							        $fl->lugar_id = $l;
							        $fl->save();	
						        }
						        else 
						        {
							        if(!models_FotografiaLugar::findFotografiaLugar($fotografia->id, $lugar_id))
							        {
							        	$fl = new models_FotografiaLugar();
								        $fl->fotografia_id = $fotografia->id;
								        $fl->lugar_id = $lugar_id;
								        $fl->save();	
							        }
						        }
					        }
					        
		    			}
	    			}
					$this->_redirect(getControllerUrl('fotografia','results', array('id'=> $this->getRequest()->getParam('busqueda'))));
	    			Zend_Registry::get('messagehandler')->add('INFO', 'Se han catalogado las fotografías seleccionadas.');
	    		}
			}
		
		
		$this->view->pageTitle = "Catalogar Fotografías";
    	$this->view->img_folder = Zend_Registry::get('config')->img_folder;
    	$this->view->thumb_max_width = Zend_Registry::get('config')->thumb_max_width;
    	$this->view->thumb_max_height = Zend_Registry::get('config')->thumb_max_height;

      	$fotografias = array();
		foreach($ids as $f)
		{
			$fotografias[$f] = models_Fotografia::findByPK($f);
		}
		$this->view->busqueda = $this->getRequest()->getParam('busqueda');		
		$this->view->fotografias = $fotografias;
		$this->view->form = $form;
    }
    
	function editgroupsesionAction()
    {
		$session = new Zend_Session_Namespace();
		$form = new forms_CatalogadoSesion();
		$ids = explode(',',$this->getRequest()->getParam('idsCatalogo')); 
		if ($this->getRequest()->isPost())
			{
			if($form->isValid($_POST))
	    		{
	    			foreach($ids as $f)
	    			{
	    				$fotografia = models_Fotografia::findByPK($f);
	    					$fotografia->precio = str_replace(',','.',$form->getValue('precio'));
	    				$fotografia->save();
	    			}
					$this->_redirect(getControllerUrl('fotografia','results', array('id'=>$this->getRequest()->getParam('busqueda'))));
	    			Zend_Registry::get('messagehandler')->add('INFO', 'Se han catalogado las fotografías seleccionadas.');
	    		}
			}
		
		
		$this->view->pageTitle = "Catalogar Fotografías";
    	$this->view->img_folder = Zend_Registry::get('config')->img_folder;
    	$this->view->thumb_max_width = Zend_Registry::get('config')->thumb_max_width;
    	$this->view->thumb_max_height = Zend_Registry::get('config')->thumb_max_height;

      	$fotografias = array();
		foreach($ids as $f)
		{
			$fotografias[$f] = models_Fotografia::findByPK($f);
		}
		$this->view->fotografias = $fotografias;
		$this->view->busqueda = $this->getRequest()->getParam('busqueda');
		$this->view->form = $form;
    }
    
    function editAction()
    {
		$session = new Zend_Session_Namespace();
		$fotografia = models_Fotografia::findByPK($this->getRequest()->getParam('id'));
		$fotografia->precio = str_replace('.',',',$fotografia->precio);
		$form = new forms_Catalogado(false);
		if ($this->getRequest()->isPost())
			{
			if($form->isValid($_POST))
	    		{
    				$fotografia->setAll($form->getValues());
    				$fotografia->precio = str_replace(',','.',$fotografia->precio);
    				$fotografia->save();
					
    				models_FotografiaTema::deleteAllFromFotografia($fotografia->id);
			        foreach ((array)$form->getValue('temas') as $tema_id)
			        {
			        	$ft = new models_FotografiaTema();
				        $ft->fotografia_id = $fotografia->id;
				        $ft->tema_id = $tema_id;
				        $ft->save();	
			        }
					if ($this->getRequest()->getParam('tema'))
					{
	    				foreach ((array)explode(',',$this->getRequest()->getParam('tema')) as $tema)
				        {
					        $tema = trim(ucwords($tema));
					        $tema_id = models_Tema::findbyDescription($tema);
				        	if(!$tema_id && $tema != '')
					        {
					        	$t = new models_Tema();
						        $t->descripcion = $tema;
						        $t->save();
						        $t = models_Tema::findbyDescription($tema);
						        $ft = new models_FotografiaTema();
						        $ft->fotografia_id = $fotografia->id;
						        $ft->tema_id = $t;
						        $ft->save();	
					        }
					        else 
					        {
						        if(!models_FotografiaTema::findFotografiaTema($fotografia->id, $tema_id))
						        {
						        	$ft = new models_FotografiaTema();
							        $ft->fotografia_id = $fotografia->id;
							        $ft->tema_id = $tema_id;
							        $ft->save();	
						        }
					        }
				        }
					}
					models_FotografiaLugar::deleteAllFromFotografia($fotografia->id);
				    foreach ((array)$form->getValue('lugares') as $lugar_id)
			        {
			        	$fl = new models_FotografiaLugar();
				        $fl->fotografia_id = $fotografia->id;
				        $fl->lugar_id = $lugar_id;
				        $fl->save();	
		     		}
			        
					if ($this->getRequest()->getParam('lugar'))
					{
	    				foreach ((array)explode(',',$this->getRequest()->getParam('lugar')) as $lugar)
				        {
					        $lugar = trim(ucwords($lugar));
					        $lugar_id = models_Lugar::findbyDescription($lugar);
				        	if(!$lugar_id && $lugar != '')
					        {
					        	$l = new models_Lugar();
						        $l->descripcion = $lugar;
						        $l->save();
						        $l = models_Lugar::findbyDescription($lugar);
						        $fl = new models_FotografiaLugar();
						        $fl->fotografia_id = $fotografia->id;
						        $fl->lugar_id = $l;
						        $fl->save();	
					        }
					        else 
					        {
						        if(!models_FotografiaLugar::findFotografiaLugar($fotografia->id, $lugar_id))
						        {
						        	$fl = new models_FotografiaLugar();
							        $fl->fotografia_id = $fotografia->id;
							        $fl->lugar_id = $lugar_id;
							        $fl->save();	
						        }
					        }
				        }
				        
	    			}
				$this->_redirect(getControllerUrl('fotografia','results',array('id'=> $this->getRequest()->getParam('busqueda'))));
    			Zend_Registry::get('messagehandler')->add('INFO', 'Se han catalogado las fotografías seleccionadas.');
	    		}
    		}
    		else 
    		{
    			$form->populate((array)$fotografia);
    			$form->populate(array('lugares'=> extractAttributeArray(models_FotografiaLugar::findAllFromFotografia($fotografia->id),'lugar_id')));
    			$form->populate(array('temas'=> extractAttributeArray(models_FotografiaTema::findAllFromFotografia($fotografia->id),'tema_id')));
    			$form->populate(array('hidden_subcategoria_id' => $fotografia->subcategoria_id));
    			
    		}
    		
		$this->view->pageTitle = "Catalogar Fotografía";
    	$this->view->img_folder = Zend_Registry::get('config')->img_folder;
    	$this->view->img_max_width = Zend_Registry::get('config')->img_max_width;
    	$this->view->img_max_height = Zend_Registry::get('config')->img_max_height;
		$this->view->busqueda = $this->getRequest()->getParam('busqueda');	    	
		$this->view->fotografia = $fotografia;
		$this->view->form = $form;
    }
    
    function rotateAction()
    {
    	
    	$session = new Zend_Session_Namespace();
		$fotografia = models_Fotografia::findByPK($this->getRequest()->getParam('id'));

		$fotografia->rotate($this->getRequest()->getParam('dir'));
		$fotografia->save();
        
		$this->getHelper("ViewRenderer")->setNoRender();
		$control = $this->getRequest()->getParam('control');
		
		$act = $this->getRequest()->getParam('act');
		$busqueda = $this->getRequest()->getParam('busqueda');
		return $this->_redirect(getControllerUrl($control,$act,array('id'=>$busqueda)));        
    }
    
    function deleteAction() 
    { 
    	$fotografia = models_Fotografia::findByPK($this->getRequest()->getParam('id'));
    	models_Fotografia::delete($fotografia);
		models_FotografiaLugar::deleteAllFromFotografia($fotografia->id);
		models_FotografiaTema::deleteAllFromFotografia($fotografia->id);
		
		$control = $this->getRequest()->getParam('control');
		$act = $this->getRequest()->getParam('act');
		$busqueda = $this->getRequest()->getParam('busqueda');
		return $this->_redirect(getControllerUrl($control,$act,array('id'=>$busqueda)));         
    	Zend_Registry::get('messagehandler')->add('INFO', 'Se borró la fotografía.');
	}

    function revisionAction()
    {
		$session = new Zend_Session_Namespace();
		
		$busqueda = new models_Busqueda();
		$busqueda->carga_id = $this->getRequest()->getParam('carga_id');
		$busqueda->usuario_id = $session->uid;
    	$busqueda->save();	

    	$this->_redirect(getControllerUrl('fotografia','results', array('id' => $busqueda->id)));
    }

    function untaggedAction()
    {
		$session = new Zend_Session_Namespace();
		
		$busqueda = new models_Busqueda();
		$busqueda->untagged = true;
		$busqueda->usuario_id = $session->uid;
    	$busqueda->save();	

    	$this->_redirect(getControllerUrl('fotografia','results', array('id' => $busqueda->id)));
    }
}