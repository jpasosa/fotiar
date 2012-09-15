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

class AdministracionController extends Drumbit_CustomController 
{   
	
	public function indexAction() 
    {    	
    	$this->view->pageTitle = "Administración de Tablas del Sistema";
    }  
	
    public function dropAction() 
	{
		models_Fotografia::dropFotos();
		$this->_redirect('administracion');
	}
	
	public function migrateAction() 
    { 
    	//Cargar los registros
    	$fechainicial = "2010-06-28 00:00:00";
    	$fechafinal =   "2010-06-28 00:00:00";
    	
    	
    	$db = Zend_Registry::get('db');
		
		$sql = "SELECT *\n"
		     . "FROM fotos\n"
		     . "WHERE fecha >= '".$fechainicial."'\n"
		     . "AND fecha <= '".$fechafinal."'\n";
	   
	    $rs = $db->get_results($sql);
	    
	    $this->view->cantregistros = count($rs);
	    
	    //Por cada Registro
	    foreach ($rs as $foto)
		{
    		//Determinar Ubicacion
    		$pathbase = "/fotiaradm/www/fotos/big/";
    		
    		$ano = date("Y",strtotime($foto->fecha));
    		$mes = date("m",strtotime($foto->fecha));
    		$dia = date("d",strtotime($foto->fecha));
    		
    		$pathfoto = $ano."/".$mes."/".$dia."/".$foto->idFotografo."/".$foto->fileName;
    		
    		$fotos[] = $pathbase.$pathfoto;
    		
			//Renombrar e Importar la foto
    		//Escribir en Tabla Destino
    			//Fotografo
    			//Categoría
    		//Escribir en Tabla original nuevo nombre y status de la operacion
			
		}
	    
    	$this->view->fotos = $fotos;

   	/* $this->_helper->layout()->disableLayout();
	$this->_helper->viewRenderer->setNoRender(true);
    
	if (!empty($_FILES)) 
		{
			if ($_REQUEST['usuario']){ 
				$session_id= $_REQUEST['usuario'];
			}
			if ($_REQUEST['categoria_id']){ 
				$categoria_id= $_REQUEST['categoria_id'];
			}
			if ($_REQUEST['subcategoria_id']){ 
				$subcategoria_id= $_REQUEST['subcategoria_id'];
			}
			if ($_REQUEST['sesion_id']){ 
				$sesion_id= $_REQUEST['sesion_id'];
			}
			if ($_REQUEST['carga_id']){ 
				$carga_id= $_REQUEST['carga_id'];
			}
			
			
			$tempFile = $_FILES['Filedata']['tmp_name'];
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
			$typeParts = explode('.',$_FILES['Filedata']['name']);
			$ext = $typeParts[count($typeParts)-1];
			$filename =  round(microtime(true)*1000). '.' . $ext;
			$targetFile =  str_replace('//','/',$targetPath) . $filename;
			$thumname = str_replace('//','/',$targetPath).'t'.$filename;
			$rotname = str_replace('//','/',$targetPath).'r'.$filename;
			
			move_uploaded_file($tempFile,$targetFile);

			
			// Lectura de Informacion EXIT
			$exif_data = exif_read_data($targetFile,'EXIF');
			
			$fotografia = new models_Fotografia();
			$fotografia->nombre_archivo = $filename;
			$fotografia->mimetype = $exif_data['MimeType'];
			$fotografia->usuario_id = $session_id;
			$fotografia->camera = $exif_data['Make'];
			$fotografia->model = $exif_data['Model'];
			$fotografia->exposuretime = $exif_data['ExposureTime'];
			$fotografia->isospeed = $exif_data['ISOSpeedRatings'];
			$fotografia->focallength = $exif_data['FocalLength'];
			$fotografia->taken = $exif_data['DateTime'];
			$fotografia->precio = models_Usuario::findByPK($session_id)->precio;
			
			
			if ($categoria_id == '')
			{
				$fotografia->categoria_id = NULL;
			}
			else 
			{
				$fotografia->categoria_id = $categoria_id;
			}
			
			if ($subcategoria_id == '')
			{
				$fotografia->subcategoria_id = NULL;
			}
			else 
			{
				$fotografia->subcategoria_id = $subcategoria_id;
			}
			
			if ($sesion_id == '')
			{
				$fotografia->sesion_id = NULL;
			}
			else 
			{
				$fotografia->sesion_id = $sesion_id;
			}
			if ($carga_id == '')
			{
				$fotografia->carga_id = NULL;
			}
			else 
			{
				$fotografia->carga_id = $carga_id;
			}

        	require_once 'phpThumb/ThumbLib.inc.php'; 
			
        	$resized = PhpThumbFactory::create($targetFile);
        	$resized->resize(300,300);
        	$resized->save($thumname);
        	
			$db = Zend_Registry::get('db'); 
			if ($categoria_id)
			{
				if ($subcategoria_id){
					$sql = '	INSERT INTO fotografia (carga_id,precio,categoria_id,subcategoria_id,nombre_archivo,camera,model,exposuretime,isospeed,focallength,taken,mimetype,usuario_id,created_by)
								VALUES ("'.$fotografia->carga_id.'","'.$fotografia->precio.'","'.$fotografia->categoria_id.'","'.$fotografia->subcategoria_id.'","'.$fotografia->nombre_archivo.'","'.$fotografia->camera.'","'.$fotografia->model.'","'.$fotografia->exposuretime.'","'.$fotografia->isospeed.'","'.$fotografia->focallength.'","'.$fotografia->taken.'","'.$fotografia->mimetype.'","'.$fotografia->usuario_id.'","'.$fotografia->usuario_id.'")';
				}
				else {
					$sql = '	INSERT INTO fotografia (carga_id,precio,categoria_id,nombre_archivo,camera,model,exposuretime,isospeed,focallength,taken,mimetype,usuario_id,created_by)
								VALUES ("'.$fotografia->carga_id.'","'.$fotografia->precio.'","'.$fotografia->categoria_id.'","'.$fotografia->nombre_archivo.'","'.$fotografia->camera.'","'.$fotografia->model.'","'.$fotografia->exposuretime.'","'.$fotografia->isospeed.'","'.$fotografia->focallength.'","'.$fotografia->taken.'","'.$fotografia->mimetype.'","'.$fotografia->usuario_id.'","'.$fotografia->usuario_id.'")';
				}
			}
			else 
			{
					$sql = '	INSERT INTO fotografia (carga_id,precio,sesion_id,nombre_archivo,camera,model,exposuretime,isospeed,focallength,taken,mimetype,usuario_id,created_by)
								VALUES ("'.$fotografia->carga_id.'","'.$fotografia->precio.'","'.$fotografia->sesion_id.'","'.$fotografia->nombre_archivo.'","'.$fotografia->camera.'","'.$fotografia->model.'","'.$fotografia->exposuretime.'","'.$fotografia->isospeed.'","'.$fotografia->focallength.'","'.$fotografia->taken.'","'.$fotografia->mimetype.'","'.$fotografia->usuario_id.'","'.$fotografia->usuario_id.'")';
			}						
			$db->query($sql);			
			echo $sql;
			//echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);
			
		}
		
		*/		
    }
    
} 