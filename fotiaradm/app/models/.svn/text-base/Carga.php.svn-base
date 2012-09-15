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

class models_Carga extends Drumbit_PersistentModel
{
	var $id;
	var $usuario_id;
	var $fechacarga;
	
	var $_data_table = 'carga';
	
	public function __toString()
	{
		return $this->fechacarga;
	}
	
	public static function findAll($in_pairs = false)
	{
		$sql =	'SELECT * FROM carga WHERE ISNULL(deleted_at) ORDER BY fechacarga';
		return self::findMultiple($sql, get_class(), $in_pairs);
	}
	
	public static function findAllbyUser($usuario_id,$in_pairs = false)
	{
		$sql =	$sql = 	  "SELECT * \n"
					    . "FROM carga \n"
					    . "WHERE ISNULL(deleted_at) AND\n"
					    . "usuario_id = '".$usuario_id."'\n"
					    . "ORDER BY fechacarga";
		$cargas = self::findMultiple($sql, get_class(), $in_pairs);
		
		return $cargas;
	}

	public static function findByPK($pk)
	{
		$db = Zend_Registry::get('db');
		
		$sql =	'SELECT * FROM carga WHERE id = '."'".$db->escape($pk)."'";
		
		$rs = $db->get_row($sql);
		return self::hydrate($rs, get_class());
	}
}