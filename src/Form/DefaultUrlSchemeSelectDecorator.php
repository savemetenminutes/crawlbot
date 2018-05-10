<?php

namespace Smtm\Crawlbot\Form;

use Zend\Form\Element\Select;
use Zend\I18n\Translator\TranslatorAwareTrait;

class DefaultUrlSchemeSelectDecorator extends Select
{
    use TranslatorAwareTrait;

    const NAME = 'default_url_scheme';

    const VALUE_OPTION_VALUE_HTTPS = '0';
    const VALUE_OPTION_LABEL_HTTPS = 'https';
    const VALUE_OPTION_VALUE_HTTP = '1';
    const VALUE_OPTION_LABEL_HTTP = 'http';

    protected $translator;

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);
    }

    public function init()
    {
        $this->setValueOptions([
            self::VALUE_OPTION_VALUE_HTTPS => self::VALUE_OPTION_LABEL_HTTPS,
            self::VALUE_OPTION_VALUE_HTTP => self::VALUE_OPTION_LABEL_HTTP,
        ]);
        $this->setUnselectedValue(self::VALUE_OPTION_VALUE_HTTPS);
        $this->setLabel($this->getTranslator()->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_DEFAULT_URL_SCHEME'));
    }
}