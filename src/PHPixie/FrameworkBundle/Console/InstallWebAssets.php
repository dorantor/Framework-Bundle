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
        
        $config->description("Symlink or copy bundle web files to the projects web folder");
        
        $config->option('copy')
            ->flag()
            ->description("Whether to copy web directories instead of symlinking them");
        
        parent::__construct($config);
    }
    
    public function run($argumentData, $optionData)
    {
        $copy = $optionData->get('copy', false);
        
        if($copy) {
            $this->writeLine("Copying web asset directories:");
        }else {
            $this->writeLine("Symlinking web asset directories:");
        }
        
        $path = $this->assets->webRoot()->path('bundles');
        
        $this->remove($path);
        mkdir($path, 0755);
        
        foreach($this->bundles->bundles() as $name => $bundle) {
            if(!($bundle instanceof \PHPixie\Bundles\Bundle\Provides\WebRoot)) {
                continue;
            }
                
            if(($bundleRoot = $bundle->webRoot()) === null) {
                continue;
            }
            
            $this->writeLine("Bundle: $name");
            $bundlePath = $path.'/'.$name;
            
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
            if (!$item->isLink() && $item->isDir()) {
                mkdir($dst.'/'.$iterator->getSubPathName());
                continue;
            }
            
            copy($item, $dst.'/'.$iterator->getSubPathName());
        }
    }
    
    protected function remove($path)
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $path,
                \RecursiveDirectoryIterator::SKIP_DOTS
            ),
            \RecursiveIteratorIterator::CHILD_FIRST
        );
        
        foreach ($iterator as $item) {
            if (!$item->isLink() && $item->isDir()) {
                rmdir($item);
            } else {
                unlink($item);
            }
        }
        
        rmdir($path);
    }
}
