<?php

namespace NS\BUNDLE;

class HTTP extends \PHPixie\DefaultBundle\HTTP
{
    protected $classMap = [
        'greet' => 'NS\BUNDLE\HTTP\Greet'
    ];
}