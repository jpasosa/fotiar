<?php
/**
 * Copyright (C) 2010 Drumbit - www.drumbit.com
 * 
 * This file is part of Sistema RENIR
 *
 * Sistema RENIR is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Sistema RENIR is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Sistema RENIR.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

class models_FotografiaTema extends Drumbit_PersistentModel 
{
	var $id;
	var $fotografia_id;
	var $tema_id;
	
	var $_data_table = 'fotografia_tema';
	
	public static function findAllFromFotografia($fotografia_id, $in_pairs = false)
	{
		$db = Zend_Registry::get('db');
		$sql =	'SELECT * FROM fotografia_tema WHERE fotografia_id = '."'".$db->escape($fotografia_id)."'".' AND ISNULL(deleted_at)';
		return self::findMultiple($sql, get_class(), $in_pairs);
	}
	
	public static function findAllFromFotografiaDescripcion($fotografia_id)
	{
		$db = Zend_Registry::get('db');
		$sql =	'SELECT * FROM fotografia_tema WHERE fotografia_id = '."'".$db->escape($fotografia_id)."'".' AND ISNULL(deleted_at)';
		$temas = self::findMultiple($sql, get_class(), false);
		$temas_descripcion = array();
		foreach ($temas as $t)
		{
			$temas_descripcion[$t->id] = models_Tema::findByPK($t->tema_id)->descripcion; 
		}
		return $temas_descripcion;
	}
	
	public static function findAllFromTema($tema_id, $in_pairs = false)
	{
		$db = Zend_Registry::get('db');
		$sql =	'SELECT * FROM fotografia_tema WHERE tema_id = '."'".$db->escape($tema_id)."'".' AND ISNULL(deleted_at)';
		return self::findMultiple($sql, get_class(), $in_pairs);
	}

	public static function findFotografiaTema($fotografia_id, $tema_id)
	{
		$db = Zend_Registry::get('db');
		$sql =	'	SELECT * FROM fotografia_tema 
					WHERE tema_id = '."'".$db->escape($tema_id)."'".' AND
						  fotografia_id = '."'".$db->escape($fotografia_id)."'".' AND  
						  ISNULL(deleted_at)';
		if ($db->query($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public static function deleteAllFromFotografia($fotografia_id, $in_pairs = false)
	{
		$collection = models_FotografiaTema::findAllFromFotografia($fotografia_id);
		foreach ($collection as $item)
		{
			self::delete($item);
		}
	}
  public static function deleteAllFromTema($tema_id, $in_pairs = false)
  {
    $collection = models_FotografiaTema::findAllFromTema($tema_id);
    foreach ($collection as $item)
    {
      self::delete($item);
    }
  }
}