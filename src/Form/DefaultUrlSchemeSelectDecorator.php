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
    const PORT_HTTPS = 443;
    const PORT_HTTP = 80;
    const VALUE_OPTIONS = [
        self::VALUE_OPTION_VALUE_HTTPS => self::VALUE_OPTION_LABEL_HTTPS,
        self::VALUE_OPTION_VALUE_HTTP => self::VALUE_OPTION_LABEL_HTTP,
    ];
    const VALUE_OPTION_VALUE_TO_PORT = [
        self::VALUE_OPTION_VALUE_HTTPS => self::PORT_HTTPS,
        self::VALUE_OPTION_VALUE_HTTP => self::PORT_HTTP,
    ];

    protected $translator;

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);
    }

    public function init()
    {
        $this->setValueOptions(self::VALUE_OPTIONS);
        $this->setUnselectedValue(self::VALUE_OPTION_VALUE_HTTPS);
        $this->setLabel($this->getTranslator()->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_DEFAULT_URL_SCHEME'));
    }

    public static function getScheme(int $valueOptionValue)
    {
        return self::VALUE_OPTIONS[$valueOptionValue];
    }

    public static function getSchemeValue(string $valueOptionLabel)
    {
        return array_flip(self::VALUE_OPTIONS)[$valueOptionLabel];
    }

    public static function getPort(int $valueOptionValue)
    {
        return self::VALUE_OPTION_VALUE_TO_PORT[$valueOptionValue];
    }
}