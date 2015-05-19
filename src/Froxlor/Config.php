<?php namespace Froxlor;

use Symfony\Component\Config\FileLocator;

class Config
{
    protected $configValues;

    public function __construct($configDir)
    {
        $locator = new FileLocator([$configDir]);

        // convert the config file into an array
        $loader = new YamlConfigurationLoader($locator);
        $this->configValues = $loader->load($locator->locate('parameters.yml'));
    }

    public function get($name)
    {
        return $this->configValues[$name];
    }
}
