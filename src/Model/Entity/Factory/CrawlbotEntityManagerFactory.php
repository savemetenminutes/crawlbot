<?php

namespace Smtm\Crawlbot\Model\Entity\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Model\Entity\CrawlbotEntityManager;
use Zend\ServiceManager\Factory\FactoryInterface;

class CrawlbotEntityManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $pluginManagerConfig = $container->get('config')[CrawlbotEntityManager::class] ?? [];
        return new CrawlbotEntityManager($container, $pluginManagerConfig);
    }
}