<?php

namespace NS\BUNDLE\HTTP;

use NS\BUNDLE\BUNDLEBuilder;
use PHPixie\BundleFramework\Components;
use PHPixie\DefaultBundle\Processor\HTTP\Actions;

/**
 * Your base web processor class
 */
abstract class Processor extends Actions
{
    /**
     * @var BUNDLEBuilder
     */
    protected $builder;

    /**
     * Constructor
     * @param BUNDLEBuilder $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return Components
     */
    protected function components()
    {
        return $this->builder->components();
    }
}