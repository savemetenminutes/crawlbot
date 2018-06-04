<?php

namespace Smtm\Crawlbot;

use Smtm\Crawlbot\Controller\Factory\IndexControllerFactory;
use Smtm\Crawlbot\Model\Crawlbot as ModelCrawlbot;
use Smtm\Crawlbot\Model\Entity\Crawlbot as EntityCrawlbot;
use Smtm\Crawlbot\Model\Entity\CrawlbotA as EntityCrawlbotA;
use Smtm\Crawlbot\Model\Entity\CrawlbotResponse as EntityCrawlbotResponse;
use Smtm\Crawlbot\Model\Entity\CrawlbotEntityManager;
use Smtm\Crawlbot\Model\Entity\CrawlbotH1 as EntityCrawlbotH1;
use Smtm\Crawlbot\Model\Entity\CrawlbotH2 as EntityCrawlbotH2;
use Smtm\Crawlbot\Model\Entity\CrawlbotH3 as EntityCrawlbotH3;
use Smtm\Crawlbot\Model\Entity\CrawlbotH4 as EntityCrawlbotH4;
use Smtm\Crawlbot\Model\Entity\CrawlbotH5 as EntityCrawlbotH5;
use Smtm\Crawlbot\Model\Entity\CrawlbotH6 as EntityCrawlbotH6;
use Smtm\Crawlbot\Model\Entity\CrawlbotImg as EntityCrawlbotImg;
use Smtm\Crawlbot\Model\Entity\CrawlbotLink as EntityCrawlbotLink;
use Smtm\Crawlbot\Model\Entity\CrawlbotScript as EntityCrawlbotScript;
use Smtm\Crawlbot\Model\Entity\CrawlbotUriCrawled as EntityCrawlbotUriCrawled;
use Smtm\Crawlbot\Model\Entity\CrawlbotUriQueued as EntityCrawlbotUriQueued;
use Smtm\Crawlbot\Model\Entity\Factory\CrawlbotEntityManagerFactory;
use Smtm\Crawlbot\Model\Factory\CrawlbotFactory as ModelCrawlbotFactory;
use Smtm\Crawlbot\Service\Crawlbot;
use Smtm\Crawlbot\Service\Factory\ClientFactory;
use Smtm\Crawlbot\Service\Factory\CrawlbotFactory;
use Smtm\Http\Client;
use Zend\Hydrator\DelegatingHydrator;
use Zend\Hydrator\DelegatingHydratorFactory;
use Zend\I18n\Translator\TranslatorServiceFactory;
use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => include 'route.config.php',

    'service_manager' => [
        'factories' => [
            Translator::class => TranslatorServiceFactory::class,
            Client::class => ClientFactory::class,
            DelegatingHydrator::class => DelegatingHydratorFactory::class,
            CrawlbotEntityManager::class => CrawlbotEntityManagerFactory::class,
            ModelCrawlbot::class => ModelCrawlbotFactory::class,
            Crawlbot::class => CrawlbotFactory::class,
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\IndexController::class => IndexControllerFactory::class,
        ],
    ],

    CrawlbotEntityManager::class => [
        'shared_by_default' => false,
        'factories' => [
            EntityCrawlbot::class => InvokableFactory::class,
            EntityCrawlbotA::class => InvokableFactory::class,
            EntityCrawlbotResponse::class => InvokableFactory::class,
            EntityCrawlbotH1::class => InvokableFactory::class,
            EntityCrawlbotH2::class => InvokableFactory::class,
            EntityCrawlbotH3::class => InvokableFactory::class,
            EntityCrawlbotH4::class => InvokableFactory::class,
            EntityCrawlbotH5::class => InvokableFactory::class,
            EntityCrawlbotH6::class => InvokableFactory::class,
            EntityCrawlbotImg::class => InvokableFactory::class,
            EntityCrawlbotLink::class => InvokableFactory::class,
            EntityCrawlbotScript::class => InvokableFactory::class,
            EntityCrawlbotUriCrawled::class => InvokableFactory::class,
            EntityCrawlbotUriQueued::class => InvokableFactory::class,
        ],
    ],

    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'translator' => [
        'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
];
