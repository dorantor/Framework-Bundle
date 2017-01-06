<?php

namespace NamespacePlaceholder\BundleNamePlaceholder\Console;

use NamespacePlaceholder\BundleNamePlaceholder\Builder;
use PHPixie\Console\Command\Config;
use PHPixie\Console\Command\Implementation;
use PHPixie\BundleFramework\Components;

/**
 * Your base command class
 */
abstract class Command extends Implementation
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param Config $config
     * @param Builder $builder
     */
    public function __construct($config, $builder)
    {
        $this->builder = $builder;
        parent::__construct($config);
    }

    /**
     * @return Components
     */
    protected function components()
    {
        return $this->builder->components();
    }

    /**
     * @param Config $config
     * @return void
     */
    abstract protected function configure($config);
}