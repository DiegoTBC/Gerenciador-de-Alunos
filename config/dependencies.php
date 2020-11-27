<?php

$containerBuilder = new \DI\ContainerBuilder();

$containerBuilder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => function(){
        return (new \Diego\Gerenciador\Infra\EntityManagerCreator())->getEntityManager();
    }
]);

return $containerBuilder->build();