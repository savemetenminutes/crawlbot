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
use Smtm\Crawlbot\Form\UseCookiesSelectDecorator;
use Smtm\Crawlbot\Model\Entity\Crawlbot as EntityCrawlbot;
use Smtm\Crawlbot\Model\Entity\CrawlbotA as EntityCrawlbotA;
use Smtm\Crawlbot\Model\Entity\CrawlbotResponse as EntityCrawlbotResponse;
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
use Smtm\Crawlbot\Model\Entity\Hydrator\Factory\CrawlbotGenericClassMethodsHydratorFactory;
use Smtm\Crawlbot\Model\Entity\Hydrator\Factory\CrawlbotUriClassMethodsHydratorDecoratorFactory;
use Zend\Hydrator\HydratorProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\FormElementProviderInterface;

class Module implements ConfigProviderInterface, FormElementProviderInterface, HydratorProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getHydratorConfig()
    {
        return [
            'factories' => [
                EntityCrawlbot::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotA::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotH1::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotH2::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotH3::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotH4::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotH5::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotH6::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotImg::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotLink::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotScript::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotResponse::class => CrawlbotGenericClassMethodsHydratorFactory::class,
                EntityCrawlbotUriCrawled::class => CrawlbotUriClassMethodsHydratorDecoratorFactory::class,
                EntityCrawlbotUriQueued::class => CrawlbotUriClassMethodsHydratorDecoratorFactory::class,
            ],
        ];
    }

    public function getFormElementConfig()
    {
        return [
            'factories' => [
                DbTableSuffixTextInputDecorator::class => FormElementFactory::class,
                DefaultUrlSchemeSelectDecorator::class => FormElementFactory::class,
                UseCookiesSelectDecorator::class => FormElementFactory::class,
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
                UseCookiesSelectDecorator::class => [
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
