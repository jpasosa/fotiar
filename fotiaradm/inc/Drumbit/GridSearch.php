<?php
/**
 * Copyright (C) 2010 Primetec - www.primetec.com.ar
 *
 * This file is part of Sistema FOTIARADM
 *
 * Sistema FOTIAR ADM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Sistema FOTIAR ADM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Sistema FOTIAR ADM.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

class Drumbit_GridSearch
{
	function search($sql, $from, $primary_id, $arrayParameters = "", $order = "", $sense = "", $quantity = "", $limit = "", $count = false, $groupby = "")
	{
		$db = Zend_Registry::get('db');
		$where = "";
		$first = true;
		foreach((array)$arrayParameters as $key => $value)
		{
			$aTable = explode(":",$key);

			$sTable = "";
			$sFieldAlias = "";
			if(count($aTable) > 1)
			{
				$sTable = $aTable[0];
				$sFieldAlias = $aTable[1];
			}
			else
			{
				$sFieldAlias = $key;
			}
			
			$aField = explode("_",$sFieldAlias);
			$sField = "";
			
			for($i = 1 ; $i < count($aField); $i++)
			{
				if($sField == "")
				{
					$sField = $aField[$i];
				}
				else
				{
					$sField .= "_".$aField[$i];
				}
			}
				
			if($sTable != "")
			{
				$sFieldExt = $sTable.".".$sField;
			}
			else
			{
				$sFieldExt = $sField;
			}
			
			if ($first)
			$where = ' WHERE ';
			else
			$where .= ' AND ';


			if ( ! (is_array($value)) )
			{
				$where .= "$sFieldExt LIKE '%".$db->escape($value)."%'";
			}
			else
			{
				if (! (is_array($value['VALUE'])))
				{
					$value['VALUE'] = array($value['VALUE']);
				}
				$i = 0;
				foreach ($value['VALUE'] as $v)
				{
					if ($i == 0)
					{
						$where .= ' ( ';
					}
					if( strtoupper($value['OPERATOR']) == 'IN' )
					{
						$where .= "$sFieldExt ".$value['OPERATOR']." ".$db->escape($v);
					}
					elseif ( strtoupper($value['OPERATOR']) == 'ISNULL' )
					{
						$where .= "ISNULL($sFieldExt)";
					}
					elseif ( strtoupper($value['OPERATOR']) == 'ISFUNCTION')
					{
						$where .= "$v";
					}
					else
					{
						$where .= "$sFieldExt ".$value['OPERATOR']." '".$db->escape($v)."'";
					}
					$i++;
					if ($i == count($value['VALUE']))
					{
						$where .= ' ) ';
					}
					else
					{
						$where .= ' OR ';
					}
				}
			}
			$first = false;
				
		}
		if($order != "")
		{
			$aTable = explode(":",$order);

			$sTable = "";
			$sFieldAlias = "";
			if(count($aTable) > 1)
			{
				$sTable = $aTable[0];
				$sFieldAlias = $aTable[1];
			}
			else
			{
				$sFieldAlias = $order;
			}
				
			$aField = explode("_",$sFieldAlias);
			$sField = "";
				
			for($i = 1 ; $i < count($aField); $i++)
			{
				if($sField == "")
				{
					$sField = $aField[$i];
				}
				else
				{
					$sField .= "_".$aField[$i];
				}
			}
				
			if($sTable != "")
			{
				$sFieldExt = $sTable.".".$sField;
			}
			else
			{
				$sFieldExt = $sField;
			}
		}

		if($limit != "" and $limit != '0')
		{
			if($quantity != "" and $quantity != '0')
			{
				$quantity = " $quantity";
			}
			else
			{
				$quantity = 0;
			}
		}

		//count the number of records
		$select = "SELECT
		$sql $from
		$where $groupby";

		$rs = $db->get_results($select, 'ARRAY_A');

		$totalcount = count($rs);

		if($limit != "" and $limit != "0")
		{
			$result = count($rs)/ $limit;

			$tot = count($rs);
			$pagecount = 1;
			while($tot - $limit > 0)
			{
				$pagecount = $pagecount + 1;
				$tot = $tot - $limit;
			}
				
			$lastpagezise = $tot;
		}
		else
		{
			$pagecount = 1;
		}

		if($count == true)
		{
			return $pagecount;
		}
		else
		{
			if($limit != "" and $limit != "0")
			{
				$select = "SELECT
				$sql $from
				$where $groupby
						   ORDER BY $sFieldExt $sense
						   LIMIT $quantity, $limit
						   ";
			}
			else
			{
				$select = "SELECT
				$sql $from
				$where $groupby
						   ORDER BY $sFieldExt $sense";
			}
				
			if(isset($_GET['debug']))
			{
				superecho($select);
			}
			$rs = $db->get_results($select,'ARRAY_A');
				
			return $rs;
		}
	}

	function applyOperators($arrayParameters, $strictParameters)
	{
		foreach ($strictParameters as $param)
		{
			if (isset($arrayParameters[$param]))
			$arrayParameters[$param] = array ('OPERATOR' => '=', 'VALUE' => $arrayParameters[$param]);
		}
		return $arrayParameters;
	}

	  function usuarioSearch($arrayParameters = "", $order = "", $sense = "", $quantity = "", $limit = "", $count = false)
		{
			$primary_id = "usuario.id";
			$select_fields = "	usuario.id as usuario_id,
							   	usuario.usuario as usuario_usuario,
							   	usuario.nombre as usuario_nombre,
							   	usuario.apellido as usuario_apellido,
							   	usuario.correo as usuario_correo,
							   	rol.id as rol_id,
							   	rol.descripcion as rol_descripcion";	
							   		
			$select_from = "FROM usuario
							INNER JOIN rol ON rol.id = usuario.rol_id";
	
			$arrayParameters["usuario:usuario_deleted_at"] = array ('OPERATOR' => 'ISNULL', 'VALUE' => '');
	
			$arrayParameters = $this->applyOperators($arrayParameters, array(
				'usuario:usuario_id',
				'rol:rol_id'));
	
			$rs = $this->search($select_fields, $select_from, $primary_id, $arrayParameters, $order, $sense, $quantity, $limit, $count);
	
			return $rs;
		}
		
	function categoriaSearch($arrayParameters = "", $order = "", $sense = "", $quantity = "", $limit = "", $count = false)
	{	
		$primary_id = "categoria.id";
		$select_fields = "	categoria.id as categoria_id,
						   	categoria.descripcion as categoria_descripcion";	
				
		$select_from = "FROM categoria";
				
		$arrayParameters["categoria:categoria_deleted_at"] = array ('OPERATOR' => 'ISNULL', 'VALUE' => '');
		
		$arrayParameters = $this->applyOperators($arrayParameters, array(
			'categoria:categoria_id'));
		
		$rs = $this->search($select_fields, $select_from, $primary_id, $arrayParameters, $order, $sense, $quantity, $limit, $count);
		
		return $rs;
	}
		
	function subcategoriaSearch($arrayParameters = "", $order = "", $sense = "", $quantity = "", $limit = "", $count = false)
	{	
		$primary_id = "subcategoria.id";
		$select_fields = "	subcategoria.id as subcategoria_id,
						   	categoria.id as categoria_id,
						   	categoria.descripcion as categoria_descripcion,
						   	subcategoria.descripcion as subcategoria_descripcion";	
				
		$select_from = "FROM subcategoria
						INNER JOIN categoria ON categoria.id = subcategoria.categoria_id";
				
		$arrayParameters["subcategoria:subcategoria_deleted_at"] = array ('OPERATOR' => 'ISNULL', 'VALUE' => '');
		
		$arrayParameters = $this->applyOperators($arrayParameters, array(
			'subcategoria:subcategoria_id',
			'categoria:categoria_id'));
		
		$rs = $this->search($select_fields, $select_from, $primary_id, $arrayParameters, $order, $sense, $quantity, $limit, $count);
		
		return $rs;
	}
	
	function temaSearch($arrayParameters = "", $order = "", $sense = "", $quantity = "", $limit = "", $count = false)
	{	
		$primary_id = "tema.id";
		$select_fields = "	tema.id as tema_id,
						   	tema.descripcion as tema_descripcion";	
				
		$select_from = "FROM tema";
				
		$arrayParameters["tema:tema_deleted_at"] = array ('OPERATOR' => 'ISNULL', 'VALUE' => '');
		
		$arrayParameters = $this->applyOperators($arrayParameters, array(
			'tema:tema_id'));
		
		$rs = $this->search($select_fields, $select_from, $primary_id, $arrayParameters, $order, $sense, $quantity, $limit, $count);
		
		return $rs;
	}
	
	function lugarSearch($arrayParameters = "", $order = "", $sense = "", $quantity = "", $limit = "", $count = false)
	{	
		$primary_id = "lugar.id";
		$select_fields = "	lugar.id as lugar_id,
						   	lugar.descripcion as lugar_descripcion";	
				
		$select_from = "FROM lugar";
				
		$arrayParameters["lugar:lugar_deleted_at"] = array ('OPERATOR' => 'ISNULL', 'VALUE' => '');
		
		$arrayParameters = $this->applyOperators($arrayParameters, array(
			'lugar:lugar_id'));
		
		$rs = $this->search($select_fields, $select_from, $primary_id, $arrayParameters, $order, $sense, $quantity, $limit, $count);
		
		return $rs;
	}
	
	function sesionSearch($arrayParameters = "", $order = "", $sense = "", $quantity = "", $limit = "", $count = false)
	{	
		$primary_id = "sesion.id";
		$select_fields = "	sesion.id as sesion_id,
						   	sesion.descripcion as sesion_descripcion";	
				
		$select_from = "FROM sesion";
				
		$arrayParameters["sesion:sesion_deleted_at"] = array ('OPERATOR' => 'ISNULL', 'VALUE' => '');
		
		$arrayParameters = $this->applyOperators($arrayParameters, array(
			'sesion:sesion_id'));
		
		$rs = $this->search($select_fields, $select_from, $primary_id, $arrayParameters, $order, $sense, $quantity, $limit, $count);
		
		return $rs;
	}
}
?>