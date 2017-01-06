<?php

namespace NamespacePlaceholder\BundleNamePlaceholder\HTTPProcessors;

use NamespacePlaceholder\BundleNamePlaceholder\Builder;
use PHPixie\BundleFramework\Components;
use PHPixie\DefaultBundle\Processor\HTTP\Actions;

/**
 * Your base web processor class
 */
abstract class Processor extends Actions
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * Constructor
     * @param Builder $builder
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