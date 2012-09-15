<?php

/**
 * BaseEvento
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property varchar $caption
 * @property varchar $nombre_archivo_es
 * @property varchar $nombre_archivo_pt
 * @property varchar $nombre_archivo_en
 * @property varchar $nombre_icono
 * @property integer $categoria_id
 * @property integer $subcategoria_id
 * @property timestamp $created_at
 * @property integer $created_by
 * @property timestamp $updated_at
 * @property integer $updated_by
 * @property timestamp $deleted_at
 * @property integer $deleted_by
 * @property Categoria $Categoria
 * @property Subcategoria $Subcategoria
 * 
 * @method varchar      getCaption()           Returns the current record's "caption" value
 * @method varchar      getNombreArchivoEs()   Returns the current record's "nombre_archivo_es" value
 * @method varchar      getNombreArchivoPt()   Returns the current record's "nombre_archivo_pt" value
 * @method varchar      getNombreArchivoEn()   Returns the current record's "nombre_archivo_en" value
 * @method varchar      getNombreIcono()       Returns the current record's "nombre_icono" value
 * @method integer      getCategoriaId()       Returns the current record's "categoria_id" value
 * @method integer      getSubcategoriaId()    Returns the current record's "subcategoria_id" value
 * @method timestamp    getCreatedAt()         Returns the current record's "created_at" value
 * @method integer      getCreatedBy()         Returns the current record's "created_by" value
 * @method timestamp    getUpdatedAt()         Returns the current record's "updated_at" value
 * @method integer      getUpdatedBy()         Returns the current record's "updated_by" value
 * @method timestamp    getDeletedAt()         Returns the current record's "deleted_at" value
 * @method integer      getDeletedBy()         Returns the current record's "deleted_by" value
 * @method Categoria    getCategoria()         Returns the current record's "Categoria" value
 * @method Subcategoria getSubcategoria()      Returns the current record's "Subcategoria" value
 * @method Evento       setCaption()           Sets the current record's "caption" value
 * @method Evento       setNombreArchivoEs()   Sets the current record's "nombre_archivo_es" value
 * @method Evento       setNombreArchivoPt()   Sets the current record's "nombre_archivo_pt" value
 * @method Evento       setNombreArchivoEn()   Sets the current record's "nombre_archivo_en" value
 * @method Evento       setNombreIcono()       Sets the current record's "nombre_icono" value
 * @method Evento       setCategoriaId()       Sets the current record's "categoria_id" value
 * @method Evento       setSubcategoriaId()    Sets the current record's "subcategoria_id" value
 * @method Evento       setCreatedAt()         Sets the current record's "created_at" value
 * @method Evento       setCreatedBy()         Sets the current record's "created_by" value
 * @method Evento       setUpdatedAt()         Sets the current record's "updated_at" value
 * @method Evento       setUpdatedBy()         Sets the current record's "updated_by" value
 * @method Evento       setDeletedAt()         Sets the current record's "deleted_at" value
 * @method Evento       setDeletedBy()         Sets the current record's "deleted_by" value
 * @method Evento       setCategoria()         Sets the current record's "Categoria" value
 * @method Evento       setSubcategoria()      Sets the current record's "Subcategoria" value
 * 
 * @package    Fotiar
 * @subpackage model
 * @author     Danilo R. Frid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEvento extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('evento');
        $this->hasColumn('caption', 'varchar', 128, array(
             'type' => 'varchar',
             'length' => 128,
             ));
        $this->hasColumn('nombre_archivo_es', 'varchar', 255, array(
             'type' => 'varchar',
             'length' => 255,
             ));
        $this->hasColumn('nombre_archivo_pt', 'varchar', 255, array(
             'type' => 'varchar',
             'length' => 255,
             ));
        $this->hasColumn('nombre_archivo_en', 'varchar', 255, array(
             'type' => 'varchar',
             'length' => 255,
             ));
        $this->hasColumn('nombre_icono', 'varchar', 255, array(
             'type' => 'varchar',
             'length' => 255,
             ));
        $this->hasColumn('categoria_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('subcategoria_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('created_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('created_by', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('updated_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('updated_by', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('deleted_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('deleted_by', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Categoria', array(
             'local' => 'categoria_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasOne('Subcategoria', array(
             'local' => 'subcategoria_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));
    }
}