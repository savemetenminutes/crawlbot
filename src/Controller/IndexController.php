<?php

namespace Smtm\Crawlbot\Controller;

use Smtm\Crawlbot\Form\IndexForm;
use Smtm\Http\Client;
use Zend\I18n\Translator\Translator;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $translator;
    protected $indexForm;
    protected $client;

    public function __construct(Translator $translator, IndexForm $indexForm, Client $client)
    {
        $this->translator = $translator;
        $this->indexForm = $indexForm;
        $this->client = $client;
    }

    public function indexAction()
    {
        return new ViewModel([
            'form' => $this->indexForm,
        ]);
    }
}
