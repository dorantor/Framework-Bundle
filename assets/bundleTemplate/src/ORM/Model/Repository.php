<?php

namespace NS\BNAME\ORM\Model;

use PHPixie\ORM\Wrappers\Type\Database\Repository as DatabaseRepository;
use NS\BNAME\BNAMEBuilder;

abstract class Repository extends DatabaseRepository
{
    /**
     * @var BNAMEBuilder
     */
    protected $builder;

    /**
     * @param DatabaseRepository $repository
     * @param BNAMEBuilder $builder
     */
    public function __construct($repository, $builder)
    {
        $this->builder = $builder;
        parent::__construct($repository);
    }
}