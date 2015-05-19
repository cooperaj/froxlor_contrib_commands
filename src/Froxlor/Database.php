<?php namespace Froxlor;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Database
{
    protected $entityManager;

    public function __construct(Config $configuration)
    {
        $doctrineConfig =
            Setup::createAnnotationMetadataConfiguration([SRC_DIR . '/Froxlor/Entity'], true);

        $params = $configuration->get('parameters');

        $doctrineParams = [
            'driver' => $params['database_driver'],
            'user' => $params['database_user'],
            'password' => $params['database_password'],
            'dbname' => $params['database_name'],
            'host' => $params['database_host'],
            'port' => $params['database_port']
        ];

        $this->entityManager = EntityManager::create($doctrineParams, $doctrineConfig);
    }

    public function getRepository($name)
    {
        return $this->entityManager
            ->getRepository($name);
    }
}
