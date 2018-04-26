<?php

namespace Smtm\Crawlbot\Controller\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Controller\IndexController;
use Smtm\Crawlbot\Form\IndexForm;
use Smtm\Http\Client;
use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $translator = $container->get(Translator::class);
        $indexForm = $container->get(IndexForm::class);
        $httpClient = $container->get(Client::class);

        return new IndexController($translator, $indexForm, $httpClient);
    }
}