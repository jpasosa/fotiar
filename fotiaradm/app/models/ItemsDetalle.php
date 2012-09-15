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

class models_ItemsDetalle
{
	var $id;
	var $pedido_id;
	var $fotografia_id;
	var $precio;
	var $comision;
	var $fecha;
	var $fotografo_id;

	public static function reporteVentas($fechainicial,$fechafinal,$fotografo)
	{
		$db = Zend_Registry::get('db');
		
		$sql = "SELECT PI.pedido_id as pedido_id, FO.usuario_id as fotografo_id, PI.fotografia_id as fotografia_id, PI.precio as precio, PI.comision as comision, PE.updated_at as fecha\n"
		    . "FROM pedido_item as PI\n"
		    . "LEFT JOIN pedido as PE ON PI.pedido_id = PE.id\n"
		    . "LEFT JOIN fotografia as FO ON PI.fotografia_id = FO.id\n"
		    . "WHERE PE.is_pagado = 1\n"
		    . "AND PE.updated_at >= '".$fechainicial." 00:00:00'\n"
		    . "AND PE.updated_at <= '".$fechafinal." 23:59:59'\n"
			. "AND FO.usuario_id = '".$fotografo."'";
	   
	    $rs = $db->get_results($sql);
	    
	   	if(count($rs))
	    {
		    foreach($rs as $row)
		    {
		    	$item = new models_ItemsDetalle();
		    	
		    	$item->pedido_id = $row->pedido_id;
		    	$item->fotografia_id = $row->fotografia_id;
		    	$item->precio = $row->precio;
		    	$item->comision = $row->comision;
		    	$item->fecha = $row->fecha;
		    	
		    	$items[] = $item;
		    }
		    
		    return $items;
		}
	    else 
	    {
	    	return null;
	    }
	}
}