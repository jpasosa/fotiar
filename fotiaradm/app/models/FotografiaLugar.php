<?php
/**
 * Copyright (C) 2010 Drumbit - www.drumbit.com
 * 
 * This file is part of Sislugar RENIR
 *
 * Sislugar RENIR is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Sislugar RENIR is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Sislugar RENIR.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

class models_FotografiaLugar extends Drumbit_PersistentModel 
{
	var $id;
	var $fotografia_id;
	var $lugar_id;
	
	var $_data_table = 'fotografia_lugar';
	
	public static function findAllFromFotografia($fotografia_id, $in_pairs = false)
	{
		$db = Zend_Registry::get('db');
		$sql =	'SELECT * FROM fotografia_lugar WHERE fotografia_id = '."'".$db->escape($fotografia_id)."'".' AND ISNULL(deleted_at)';
		return self::findMultiple($sql, get_class(), $in_pairs);
	}
	
	public static function findAllFromFotografiaDescripcion($fotografia_id)
	{
		$db = Zend_Registry::get('db');
		$sql =	'SELECT * FROM fotografia_lugar WHERE fotografia_id = '."'".$db->escape($fotografia_id)."'".' AND ISNULL(deleted_at)';
		$lugares = self::findMultiple($sql, get_class(), false);
		$lugares_descripcion = array();
		foreach ($lugares as $l)
		{
			$lugares_descripcion[$l->id] = models_Lugar::findByPK($l->lugar_id)->descripcion; 
		}
		return $lugares_descripcion;
	}
	
	public static function findAllFromLugar($lugar_id, $in_pairs = false)
	{
		$db = Zend_Registry::get('db');
		$sql =	'SELECT * FROM fotografia_lugar WHERE lugar_id = '."'".$db->escape($lugar_id)."'".' AND ISNULL(deleted_at)';
		return self::findMultiple($sql, get_class(), $in_pairs);
	}

	public static function findFotografiaLugar($fotografia_id, $lugar_id)
	{
		$db = Zend_Registry::get('db');
		$sql =	'	SELECT * FROM fotografia_lugar 
					WHERE lugar_id = '."'".$db->escape($lugar_id)."'".' AND
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
		$collection = models_FotografiaLugar::findAllFromFotografia($fotografia_id);
		foreach ($collection as $item)
		{
			self::delete($item);
		}
	}
  public static function deleteAllFromLugar($lugar_id, $in_pairs = false)
  {
    $collection = models_FotografiaLugar::findAllFromLugar($lugar_id);
    foreach ($collection as $item)
    {
      self::delete($item);
    }
  }
}