<?php
class UploadifyController extends Drumbit_CustomController
{
	var $_parent;
	
	public function uploadAction() 
    { 
	$this->_helper->layout()->disableLayout();
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
			
			
			/*Temporario hasta que se active EXIF
			$fotografia = new models_Fotografia();
			$fotografia->nombre_archivo = $filename;
			$fotografia->mimetype = 'MimeType';
			$fotografia->usuario_id = $session_id;
			$fotografia->camera = 'Make';
			$fotografia->model = 'Model';
			$fotografia->exposuretime = 'ExposureTime';
			$fotografia->isospeed = 'ISOSpeedRatings';
			$fotografia->focallength = 'FocalLength';
			
			$date = new Zend_Date();
			$v = $date->get($date->toString('yyyy-MM-dd hh:mm:ss'));
			
			$fotografia->taken = $v;
			$fotografia->precio = models_Usuario::findByPK($session_id)->precio;
			*/
			
			
			/*
			//Rotacion de fotos en funcion de EXIF
			$ort = $exif_data['IFD0']['Orientation'];
		    switch($ort)
		    {
		        case 1: // nothing
		        break;
		
		        case 3: // 180 rotate left
			        $rotated = PhpThumbFactory::create($targetfile);
			        $rotated->rotateImageNDegrees(180);
			        $rotated->save($targetfile);
        	        break;

		        case 6: // 90 rotate right
			        $rotated = PhpThumbFactory::create($targetfile);
			        $rotated->rotateImageNDegrees(-90);
			        $rotated->save($targetfile);
        	        break;
		        break;
		                
		        case 8:    // 90 rotate left
			        $rotated = PhpThumbFactory::create($targetfile);
			        $rotated->rotateImageNDegrees(90);
			        $rotated->save($targetfile);
        	        break;
		        break;
		    }*/
			
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
    }
}
    