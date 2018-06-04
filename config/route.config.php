<?php

namespace Smtm\Crawlbot;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Method;
use Zend\Router\Http\Segment;

return [
    'routes' => [
        'smtm-crawlbot' => [
            'type' => Segment::class,
            'options' => [
                'route'    => '/smtm-crawlbot[/]',
                'defaults' => [
                    'controller' => Controller\IndexController::class,
                    'action'     => 'index',
                ],
            ],
            'may_terminate' => true,
            'child_routes' => [
                'crawl-form-submission' => [
                    'type' => Method::class,
                    'options' => [
                        'verb' => 'get',
                    ],
                    'may_terminate' => true,
                    'child_routes' => [
                        'crawl' => [
                            'type' => Segment::class,
                            'options' => [
                                'route' => 'crawl[/]',
                                'defaults' => [
                                    'controller' => Controller\IndexController::class,
                                    'action'     => 'crawlStart',
                                ],
                            ],
                        ],
                    ],
                ],
                'crawl-iterate-action' => [
                    'type' => Method::class,
                    'options' => [
                        'verb' => 'post',
                    ],
                    'may_terminate' => true,
                    'child_routes' => [
                        'crawl-iterate' => [
                            'type' => Segment::class,
                            'options' => [
                                'route' => 'crawl/:id',
                                'defaults' => [
                                    'controller' => Controller\IndexController::class,
                                    'action'     => 'crawlIterate',
                                ],
                                'constraints' => [
                                    'id' => '\d+$',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'application' => [
            'type'    => Segment::class,
            'options' => [
                'route'    => '[/][/:action]',
                'defaults' => [
                    'controller' => Controller\IndexController::class,
                    'action'     => 'index',
                ],
            ],
        ],
    ],
];