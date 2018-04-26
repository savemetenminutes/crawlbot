<?php
namespace Smtm\Crawlbot\Form;

use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use Zend\I18n\Translator\Translator;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

class IndexForm extends Form {
    protected $translator;

    public function __construct($name = null, $options = [], Translator $translator) {
        parent::__construct($name, $options);

        $this->translator = $translator;

        $name = new Element('name');
        $name->setLabel($this->translator->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_ENTRY_POINT_URL'));
        $name->setAttributes([
            'type' => 'text',
        ]);

        // Create the fieldset for sender details:
        $sender = new Fieldset('sender');
        $sender->add($name);

        // Create a CAPTCHA:
        $captcha = new Element\Captcha('captcha');
        $captcha->setCaptcha(new Captcha\Dumb());
        $captcha->setLabel($this->translator->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_CAPTCHA'));

        // Create a CSRF token:
        $csrf = new Element\Csrf('security');

        // Create a submit button:
        $send = new Element('send');
        $send->setValue($this->translator->translate('SMTM_CRAWLBOT_INDEX_FORM_LABEL_SUBMIT'));
        $send->setAttributes([
            'type' => 'submit',
        ]);

        $this->add($sender);
        $this->add($captcha);
        $this->add($csrf);
        $this->add($send);

        // Create an input for the "name" element:
        $nameInput = new Input('name');

        /* ... configure the input, and create and configure all others ... */

        // Create the input filter:
        $inputFilter = new InputFilter();

        // Attach inputs:
        $inputFilter->add($nameInput);
        /* ... */

        // Attach the input filter to the form:
        $this->setInputFilter($inputFilter);
    }
}