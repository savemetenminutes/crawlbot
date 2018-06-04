<?php

namespace Smtm\Crawlbot\Service\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Service\Crawlbot;
use Smtm\Crawlbot\Model\Crawlbot as ModelCrawlbot;
use Smtm\Http\Client;
use Zend\ServiceManager\Factory\FactoryInterface;

class CrawlbotFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $client = $container->get(Client::class);
        $model = $container->get(ModelCrawlbot::class);

        return new Crawlbot($client, $model);
    }
}