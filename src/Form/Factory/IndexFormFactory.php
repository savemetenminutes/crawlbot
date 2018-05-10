<?php

namespace Smtm\Crawlbot\Form\Factory;

use Interop\Container\ContainerInterface;
use Smtm\Crawlbot\Form\CrawlSubmitButtonDecorator;
use Smtm\Crawlbot\Form\DefaultUrlSchemeSelectDecorator;
use Smtm\Crawlbot\Form\EntryPointUriTextInputDecorator;
use Smtm\Crawlbot\Form\IndexFormDecorator;
use Smtm\Crawlbot\Form\CrawlFieldsetDecorator;
use Smtm\Crawlbot\InputFilter\IndexFormInputFilterDecorator;
use Zend\I18n\Translator\Translator;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexFormFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $router = $container->get('router');
        $formAction = $router->assemble([], ['name' => 'smtm-crawlbot/crawl-form-submission/crawl']);

        $formElementManager = $container->get('FormElementManager');
        $crawlFieldset = $formElementManager->get(CrawlFieldsetDecorator::class);
        $crawlSubmitButton = $formElementManager->get(CrawlSubmitButtonDecorator::class);

        $indexForm = new IndexFormDecorator(IndexFormDecorator::FORM_NAME, [], $formAction, $crawlFieldset, $crawlSubmitButton);

        return $indexForm;
    }
}