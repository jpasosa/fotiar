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

class models_Lugar extends Drumbit_PersistentModel
{
	var $id;
	var $descripcion;
	
	var $_data_table = 'lugar';
	
	public function __toString()
	{
		return $this->descripcion.'';
	}
	
	public static function findAll($in_pairs = false)
	{
		$sql =	'SELECT * FROM lugar WHERE ISNULL(deleted_at) ORDER BY lugar.descripcion';
		return self::findMultiple($sql, get_class(), $in_pairs);
	}

	public static function findByPK($pk)
	{
		$db = Zend_Registry::get('db');
		
		$sql =	'SELECT * FROM lugar WHERE id = '."'".$db->escape($pk)."'";
		
		$rs = $db->get_row($sql);
		return self::hydrate($rs, get_class());
	}
	
	public static function findbyDescription($descripcion)
	{
		$db = Zend_Registry::get('db');
		$sql =	'	SELECT * FROM lugar 
					WHERE descripcion = '."'".$db->escape($descripcion)."'";

		$rs = $db->get_row($sql);
		$lugar = self::hydrate($rs, get_class());
		
		if ($lugar->id)
		{
			return $lugar->id;
		}
		else
		{
			return 0;
		}
	}
	
	public static function isInUse($pk)
	{

		$db = Zend_Registry::get('db');
		
		if (count(models_FotografiaLugar::findAllFromLugar($pk)))
		{
			return true;
		}
		else
		{
			return false;
		}

	}
}