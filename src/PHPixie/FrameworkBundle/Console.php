<?php

namespace Project\FrameworkBundle;

class Console extends \PHPixie\Console\Registry\Provider\Implementation
{
    
    protected $frameworkBuilder;
    
    public function __construct($frameworkBuilder)
    {
        $this->frameworkBuilder = $frameworkBuilder;
    }
    
    public function commandNames()
    {
        return array('installWebAssets');
    }
    
    protected function buildInstallWebAssetsCommand($commandConfig)
    {
        return new Console\InstallWebAssets(
            $commandConfig,
            $this->frameworkBuilder->assets(),
            $this->frameworkBuilder->components()->bundles()
        );
    }
}