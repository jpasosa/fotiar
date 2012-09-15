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

define ('PRODUCTION', false);
if (PRODUCTION){
	return array(
		'base_path'	=>	'/var/www/vhosts/drumbit/sites/primetec/renir/',
		'base_url'	=>	'http://renir.dotdev.com.ar/',
		'img_folder'=>	'fotos/',
		'event_folder'=> 'eventos/',	
		'img_max_width' => '1000',
		'img_max_height' => '1000',
		'thumb_max_width' => '100',
		'thumb_max_height' => '100',
		'img_folder'=>	'fotos/',
		'url_rewrite'	=>	true,
		'db' =>	array(
					'provider' => Drumbit_PersistentModel::PROVIDER_MYSQL,
			    	'params' => array(
						'host'	=>	'localhost',
						'dbname' => 'drumbit_renir',
						'username' => 'primetec',
						'password' => 'tqw98o',
				)
		),
		'grid_size' => 20,
    'grid' => array(
      'page_size' => 25,
      'dateformat_data'   => 'yyyy-MM-dd HH:mm:ss',
      'dateformat_print' => 'd/m/Y',
      'dateformat_query'  => 'Y-m-d'
    )
);
}
else
{
		return array(
//		'base_path'	=>	'/vhosts/fotiar/fotiaradm/',
    'base_path' =>  '/home/danilo/PROYECTOS/CHOLO/fotiar/sitio/fotiaradm/',
//    'base_url'  =>  'http://fotiar.local/fotiaradm/',
		'base_url'	=>	'http://fotiaradm/',
		'img_folder'=>	'fotos/',
		'event_folder'=> 'eventos/',
		'img_max_width' => '896',
		'img_max_height' => '896',
		'thumb_max_width' => '300',
		'thumb_max_height' => '300',
		'url_rewrite'	=>	true,
		'db' =>	array(
					'provider' => Drumbit_PersistentModel::PROVIDER_MYSQL,
			    	'params' => array(
						'host'	=>	'localhost',
						'dbname' => 'fotiaradm',
						'username' => 'root',
						'password' => 'hormidb08',
				)
		),
		'grid_size' => 20,
    	'grid' => array(
      	'page_size' => 25,
      	'dateformat_data'   => 'yyyy-MM-dd HH:mm:ss',
      	'dateformat_print' => 'd/m/Y',
      	'dateformat_query'  => 'Y-m-d'
    )
);
}
