<?php

namespace Smtm\Crawlbot\Model\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Model\Crawlbot as ModelCrawlbot;
use Smtm\Crawlbot\Model\Entity\CrawlbotEntityManager;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\Driver\Pdo\Pdo;
use Zend\Hydrator\DelegatingHydrator;
use Zend\ServiceManager\Factory\FactoryInterface;

class CrawlbotFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get(CrawlbotEntityManager::class);

        $delegatingHydrator = $container->get(DelegatingHydrator::class);

        $options = null;

        $config = $container->get('config');
        $adapters = [];
        $adapters['Mysql'] = new Adapter(new Pdo($config['Mysql']));
        $adapters['Postgresql'] = new Adapter(new Pdo($config['Postgresql']));
        $adapters['Sqlserver'] = new Adapter(new Pdo($config['Sqlserver']));

        return new ModelCrawlbot($entityManager, $delegatingHydrator, $options, $adapters['Mysql']);
    }
}