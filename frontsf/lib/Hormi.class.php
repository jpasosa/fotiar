<?php

/**
 * Hormi es una clase que provee algunas funciones utiles
 *
 * @author     Danilo R. Frid <danilo@cooperativahormigon.com.ar>
 */
class Hormi
{
  public static function escupir($arreglo, $nombre='Ponele_Nombre', $inicial=true) {
    if($inicial):
      echo '<h4>Imprimiendo un '.gettype($arreglo).'</h4>';
    endif;
    foreach($arreglo as $k => $v):
      if(gettype($v)=='array' || gettype($v)=='object'):
        echo $nombre.'['.$k.']'.' => ... <br />';
        echo '<div style="margin: 4px 0 0 24px;">';
          self::escupir($v, $k, false);
        echo '</div>';
      else:
        echo $nombre.'['.$k.']'.' => '.$v.'<br />';
      endif;
    endforeach;
    if($inicial):
      echo '<h4>-------------------------------------------</h4>';
    endif;
  }

  
/**
 * getThumbnail genera un thumbnail usando el plugin sfThumbnail
 *
 * @param  string $filename   El nombre del archivo de imagen
 * @param  string $src_url    La url donde esta la imagen original
 * @param  string $folder     El directorio bajo uploads/ (y sin /thumbs) donde alojaremos los thumbs
 * @param  int    $width      El ancho en px (Opcional)
 * @param  int    $height     El alto en px (Opcional)
 * @param  bool   $crop       true para que recorte, false para que ajuste (Opcional)
 *
 * @return string La ruta relativa incluyendo el nombre de archivo
 */
  static public function getThumbnail($filename, $src_url, $folder, $width=null, $height=null, $crop=false, $marca=false) {
    $inflate = true;
    $scale = false;    
    $adapter = 'sfGDAdapter'; //'sfImageMagickAdapter'
    
    $pathImagen = $src_url;
    $pathThumb = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.'thumbs'.DIRECTORY_SEPARATOR;

    if(!file_exists(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$filename)):
      if(self::http_file_exist($pathImagen.$filename) && copy($pathImagen.$filename, sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$filename)):
        $img = new sfImage(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$filename);
        // Estas son las dimensiones de la imagen que copiamos en /uploads/fotos a partir de la cual se generan los thumbs
        // Ya le insertamos la marca de agua y le dejamos una proporcion y recorte coherente con los thumbs
        $final_w = 690;
        $final_h = 459;
        
        $proporcion_deseada = $final_w/$final_h;
        $proporcion_real = $img->getWidth()/$img->getHeight();
        
        if($proporcion_real > $proporcion_deseada):
          $scaled_width = $final_w;
          $scaled_height = $final_w/$proporcion_real;
        else:
          $scaled_height = $final_h;
          $scaled_width = $final_h*$proporcion_real;
        endif;
          
        $left = $top = 0;
        if($final_w < $scaled_width) $left = ($scaled_width-$final_w)/2;
        if($final_h < $scaled_height) $top = ($scaled_height-$final_h)/2;
        
//        $marca = new sfImage(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'marca_f.png');
//        $img->resize($scaled_width, $scaled_height)->overlay($marca, array(($scaled_width-$marca->getWidth())/2, ($scaled_height-$marca->getHeight())/2)); // 'bottom-right'); // or you can use coords array($x,$y)
        $img->resize($scaled_width, $scaled_height);
        $img->saveAs(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$filename);
      else:
        $filename = 'default.png';
      endif;
    endif;

    $thumbFilename = self::getFileName($filename).'_W'.(isset($width)?$width:'prop').'xH'.(isset($height)?$height:'prop').'.'.self::getFileExtension($filename);
    $img_thumb = new sfImage(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$filename);
    
    $final_w = $width;
    $final_h = $height;
        
//    $proporcion_deseada = $width/$height;
    $proporcion_deseada = $final_w/$final_h;
    $proporcion_real = $img_thumb->getWidth()/$img_thumb->getHeight();
    
    if($proporcion_real > $proporcion_deseada):
      $scaled_height = $final_h;
      $scaled_width = $final_h*$proporcion_real;
      $fit_height = $final_w/$proporcion_real;
      $fit_width = $final_w;
    else:
      $scaled_width = $final_w;
      $scaled_height = $final_w/$proporcion_real;
      $fit_width = $final_h*$proporcion_real;
      $fit_height = $final_h;
    endif;
      
    $left = $top = 0;
    if($final_w < $scaled_width) $left = ($scaled_width-$final_w)/2;
    if($final_h < $scaled_height) $top = ($scaled_height-$final_h)/2;

    if($marca):
      $marca = new sfImage(sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'marca_gris.png');
      $marca->resize($fit_height/3, $fit_height/3);
    endif;
    if($crop):
      $img_thumb->resize($scaled_width, $scaled_height)->crop($left, $top, $final_w, $final_h);
      if($marca):
        $x = ($final_w-$marca->getWidth())/2;
        $y = ($final_h-$marca->getHeight())/2;
      endif;
    else:
      $img_thumb->resize($fit_width, $fit_height);
      if($marca):
        $x = ($fit_width-$marca->getWidth())/2;
        $y = ($fit_height-$marca->getHeight())/2;
      endif;
    endif;
    if($marca):
      $img_thumb->overlay($marca, array($x, $y)); // 'bottom-right'); // or you can use coords array($x,$y)
    endif;
    $img_thumb->saveAs($pathThumb.$thumbFilename);

    return '/uploads/'.$folder.'/thumbs/'.$thumbFilename;
  }

  
  static public function getFileName($realName){
    return substr($realName, 0, strlen($realName) - strlen(strrchr($realName, ".")));
  }
  
  
  static public function getFileExtension($realName){
    return substr(strrchr($realName, "."), 1);
  }
  

  /*
  static public function deleteFile($path_file) {
    unlink($path_file);
  }
  */
  
  static public function http_file_exist($url) {
    $f=@fopen($url,"r");
    if($f) {
      fclose($f);
      return true;
    }
    return false;
  }
}