<?php

namespace NS\BUNDLE;

/**
 * Default application bundle
 */
class BUNDLEBundle extends \PHPixie\DefaultBundle
{
    /**
     * Build bundle builder
     * @param \PHPixie\BundleFramework\Builder $frameworkBuilder
     * @return BUNDLEBuilder
     */
    protected function buildBuilder($frameworkBuilder)
    {
        return new BUNDLEBuilder($frameworkBuilder);
    }
}