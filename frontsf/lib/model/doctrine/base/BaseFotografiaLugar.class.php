<?php

/**
 * BaseFotografiaLugar
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $fotografia_id
 * @property integer $lugar_id
 * @property timestamp $created_at
 * @property integer $created_by
 * @property timestamp $updated_at
 * @property integer $updated_by
 * @property timestamp $deleted_at
 * @property integer $deleted_by
 * 
 * @method integer         getFotografiaId()  Returns the current record's "fotografia_id" value
 * @method integer         getLugarId()       Returns the current record's "lugar_id" value
 * @method timestamp       getCreatedAt()     Returns the current record's "created_at" value
 * @method integer         getCreatedBy()     Returns the current record's "created_by" value
 * @method timestamp       getUpdatedAt()     Returns the current record's "updated_at" value
 * @method integer         getUpdatedBy()     Returns the current record's "updated_by" value
 * @method timestamp       getDeletedAt()     Returns the current record's "deleted_at" value
 * @method integer         getDeletedBy()     Returns the current record's "deleted_by" value
 * @method FotografiaLugar setFotografiaId()  Sets the current record's "fotografia_id" value
 * @method FotografiaLugar setLugarId()       Sets the current record's "lugar_id" value
 * @method FotografiaLugar setCreatedAt()     Sets the current record's "created_at" value
 * @method FotografiaLugar setCreatedBy()     Sets the current record's "created_by" value
 * @method FotografiaLugar setUpdatedAt()     Sets the current record's "updated_at" value
 * @method FotografiaLugar setUpdatedBy()     Sets the current record's "updated_by" value
 * @method FotografiaLugar setDeletedAt()     Sets the current record's "deleted_at" value
 * @method FotografiaLugar setDeletedBy()     Sets the current record's "deleted_by" value
 * 
 * @package    Fotiar
 * @subpackage model
 * @author     Danilo R. Frid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFotografiaLugar extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('fotografia_lugar');
        $this->hasColumn('fotografia_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('lugar_id', 'integer', null, array(
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