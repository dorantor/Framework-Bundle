<?php

namespace NamespacePlaceholder\BundleNamePlaceholder\Console;

use PHPixie\Console\Command\Config;
use PHPixie\Slice\Data;

/**
 * Simple console command to greet the user
 */
class Greet extends Command
{
    /**
     * Configure your command
     * @param Config $config
     */
    protected function configure($config)
    {
        $config
            ->description("Greet the user");
        
        $config->argument('message')
            ->description("Message to display");
        
        parent::__construct($config, $builder);
    }

    /**
     * @param Data $argumentData
     * @param Data $optionData
     */
    public function run($argumentData, $optionData)
    {
        $message = $argumentData->get('message', "Have fun coding!");
        $this->writeLine($message);
    }
}