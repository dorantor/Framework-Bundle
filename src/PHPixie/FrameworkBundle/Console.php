<?php

namespace PHPixie\FrameworkBundle;

class Console extends \PHPixie\Console\Registry\Provider\Implementation
{
    
    protected $frameworkBuilder;
    
    public function __construct($frameworkBuilder)
    {
        $this->frameworkBuilder = $frameworkBuilder;
    }
    
    public function commandNames()
    {
        return array('installWebAssets', 'generateBundle');
    }
    
    protected function buildInstallWebAssetsCommand($commandConfig)
    {
        return new Console\InstallWebAssets(
            $commandConfig,
            $this->frameworkBuilder->assets(),
            $this->frameworkBuilder->components()->bundles(),
            $this->frameworkBuilder->components()->filesystem()
        );
    }
    
    protected function buildGenerateBundleCommand($commandConfig)
    {
        return new Console\GenerateBundle(
            $commandConfig,
            $this->frameworkBuilder
        );
    }
}