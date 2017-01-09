<?php

namespace NS\BUNDLE;

class Console extends \PHPixie\DefaultBundle\Console
{
    protected $classMap = [
        'greet' => 'NS\BUNDLE\Console\Greet'
    ];
}