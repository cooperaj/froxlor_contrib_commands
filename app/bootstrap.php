<?php

DEFINE('APP_DIR', __DIR__);
DEFINE('CONFIG_DIR', APP_DIR . '/config');
DEFINE('SRC_DIR', APP_DIR . '/../src');

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

// setup DI container
$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(CONFIG_DIR));
$loader->load('services.yml');

$container->register(
    'cmd_bindSlaveConfiguration',
    '\Froxlor\Command\BindSlaveConfigurationCommand'
)
    ->addMethodCall('setContainer', [new Reference('service_container')]);

$container->compile();
