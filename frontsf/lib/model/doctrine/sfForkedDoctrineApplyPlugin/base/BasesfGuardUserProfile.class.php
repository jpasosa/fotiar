<?php

/**
 * BasesfGuardUserProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $email_new
 * @property string $firstname
 * @property string $lastname
 * @property timestamp $validate_at
 * @property string $validate
 * @property string $country
 * @property string $city
 * @property string $address
 * @property string $phone
 * @property timestamp $birthdate
 * @property sfGuardUser $User
 * @property Doctrine_Collection $Fotografias
 * @property Doctrine_Collection $SfGuardUserProfileFotografias
 * 
 * @method integer             getUserId()                        Returns the current record's "user_id" value
 * @method string              getEmailNew()                      Returns the current record's "email_new" value
 * @method string              getFirstname()                     Returns the current record's "firstname" value
 * @method string              getLastname()                      Returns the current record's "lastname" value
 * @method timestamp           getValidateAt()                    Returns the current record's "validate_at" value
 * @method string              getValidate()                      Returns the current record's "validate" value
 * @method string              getCountry()                       Returns the current record's "country" value
 * @method string              getCity()                          Returns the current record's "city" value
 * @method string              getAddress()                       Returns the current record's "address" value
 * @method string              getPhone()                         Returns the current record's "phone" value
 * @method timestamp           getBirthdate()                     Returns the current record's "birthdate" value
 * @method sfGuardUser         getUser()                          Returns the current record's "User" value
 * @method Doctrine_Collection getFotografias()                   Returns the current record's "Fotografias" collection
 * @method Doctrine_Collection getSfGuardUserProfileFotografias() Returns the current record's "SfGuardUserProfileFotografias" collection
 * @method sfGuardUserProfile  setUserId()                        Sets the current record's "user_id" value
 * @method sfGuardUserProfile  setEmailNew()                      Sets the current record's "email_new" value
 * @method sfGuardUserProfile  setFirstname()                     Sets the current record's "firstname" value
 * @method sfGuardUserProfile  setLastname()                      Sets the current record's "lastname" value
 * @method sfGuardUserProfile  setValidateAt()                    Sets the current record's "validate_at" value
 * @method sfGuardUserProfile  setValidate()                      Sets the current record's "validate" value
 * @method sfGuardUserProfile  setCountry()                       Sets the current record's "country" value
 * @method sfGuardUserProfile  setCity()                          Sets the current record's "city" value
 * @method sfGuardUserProfile  setAddress()                       Sets the current record's "address" value
 * @method sfGuardUserProfile  setPhone()                         Sets the current record's "phone" value
 * @method sfGuardUserProfile  setBirthdate()                     Sets the current record's "birthdate" value
 * @method sfGuardUserProfile  setUser()                          Sets the current record's "User" value
 * @method sfGuardUserProfile  setFotografias()                   Sets the current record's "Fotografias" collection
 * @method sfGuardUserProfile  setSfGuardUserProfileFotografias() Sets the current record's "SfGuardUserProfileFotografias" collection
 * 
 * @package    Fotiar
 * @subpackage model
 * @author     Danilo R. Frid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_profile');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('email_new', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('firstname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('lastname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('validate_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('validate', 'string', 33, array(
             'type' => 'string',
             'length' => 33,
             ));
        $this->hasColumn('country', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('city', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('phone', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('birthdate', 'timestamp', 25, array(
             'type' => 'timestamp',
             'length' => 25,
             ));


        $this->index('validate', array(
             'fields' => 
             array(
              0 => 'validate',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('Fotografia as Fotografias', array(
             'refClass' => 'sfGuardUserProfileFotografia',
             'local' => 'sf_guard_user_profile_id',
             'foreign' => 'fotografia_id'));

        $this->hasMany('sfGuardUserProfileFotografia as SfGuardUserProfileFotografias', array(
             'local' => 'id',
             'foreign' => 'sf_guard_user_profile_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}