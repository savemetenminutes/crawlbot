<?php

namespace Smtm\Crawlbot\Form\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Form\DbTableSuffixTextInputDecorator;
use Smtm\Crawlbot\Form\DefaultUrlSchemeSelectDecorator;
use Smtm\Crawlbot\Form\EntryPointUriTextInputDecorator;
use Smtm\Crawlbot\Form\CrawlFieldsetDecorator;
use Smtm\Crawlbot\Form\UseCookiesSelectDecorator;
use Zend\ServiceManager\Factory\FactoryInterface;

class CrawlFieldsetFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $formElementManager = $container->get('FormElementManager');
        $dbTableSuffixTextInput = $formElementManager->get(DbTableSuffixTextInputDecorator::class);
        $defaultSchemeSelect    = $formElementManager->get(DefaultUrlSchemeSelectDecorator::class);
        $useCookiesSelect       = $formElementManager->get(UseCookiesSelectDecorator::class);
        $entryPointUrlTextInput = $formElementManager->get(EntryPointUriTextInputDecorator::class);

        $mainFieldset =
            new CrawlFieldsetDecorator(
                CrawlFieldsetDecorator::NAME,
                [
                    'use_as_base_fieldset' => true,
                ],
                $dbTableSuffixTextInput,
                $defaultSchemeSelect,
                $useCookiesSelect,
                $entryPointUrlTextInput
            );

        return $mainFieldset;
    }
}