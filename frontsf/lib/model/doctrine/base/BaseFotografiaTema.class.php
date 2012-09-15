<?php

/**
 * BaseFotografiaTema
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $fotografia_id
 * @property integer $tema_id
 * @property timestamp $created_at
 * @property integer $created_by
 * @property timestamp $updated_at
 * @property integer $updated_by
 * @property timestamp $deleted_at
 * @property integer $deleted_by
 * 
 * @method integer        getFotografiaId()  Returns the current record's "fotografia_id" value
 * @method integer        getTemaId()        Returns the current record's "tema_id" value
 * @method timestamp      getCreatedAt()     Returns the current record's "created_at" value
 * @method integer        getCreatedBy()     Returns the current record's "created_by" value
 * @method timestamp      getUpdatedAt()     Returns the current record's "updated_at" value
 * @method integer        getUpdatedBy()     Returns the current record's "updated_by" value
 * @method timestamp      getDeletedAt()     Returns the current record's "deleted_at" value
 * @method integer        getDeletedBy()     Returns the current record's "deleted_by" value
 * @method FotografiaTema setFotografiaId()  Sets the current record's "fotografia_id" value
 * @method FotografiaTema setTemaId()        Sets the current record's "tema_id" value
 * @method FotografiaTema setCreatedAt()     Sets the current record's "created_at" value
 * @method FotografiaTema setCreatedBy()     Sets the current record's "created_by" value
 * @method FotografiaTema setUpdatedAt()     Sets the current record's "updated_at" value
 * @method FotografiaTema setUpdatedBy()     Sets the current record's "updated_by" value
 * @method FotografiaTema setDeletedAt()     Sets the current record's "deleted_at" value
 * @method FotografiaTema setDeletedBy()     Sets the current record's "deleted_by" value
 * 
 * @package    Fotiar
 * @subpackage model
 * @author     Danilo R. Frid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFotografiaTema extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('fotografia_tema');
        $this->hasColumn('fotografia_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('tema_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('created_by', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_by', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('deleted_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('deleted_by', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}