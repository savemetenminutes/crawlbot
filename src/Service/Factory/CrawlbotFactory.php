<?php

namespace Smtm\Crawlbot\Service\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Service\Crawlbot;
use Smtm\Crawlbot\Model\CrawlbotTable;
use Smtm\Http\Client;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\Driver\Pdo\Pdo;
use Zend\Db\Adapter\Driver\Sqlsrv\Sqlsrv;
use Zend\Db\Adapter\Platform\Mysql;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;

class CrawlbotFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        $client = $container->get(Client::class);
        $adapters = [];
        $adapters['Mysql'] = new Adapter(new Pdo($config['Mysql']));
        $adapters['Postgresql'] = new Adapter(new Pdo($config['Postgresql']));
        $adapters['Sqlserver'] = new Adapter(new Sqlsrv($config['Sqlserver']));

        $table = new CrawlbotTable($adapters['Mysql']);


        return new Crawlbot($client, $table, $adapters);
    }

}