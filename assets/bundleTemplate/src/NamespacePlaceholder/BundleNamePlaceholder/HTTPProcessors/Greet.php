<?php

namespace NamespacePlaceholder\BundleNamePlaceholder\HTTPProcessors;

use PHPixie\HTTP\Request;

class Greet extends Processor
{
    /**
     * Default action
     * @param Request $request HTTP request
     * @return mixed
     */
    public function defaultAction($request)
    {
        $template = $this->components()->template();

        $container = $template->get('app:greet');
        $container->message = "Have fun coding!";
        return $container;
    }
}