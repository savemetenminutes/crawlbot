<?php

namespace Smtm\Crawlbot\Form;

use Smtm\Crawlbot\Model\Entity\Crawlbot;
use Zend\Form\ElementInterface;
use Zend\Form\InputFilterProviderFieldset;

class CrawlFieldsetDecorator extends InputFilterProviderFieldset
{
    const NAME = 'crawl_settings';

    protected $dbTableSuffixTextInput;
    protected $defaultUrlSchemeSelect;
    protected $useCookiesSelect;
    protected $entryPointUrlTextInput;

    public function __construct($name = null, $options = [], ElementInterface $dbTableSuffixTextInput, ElementInterface $defaultSchemeSelect, ElementInterface $useCookiesSelect, ElementInterface $entryPointUrlTextInput)
    {
        $this->dbTableSuffixTextInput   = $dbTableSuffixTextInput;
        $this->defaultUrlSchemeSelect   = $defaultSchemeSelect;
        $this->useCookiesSelect         = $useCookiesSelect;
        $this->entryPointUrlTextInput   = $entryPointUrlTextInput;
        // Create a CSRF token:
        //$csrf = new Element\Csrf('security');

        parent::__construct($name, $options);
    }

    public function init()
    {
        $this->add($this->dbTableSuffixTextInput);
        $this->add($this->defaultUrlSchemeSelect);
        $this->add($this->useCookiesSelect);
        $this->add($this->entryPointUrlTextInput);
        $this->setObject(new Crawlbot());
        /*
        $this->setInputFilterSpecification([
            DefaultUrlSchemeSelectDecorator::NAME => $this->defaultUrlSchemeSelect->getInputSpecification(),
            EntryPointUriTextInputDecorator::NAME => $this->entryPointUrlTextInput->getInputSpecification(),
        ]);
        */
    }
}