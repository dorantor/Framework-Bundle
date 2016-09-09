<?php

namespace NamespacePlaceholder;

/**
 * Default application bundle
 */
class BundleNamePlaceholder extends \PHPixie\DefaultBundle
{
    /**
     * Build bundle builder
     * @param \PHPixie\BundleFramework\Builder $frameworkBuilder
     * @return BundleNamePlaceholder\Builder
     */
    protected function buildBuilder($frameworkBuilder)
    {
        return new BundleNamePlaceholder\Builder($frameworkBuilder);
    }
}