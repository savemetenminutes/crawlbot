<?php
namespace Smtm\Crawlbot\Form;

use Smtm\Crawlbot\Model\Entity\Crawlbot;
use Zend\Form\ElementInterface;
use Zend\Form\FieldsetInterface;
use Zend\Form\Form;
use Zend\Hydrator\ClassMethods;

class IndexFormDecorator extends Form {
    const FORM_NAME = 'index_form';

    protected $formAction;
    protected $crawlFieldset;
    protected $crawlSubmitButton;

    public function __construct($name = null, $options = [], string $formAction = '', FieldsetInterface $crawlFieldset = null, ElementInterface $crawlSubmitButton) {
        $this->formAction = $formAction;
        $this->crawlFieldset = $crawlFieldset;
        $this->crawlSubmitButton = $crawlSubmitButton;

        parent::__construct($name, $options);
    }

    public function init()
    {
        $this->setAttribute('method', 'GET');
        $this->setAttribute('action', $this->formAction);

        $this->add(
            $this->crawlFieldset
        );
        $this->add(
            $this->crawlSubmitButton
        );
        //$this->add($csrf);

        $this->setHydrator(new ClassMethods());
        $this->setObject(new Crawlbot());
    }
}