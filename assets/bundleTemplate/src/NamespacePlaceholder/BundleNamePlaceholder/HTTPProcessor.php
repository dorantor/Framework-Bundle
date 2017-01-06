<?php

namespace NamespacePlaceholder\BundleNamePlaceholder;

class HTTPProcessor extends \PHPixie\DefaultBundle\Processor\HTTP\Builder
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
     * Build 'greet' processor
     *
     * @return HTTPProcessors\Greet
     */
    protected function buildGreetProcessor()
    {
        return new HTTPProcessors\Greet($this->builder);
    }
}