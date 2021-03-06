<?php

/**
 * BaseCompartir
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $comparte_id
 * @property integer $compartido_id
 * @property boolean $activo
 * 
 * @method integer   getComparteId()    Returns the current record's "comparte_id" value
 * @method integer   getCompartidoId()  Returns the current record's "compartido_id" value
 * @method boolean   getActivo()        Returns the current record's "activo" value
 * @method Compartir setComparteId()    Sets the current record's "comparte_id" value
 * @method Compartir setCompartidoId()  Sets the current record's "compartido_id" value
 * @method Compartir setActivo()        Sets the current record's "activo" value
 * 
 * @package    scheduler
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCompartir extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('compartir');
        $this->hasColumn('comparte_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('compartido_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('activo', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}