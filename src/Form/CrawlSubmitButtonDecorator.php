<?php

namespace Smtm\Crawlbot\Form;

use Zend\Form\Element;
use Zend\I18n\Translator\TranslatorAwareTrait;

class CrawlSubmitButtonDecorator extends Element
{
    use TranslatorAwareTrait;

    const NAME = 'crawl';

    protected $translator;

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);
    }

    public function init()
    {
        $this->setValue($this->getTranslator()->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_CRAWL'));
        $this->setAttributes([
            'type' => 'submit',
        ]);
    }
}