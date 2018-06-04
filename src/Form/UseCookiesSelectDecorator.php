<?php

namespace Smtm\Crawlbot\Form;

use Zend\Form\Element\Select;
use Zend\I18n\Translator\TranslatorAwareTrait;

class UseCookiesSelectDecorator extends Select
{
    use TranslatorAwareTrait;

    const NAME = 'use_cookies';

    const VALUE_OPTION_VALUE_YES = '1';
    const VALUE_OPTION_LABEL_YES = 'Yes';
    const VALUE_OPTION_VALUE_NO = '0';
    const VALUE_OPTION_LABEL_NO = 'No';
    const VALUE_OPTIONS = [
        self::VALUE_OPTION_VALUE_YES => self::VALUE_OPTION_LABEL_YES,
        self::VALUE_OPTION_VALUE_NO => self::VALUE_OPTION_LABEL_NO,
    ];

    protected $translator;

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);
    }

    public function init()
    {
        $this->setValueOptions(self::VALUE_OPTIONS);
        $this->setUnselectedValue(self::VALUE_OPTION_VALUE_YES);
        $this->setLabel($this->getTranslator()->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_USE_COOKIES'));
    }
}