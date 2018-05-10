<?php

namespace Smtm\Crawlbot;

use Smtm\Crawlbot\Container\Factory\TranslatorAwareFormElementDelegatorFactory;
use Smtm\Crawlbot\Controller\Factory\IndexControllerFactory;
use Smtm\Crawlbot\Form\CrawlSubmitButtonDecorator;
use Smtm\Crawlbot\Form\DbTableSuffixTextInputDecorator;
use Smtm\Crawlbot\Form\DefaultUrlSchemeSelectDecorator;
use Smtm\Crawlbot\Form\EntryPointUriTextInputDecorator;
use Smtm\Crawlbot\Service\Crawlbot;
use Smtm\Crawlbot\Service\Factory\ClientFactory;
use Smtm\Crawlbot\Service\Factory\CrawlbotFactory;
use Smtm\Http\Client;
use Zend\Form\Element;
use Zend\I18n\Translator\TranslatorServiceFactory;
use Zend\I18n\Translator\Translator;

return [
    'router' => include 'route.config.php',

    'service_manager' => [
        'factories' => [
            Translator::class => TranslatorServiceFactory::class,
            Client::class => ClientFactory::class,
            Crawlbot::class => CrawlbotFactory::class,
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\IndexController::class => IndexControllerFactory::class,
        ],
    ],

    'view_manager' => [
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
