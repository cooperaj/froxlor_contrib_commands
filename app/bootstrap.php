<?php

require __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\FileLocator;

use Froxlor\YamlConfigurationLoader;

// directories of config files
$directories = [__DIR__ . '/config'];
$locator = new FileLocator($directories);

// convert the config file into an array
$loader = new YamlConfigurationLoader($locator);
$configValues = $loader->load($locator->locate('parameters.yml'));

// doctrine
$doctrineConfig =
    Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../src/Froxlor/Entity'], true);
$doctrineParams = [
    'driver' => $configValues['parameters']['database_driver'],
    'user' => $configValues['parameters']['database_user'],
    'password' => $configValues['parameters']['database_password'],
    'dbname' => $configValues['parameters']['database_name'],
    'host' => $configValues['parameters']['database_host'],
    'port' => $configValues['parameters']['database_port']
];
$entityManager = EntityManager::create($doctrineParams, $doctrineConfig);


$twigLoader = new Twig_Loader_Filesystem(__DIR__ . '/../src/Froxlor/Resources/Views');
$twig = new Twig_Environment($twigLoader);
