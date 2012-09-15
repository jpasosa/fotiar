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

$acl = new Zend_Acl();

$acl->add(new Zend_Acl_Resource('usuario'));
$acl->add(new Zend_Acl_Resource('usuario_self'));
$acl->add(new Zend_Acl_Resource('usuario_fotografo'));
$acl->add(new Zend_Acl_Resource('usuario_admin'));
$acl->add(new Zend_Acl_Resource('rol'));
$acl->add(new Zend_Acl_Resource('mensaje_self'));
$acl->add(new Zend_Acl_Resource('mensaje_others'));
$acl->add(new Zend_Acl_Resource('index'));
$acl->add(new Zend_Acl_Resource('administracion'));
$acl->add(new Zend_Acl_Resource('categoria'));
$acl->add(new Zend_Acl_Resource('lugar'));
$acl->add(new Zend_Acl_Resource('fotografia'));
$acl->add(new Zend_Acl_Resource('uploadify'));
$acl->add(new Zend_Acl_Resource('carga'));
$acl->add(new Zend_Acl_Resource('tema'));
$acl->add(new Zend_Acl_Resource('reporte'));
$acl->add(new Zend_Acl_Resource('evento'));
$acl->add(new Zend_Acl_Resource('sesion'));
$acl->add(new Zend_Acl_Resource('subcategoria'));
$acl->add(new Zend_Acl_Resource('seguridad'));
$acl->add(new Zend_Acl_Resource('contrasena'));

$acl->addRole(new Zend_Acl_Role('fotografo'));
$acl->addRole(new Zend_Acl_Role('admin'));

/** FOTOGRAFO **/
//globales
$acl->allow('fotografo', null, null);
$acl->deny('fotografo', 'usuario', null);
$acl->deny('fotografo', 'administracion', null);
$acl->deny('fotografo', 'categoria', 'edit');
$acl->deny('fotografo', 'subcategoria', 'edit');
$acl->deny('fotografo', 'lugar', null);
$acl->deny('fotografo', 'tema', null);
$acl->deny('fotografo', 'sesion', null);
$acl->deny('fotografo', 'reporte', 'results');
/** ADMIN **/
//globales
$acl->allow('admin', null, null);

//Usuarios
$acl->deny('admin', 'usuario_self', 'delete');
