<?php

namespace Smtm\Crawlbot\Form;

use Zend\Form\Element\Url;
use Zend\I18n\Translator\TranslatorAwareTrait;
use Zend\I18n\Translator\TranslatorInterface;

class EntryPointUriTextInputDecorator extends Url
{
    use TranslatorAwareTrait;

    const NAME = 'entry_point_uri';

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);
    }

    public function init()
    {
        $this->getValidator()->setAllowRelative(true);
        $this->setLabel($this->getTranslator()->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_ENTRY_POINT_URI'));
    }
}