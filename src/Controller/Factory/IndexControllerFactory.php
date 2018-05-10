<?php

namespace Smtm\Crawlbot\Controller\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Controller\IndexController;
use Smtm\Crawlbot\Form\IndexFormDecorator;
use Smtm\Crawlbot\Service\Crawlbot;
use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $translator = $container->get(Translator::class);
        $formManager = $container->get('FormElementManager');
        $indexForm = $formManager->get(IndexFormDecorator::class);
        $crawlbot = $container->get(Crawlbot::class);

        return new IndexController($translator, $indexForm, $crawlbot);
    }
}