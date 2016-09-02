<?php

namespace PHPixie;

class FrameworkBundle implements \PHPixie\Bundles\Bundle\Provides\Console
{
    protected $frameworkBuilder;
    protected $console;
    
    public function __construct($frameworkBuilder)
    {
        $this->frameworkBuilder = $frameworkBuilder;
    }
    
    public function consoleProvider()
    {
        if($this->console === null) {
            $this->console = new FrameworkBundle\Console($this->frameworkBuilder);
        }
        
        return $this->console;
    }
    
    public function name()
    {
        return 'framework';
    }
}