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

class models_Busqueda extends Drumbit_PersistentModel 
{
	var $id;	
	var $usuario_id;
	var $categoria_id;
	var $subcategoria_id;
	var $preciomin;
	var $preciomax;
	var $fechainicial;
	var $fechafinal;
	var $etiquetalugar;
	var $etiquetatema;
	var $idetiquetalugar;
	var $idetiquetatema;
	var $untagged;
	var $sesion_id;
	var $carga_id;
	var $ordenbusqueda;
	
	var $_data_table = 'busqueda';
	
	public static function findByPK($pk)
	{
		$db = Zend_Registry::get('db');
		
		$sql =	'SELECT * FROM busqueda WHERE id = '."'".$db->escape($pk)."'";
		
		$rs = $db->get_row($sql);
		return self::hydrate($rs, get_class());
	}
}