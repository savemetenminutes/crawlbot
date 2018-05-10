<?php

namespace Smtm\Crawlbot\Form\Factory;

use Interop\Container\ContainerInterface;
use Zend\Mvc\I18n\Translator;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

class TranslatorAwareFormElementDelegatorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $translator = $container->get(Translator::class);
        $element = call_user_func($callback);
        $element->setTranslator($translator);

        return $element;
    }
}