<?php

/**
 * Fotografia filter form base class.
 *
 * @package    Fotiar
 * @subpackage filter
 * @author     Danilo R. Frid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFotografiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'     => new sfWidgetFormFilterInput(),
      'nombre_archivo'  => new sfWidgetFormFilterInput(),
      'camera'          => new sfWidgetFormFilterInput(),
      'model'           => new sfWidgetFormFilterInput(),
      'fstop'           => new sfWidgetFormFilterInput(),
      'exposuretime'    => new sfWidgetFormFilterInput(),
      'isospeed'        => new sfWidgetFormFilterInput(),
      'focallength'     => new sfWidgetFormFilterInput(),
      'taken'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'mimetype'        => new sfWidgetFormFilterInput(),
      'usuario_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'categoria_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'subcategoria_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Subcategoria'), 'add_empty' => true)),
      'sesion_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sesion'), 'add_empty' => true)),
      'carga_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Carga'), 'add_empty' => true)),
      'precio'          => new sfWidgetFormFilterInput(),
      'reviewed'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_by'      => new sfWidgetFormFilterInput(),
      'updated_by'      => new sfWidgetFormFilterInput(),
      'deleted_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'deleted_by'      => new sfWidgetFormFilterInput(),
      'lugares_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Lugar')),
      'temas_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Tema')),
      'profile_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUserProfile')),
    ));

    $this->setValidators(array(
      'descripcion'     => new sfValidatorPass(array('required' => false)),
      'nombre_archivo'  => new sfValidatorPass(array('required' => false)),
      'camera'          => new sfValidatorPass(array('required' => false)),
      'model'           => new sfValidatorPass(array('required' => false)),
      'fstop'           => new sfValidatorPass(array('required' => false)),
      'exposuretime'    => new sfValidatorPass(array('required' => false)),
      'isospeed'        => new sfValidatorPass(array('required' => false)),
      'focallength'     => new sfValidatorPass(array('required' => false)),
      'taken'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'mimetype'        => new sfValidatorPass(array('required' => false)),
      'usuario_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id')),
      'categoria_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'id')),
      'subcategoria_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Subcategoria'), 'column' => 'id')),
      'sesion_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Sesion'), 'column' => 'id')),
      'carga_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Carga'), 'column' => 'id')),
      'precio'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'reviewed'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_by'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_by'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'deleted_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_by'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lugares_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Lugar', 'required' => false)),
      'temas_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Tema', 'required' => false)),
      'profile_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUserProfile', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fotografia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addLugaresListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.FotografiaLugar FotografiaLugar')
      ->andWhereIn('FotografiaLugar.lugar_id', $values)
    ;
  }

  public function addTemasListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.FotografiaTema FotografiaTema')
      ->andWhereIn('FotografiaTema.tema_id', $values)
    ;
  }

  public function addProfileListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.sfGuardUserProfileFotografia sfGuardUserProfileFotografia')
      ->andWhereIn('sfGuardUserProfileFotografia.sf_guard_user_profile_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Fotografia';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'descripcion'     => 'Text',
      'nombre_archivo'  => 'Text',
      'camera'          => 'Text',
      'model'           => 'Text',
      'fstop'           => 'Text',
      'exposuretime'    => 'Text',
      'isospeed'        => 'Text',
      'focallength'     => 'Text',
      'taken'           => 'Date',
      'mimetype'        => 'Text',
      'usuario_id'      => 'ForeignKey',
      'categoria_id'    => 'ForeignKey',
      'subcategoria_id' => 'ForeignKey',
      'sesion_id'       => 'ForeignKey',
      'carga_id'        => 'ForeignKey',
      'precio'          => 'Number',
      'reviewed'        => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'created_by'      => 'Number',
      'updated_by'      => 'Number',
      'deleted_at'      => 'Date',
      'deleted_by'      => 'Number',
      'lugares_list'    => 'ManyKey',
      'temas_list'      => 'ManyKey',
      'profile_list'    => 'ManyKey',
    );
  }
}
