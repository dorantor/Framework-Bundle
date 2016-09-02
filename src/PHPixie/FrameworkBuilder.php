<?php

namespace PHPixie;

class FrameworkBuilder implements \PHPixie\Bundles\Bundle\Provides\Console
{
    protected $frameworkBuilder;
    protected $console;
    
    public function __construct($frameworkBuilder)
    {
        $this->frameworkBuilder = $frameworkBuilder
    }
    
    public function console()
    {
        if($this->console === null) {
            $this->console = new Console($this->frameworkBuilder);
        }
        
        return $this->console;
    }
    
    public function name()
    {
        return 'framework';
    }
}