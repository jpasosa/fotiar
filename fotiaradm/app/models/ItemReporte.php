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

class models_ItemReporte 
{
	var $nombrefotografo;
	var $fotografo_id;
	var $cantidadfotos;
	var $preciototal;
	var $comisiontotal;
	
	public static function reporteVentas($fechainicial,$fechafinal)
	{
		$db = Zend_Registry::get('db');
		
		$sql = "SELECT FO.usuario_id as fotografo_id, COUNT(PI.fotografia_id) as cantidadfotos, SUM(PI.precio) as preciototal, SUM(PI.precio * (PI.comision)/100) as comisiontotal\n"
		    . "FROM pedido_item as PI\n"
		    . "LEFT JOIN pedido as PE ON PI.pedido_id = PE.id\n"
		    . "LEFT JOIN fotografia as FO ON PI.fotografia_id = FO.id\n"
		    . "WHERE PE.is_pagado = 1\n"
		    . "AND PE.updated_at >= '".$fechainicial." 00:00:00'\n"
		    . "AND PE.updated_at <= '".$fechafinal." 23:59:59'\n"
			. "GROUP BY fotografo_id";
	   
	    $rs = $db->get_results($sql);
	    if(count($rs))
	    {
		    foreach($rs as $row)
		    {
		    	$item = new models_ItemReporte();
		    	
		    	$item->nombrefotografo = models_Usuario::findByPK($row->fotografo_id);
		    	$item->cantidadfotos = $row->cantidadfotos;
		    	$item->comisiontotal = $row->comisiontotal;
		    	$item->preciototal = $row->preciototal;
		    	$item->fotografo_id = $row->fotografo_id;
	
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