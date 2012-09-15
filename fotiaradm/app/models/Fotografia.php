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

class models_Fotografia extends Drumbit_PersistentModel 
{
	var $id;	
	var $descripcion;
	var $nombre_archivo; 	
	var $camera;
	var $model;
	var $exposuretime;
	var $isospeed;
	var $focallength;
	var $taken;
	var $mimetype;
	var $usuario_id;
	var $categoria_id;
	var $subcategoria_id;
	var $precio;
	var $sesion_id;
	var $carga_id;
						
	var $_data_table = 'fotografia';
	
	public function __toString()
	{
		return $this->nombre_archivo;
	}

	public static function findByPK($pk)
	{
		$db = Zend_Registry::get('db');
		
		$sql =	'SELECT * FROM fotografia WHERE id = '."'".$db->escape($pk)."'";
		
		$rs = $db->get_row($sql);
		return self::hydrate($rs, get_class());
	}
	
	public static function setAllReviewed()
	{
		$session = new Zend_Session_Namespace();
		
		$db = Zend_Registry::get('db'); 
		$sql = '	UPDATE fotografia
					SET reviewed = 1
					WHERE reviewed = 0 
						AND usuario_id = '.$session->uid;
		$db->query($sql);
		
	}

	public function rotate($dir)
	{
		$config = Zend_Registry::get('config');
	
		require_once $config->base_path.'inc/phpThumb/ThumbLib.inc.php'; 
		
		$targetfile = $config->base_path.$config->img_folder.'t'.$this->nombre_archivo;
        $rotated = PhpThumbFactory::create($targetfile);
        $rotated->rotateImage($dir);
        $rotated->save($targetfile);
		
        $targetfile = $config->base_path.$config->img_folder.$this->nombre_archivo;
		$rotated = PhpThumbFactory::create($targetfile);
        $rotated->rotateImage($dir);
        $rotated->save($targetfile);
        
	}
	
	public static function search($busqueda)
	{
		$session = new Zend_Session_Namespace();
		if (!models_Usuario::findByPK($session->uid)->isAdmin()){$busqueda->usuario_id = $session->uid;}
		if ($busqueda->carga_id == '' && $busqueda->untagged == false && !$busqueda->sesion_id)
		{
			$sql = "SELECT DISTINCT fotografia .*\n"
			    . "FROM fotografia \n"
			    . "LEFT JOIN fotografia_lugar ON fotografia.id = fotografia_lugar.fotografia_id\n"
			    . "LEFT JOIN lugar ON fotografia_lugar.lugar_id = lugar.id\n"
			    . "LEFT JOIN fotografia_tema ON fotografia.id = fotografia_tema.fotografia_id\n"
			    . "LEFT JOIN tema ON fotografia_tema.tema_id = tema.id\n"
			    . "LEFT JOIN categoria ON fotografia.categoria_id = categoria.id\n"
			    . "LEFT JOIN subcategoria ON fotografia.subcategoria_id = subcategoria.id\n"
			    . "WHERE ISNULL(fotografia.deleted_at)\n"
			    . "AND ISNULL(lugar.deleted_at)\n"
			    . "AND ISNULL(tema.deleted_at)\n"
			    . "AND ISNULL(fotografia_tema.deleted_at)\n"
			    . "AND ISNULL(fotografia_lugar.deleted_at)\n"
			    . "AND ISNULL(fotografia.sesion_id)\n";
			    
			if ($busqueda->usuario_id)
			{
				$sql= $sql.' AND fotografia.usuario_id = '.$busqueda->usuario_id;
			}		  
			
			if ($busqueda->categoria_id)
			{
				$sql= $sql.'  AND fotografia.categoria_id = '.$busqueda->categoria_id;
			}		  
			
			if ($busqueda->subcategoria_id)
			{
				$sql= $sql.' AND fotografia.subcategoria_id = '.$busqueda->subcategoria_id;
			}		  
			
			if ($busqueda->preciomin)
			{
				$sql= $sql.' AND fotografia.precio >= '.$busqueda->preciomin;
			}		  
			
			if ($busqueda->preciomax)
			{
				$sql= $sql.' AND fotografia.precio <= '.$busqueda->preciomax;
			}		  
			
			if ($busqueda->fechainicial)
			{
				$sql= $sql.' AND fotografia.taken >= "'.$busqueda->fechainicial.'"';
			}		  
			
			if ($busqueda->fechafinal)
			{
				$sql= $sql.' AND fotografia.taken <= "'.$busqueda->fechafinal.'"';
			}	
			
			if ($busqueda->etiquetalugar)
			{
				$sql= $sql.' AND lugar.descripcion LIKE "%'.$busqueda->etiquetalugar.'%"';
			}
			else
			{
				if ($busqueda->idetiquetalugar)
				{
					$sql= $sql.' AND fotografia_lugar.lugar_id IN ('.$busqueda->idetiquetalugar.')';
				}
			}	
			
			if ($busqueda->idetiquetatema)
			{
				$sql= $sql.' AND fotografia_tema.tema_id IN ('.$busqueda->idetiquetatema.')';
			}
			else 
			{
				if ($busqueda->etiquetatema)
				{
					$sql= $sql.' AND tema.descripcion LIKE "%'.$busqueda->etiquetatema.'%"';
				}
			}
			
			$sql = $sql .' ORDER BY '.$busqueda->ordenbusqueda;
		}
		
		if($busqueda->carga_id)
		{
		$sql =	'SELECT * FROM fotografia 
				 WHERE ISNULL(deleted_at) AND
				 	   carga_id = '.$busqueda->carga_id.'  
				 ORDER BY fotografia.taken';
		}
		
		if($busqueda->untagged == true)
		{
			$sql = "SELECT fotografia.*\n"
			    . "FROM fotografia\n"
			    . "WHERE NOT EXISTS \n"
			    . " (SELECT fotografia_lugar.fotografia_id\n"
			    . "  FROM fotografia_lugar\n"
			    . "  WHERE fotografia_lugar.fotografia_id = fotografia.id\n"
			    . "  AND ISNULL(fotografia_lugar.deleted_at))\n"
			    . "AND NOT EXISTS \n"
			    . " (SELECT fotografia_tema.fotografia_id\n"
			    . "  FROM fotografia_tema\n"
			    . "  WHERE fotografia_tema.fotografia_id = fotografia.id\n"
			    . "  AND ISNULL(fotografia_tema.deleted_at))\n";
			if (!models_Usuario::findByPK($session->uid)->isAdmin())
				{
					$sql = $sql."AND usuario_id = ".$busqueda->usuario_id."\n";
				}    
			$sql=$sql. "AND ISNULL(fotografia.deleted_at)\n"
					  ."AND ISNULL(fotografia.sesion_id)\n"
			    . "ORDER BY fotografia.taken";
		}
		
		if($busqueda->sesion_id)
		{
			$sql =	'SELECT * FROM fotografia 
					 WHERE ISNULL(deleted_at) AND
					 	   sesion_id = '.$busqueda->sesion_id.'  
					 ORDER BY fotografia.taken';
		}
		return self::findMultiple($sql, get_class(), false);
	}

	public static function findAllbyCategory($categoria_id, $in_pairs = false)
	{
		$sql =	'	SELECT * FROM fotografia 
					WHERE ISNULL(deleted_at)
					AND categoria_id = '.$categoria_id; 
		return self::findMultiple($sql, get_class(), $in_pairs);
	}

	public static function countbyCarga($carga_id, $in_pairs = false)
	{
		$sql =	'	SELECT * FROM fotografia 
					WHERE ISNULL(deleted_at)
					AND carga_id = '.$carga_id; 
		return count(self::findMultiple($sql, get_class(), $in_pairs));
	}
	
	public static function findAllbySubCategory($subcategoria_id, $in_pairs = false)
	{
		$sql =	'	SELECT * FROM fotografia 
					WHERE ISNULL(deleted_at)
					AND subcategoria_id = '.$subcategoria_id; 
		return self::findMultiple($sql, get_class(), $in_pairs);
	}

	public static function findAllbySesion($sesion_id, $in_pairs = false)
	{
		$sql =	'	SELECT * FROM fotografia 
					WHERE ISNULL(deleted_at)
					AND sesion_id = '.$sesion_id; 
		return self::findMultiple($sql, get_class(), $in_pairs);
	}

	public static function dropFotos()
	{
		$db = Zend_Registry::get('db'); 
		$sql = "DELETE FROM busqueda";
		$db->query($sql);
		$sql = "DELETE FROM carga";
		$db->query($sql);
		$sql = "DELETE FROM fotografia";
		$db->query($sql);
		$sql = "DELETE FROM fotografia_lugar";
		$db->query($sql);
		$sql = "DELETE FROM fotografia_tema";
		$db->query($sql);
		$sql = "DELETE FROM sesion";
		$db->query($sql);
	}
}