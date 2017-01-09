<?php

namespace NS\BUNDLE\ORM;

use NS\BUNDLE\BUNDLEBuilder;
use PHPixie\ORM\Wrappers\Type\Database\Repository as ORMRepository;

abstract class Repository extends ORMRepository
{
    /**
     * @var BUNDLEBuilder
     */
    protected $builder;

    /**
     * @param ORMRepository $repository
     * @param BUNDLEBuilder $builder
     */
    public function __construct($repository, $builder)
    {
        $this->builder = $builder;
        parent::__construct($repository);
    }

}