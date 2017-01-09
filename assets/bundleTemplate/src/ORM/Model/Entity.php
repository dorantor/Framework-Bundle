<?php

namespace NS\BNAME;

use PHPixie\ORM\Wrappers\Type\Database\Entity as DatabaseEntity;
use NS\BNAME\BNAMEBuilder;

abstract class Entity extends DatabaseEntity
{
    /**
     * @var BNAMEBuilder
     */
    protected $builder;

    /**
     * @param DatabaseEntity $entity
     * @param BNAMEBuilder $builder
     */
    public function __construct($entity, $builder)
    {
        $this->builder = $builder;
        parent::__construct($entity);
    }
}