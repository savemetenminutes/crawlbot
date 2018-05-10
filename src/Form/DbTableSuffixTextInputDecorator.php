<?php

namespace Smtm\Crawlbot\Form;

use Zend\Filter\FilterChain;
use Zend\Filter\StringTrim;
use Zend\Form\Element;
use Zend\I18n\Translator\TranslatorAwareInterface;
use Zend\I18n\Translator\TranslatorAwareTrait;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputProviderInterface;

class DbTableSuffixTextInputDecorator extends Element implements TranslatorAwareInterface, InputProviderInterface
{
    use TranslatorAwareTrait;

    const NAME = 'db_table_suffix';

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);
    }

    public function init()
    {
        $this->setLabel($this->getTranslator()->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_DB_TABLE_SUFFIX'));
    }

    public function getInputSpecification()
    {
        return [
            'type' => Input::class,
            'filter' => new FilterChain([
                StringTrim::class
            ]),
        ];
    }
}