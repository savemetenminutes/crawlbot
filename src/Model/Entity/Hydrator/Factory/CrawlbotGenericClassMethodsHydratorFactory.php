<?php

namespace Smtm\Crawlbot\Model\Entity\Hydrator\Factory;

use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;
use Zend\ServiceManager\Factory\FactoryInterface;

class CrawlbotGenericClassMethodsHydratorFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $hydrator = new ClassMethods();

        return $hydrator;
    }
}