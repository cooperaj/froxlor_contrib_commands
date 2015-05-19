<?php

DEFINE('APP_DIR', __DIR__);
DEFINE('SRC_DIR', APP_DIR . '/../src');

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

// setup DI container
$container = new ContainerBuilder();

$container->setParameter('configuration.directory', APP_DIR . '/config');
$container->register('config', '\Froxlor\Config')
    ->addArgument('%configuration.directory%');

$container->register('db', '\Froxlor\Database')
    ->addArgument(new Reference('config'));

$container->register('template', '\Froxlor\Template');

$container->register(
    'cmd_bindSlaveConfiguration',
    '\Froxlor\Command\BindSlaveConfigurationCommand'
)
    ->addMethodCall('setContainer', [new Reference('service_container')]);

$container->compile();
