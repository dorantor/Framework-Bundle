<?php

namespace NamespacePlaceholder\BundleNamePlaceholder;

use \PHPixie\Console\Command\Config;

class Console extends \PHPixie\DefaultBundle\Console
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
    
    public function commandNames()
    {
        return array('greet');
    }
    
    /**
     * Build 'greet' command
     *
     * @param Config $commandConfig
     *
     * @return Console\Greet
     */
    protected function buildGreetCommand($commandConfig)
    {
        return new Console\Greet($commandConfig, $this->builder);
    }
}