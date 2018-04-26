<?php

namespace Smtm\Crawlbot\Form\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Form\IndexForm;
use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexFormFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $translator = $container->get(Translator::class);
        $indexForm = new IndexForm('indexform', [], $translator);

        return $indexForm;
    }
}