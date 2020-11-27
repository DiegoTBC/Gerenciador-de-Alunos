<?php

namespace Diego\Gerenciador\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $dbParams = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite'
        );

        return EntityManager::create($dbParams, $config);
    }
}