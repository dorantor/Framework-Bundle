<?php

namespace PHPixie\FrameworkBundle\Console;

class InstallWebAssets extends \PHPixie\Console\Command\Implementation
{
    protected $assets;
    protected $bundles;
    
    public function __construct($config, $assets, $bundles)
    {
        $this->assets  = $assets;
        $this->bundles = $bundles;
        
        $config->name('installassets');
        $config->description("Symlink or copy bundle web files to the projects web folder");
        
        $config->option('copy')->flag();
    }
    
    public function run($optionData, $argumentData)
    {
        $copy = $optionData->get('copy', false);
        if($copy) {
            $this->writeLine("Copying web asset directories:");
        }else {
            $this->writeLine("Symlinking web asset directories:");
        }
        
        $path = $this->aseets->webRoot()->path('bundles');
        
        foreach($this->bundles->bundles() as $name => $bundle) {
            $this->writeLine("Bundle: $name");
            
            if(!($bundle instanceof \PHPixie\Bundles\Bundle\Provides\WebRoot)) {
                continue;
            }
                
            if(($bundleRoot = $bundle->webRoot()) === null) {
                continue;
            }
            
            $bundlePath = $path.'/'.$name;
            
            if(file_exists($bundlePath)) {
                unlink($bundlePath);
            }
            
            if($copy) {
                $this->copyRecursive($bundleRoot->path(), $path.'/'.$name);
            } else {
                symlink($bundleRoot->path(), $path.'/'.$name);
            }
        }
    }
    
    protected function copyRecursive($src, $dst)
    {
        mkdir($dst, 0755);
        
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $src,
                \RecursiveDirectoryIterator::SKIP_DOTS
            ),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        
        foreach($iterator as $item) {
            if ($item->isDir()) {
                mkdir($dest.'/'.$iterator->getSubPathName());
                continue;
            }
            
            copy($item, $dest.'/'.$iterator->getSubPathName());
        }
    }
}