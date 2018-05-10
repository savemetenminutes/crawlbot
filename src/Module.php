<?php

namespace Smtm\Crawlbot;

use Smtm\Crawlbot\Form\CrawlSubmitButtonDecorator;
use Smtm\Crawlbot\Form\DbTableSuffixTextInputDecorator;
use Smtm\Crawlbot\Form\DefaultUrlSchemeSelectDecorator;
use Smtm\Crawlbot\Form\EntryPointUriTextInputDecorator;
use Smtm\Crawlbot\Form\Factory\FormElementFactory;
use Smtm\Crawlbot\Form\Factory\IndexFormFactory;
use Smtm\Crawlbot\Form\Factory\CrawlFieldsetFactory;
use Smtm\Crawlbot\Form\Factory\TranslatorAwareFormElementDelegatorFactory;
use Smtm\Crawlbot\Form\IndexFormDecorator;
use Smtm\Crawlbot\Form\CrawlFieldsetDecorator;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\FormElementProviderInterface;

class Module implements ConfigProviderInterface, FormElementProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getFormElementConfig()
    {
        return [
            'factories' => [
                DbTableSuffixTextInputDecorator::class => FormElementFactory::class,
                DefaultUrlSchemeSelectDecorator::class => FormElementFactory::class,
                EntryPointUriTextInputDecorator::class => FormElementFactory::class,
                CrawlFieldsetDecorator::class => CrawlFieldsetFactory::class,
                CrawlSubmitButtonDecorator::class => FormElementFactory::class,
                IndexFormDecorator::class => IndexFormFactory::class,
            ],
            'delegators' => [
                DbTableSuffixTextInputDecorator::class => [
                    TranslatorAwareFormElementDelegatorFactory::class,
                ],
                DefaultUrlSchemeSelectDecorator::class => [
                    TranslatorAwareFormElementDelegatorFactory::class,
                ],
                EntryPointUriTextInputDecorator::class => [
                    TranslatorAwareFormElementDelegatorFactory::class,
                ],
                CrawlSubmitButtonDecorator::class => [
                    TranslatorAwareFormElementDelegatorFactory::class,
                ],
            ],
        ];
    }
}
