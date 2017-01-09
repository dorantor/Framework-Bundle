<?php

namespace NS\BUNDLE\ORM;

use NS\BUNDLE\BUNDLEBuilder;
use PHPixie\ORM\Wrappers\Type\Database\Entity as ORMEntity;

abstract class Repository extends ORMEntity
{
    /**
     * @var BUNDLEBuilder
     */
    protected $builder;

    /**
     * @param ORMEntity $entity
     * @param BUNDLEBuilder $builder
     */
    public function __construct($entity, $builder)
    {
        $this->builder = $builder;
        parent::__construct($entity);
    }

}