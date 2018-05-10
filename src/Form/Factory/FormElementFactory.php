<?php

namespace Smtm\Crawlbot\Form\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormElementFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $element = new $requestedName(constant($requestedName.'::NAME'), []);

        return $element;
    }
}