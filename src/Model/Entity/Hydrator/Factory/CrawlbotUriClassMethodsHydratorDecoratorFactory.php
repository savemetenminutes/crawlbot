<?php

namespace Smtm\Crawlbot\Model\Entity\Hydrator\Factory;

use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\Filter\FilterComposite;
use Zend\ServiceManager\Factory\FactoryInterface;

class CrawlbotUriClassMethodsHydratorDecoratorFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $hydrator = new ClassMethods();
        $hydrator->removeFilter('is');
        $hydrator->removeFilter('has');
        $filterOutProperties = [
            'getHostValidator',
            'getIpValidator',
            'getUriSyntaxValidator',
            'getAllowedSchemes',
            'getDisallowedSchemes',
            'getEscaper',
            'getQueryAsArray',
        ];
        foreach($filterOutProperties as $filterOutProperty) {
            $hydrator->addFilter($filterOutProperty, function ($property) use($filterOutProperty) {
                return $this->getPropertyName($property) !== $filterOutProperty;
            }, FilterComposite::CONDITION_AND);
        }

        return $hydrator;
    }

    public function getPropertyName($fqnPropertyName)
    {
        $propertyName = explode('::', $fqnPropertyName);

        return array_pop($propertyName);
    }
}