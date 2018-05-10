<?php

namespace Smtm\Crawlbot\Controller;

use Smtm\Crawlbot\Form\DefaultUrlSchemeSelectDecorator;
use Smtm\Crawlbot\Form\IndexForm;
use Smtm\Crawlbot\Form\IndexFormDecorator;
use Smtm\Crawlbot\Service\Crawlbot;
use Zend\I18n\Translator\Translator;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $translator;
    protected $indexForm;
    protected $crawlbot;

    public function __construct(Translator $translator, IndexFormDecorator $indexForm, Crawlbot $crawlbot)
    {
        $this->translator = $translator;
        $this->indexForm = $indexForm;
        $this->crawlbot = $crawlbot;
    }

    public function indexAction()
    {
        $viewModel = new ViewModel([
            'form' => $this->indexForm,
        ]);

        return $viewModel;
    }

    public function crawlStartAction()
    {
        $viewModel = new ViewModel([
            'form' => $this->indexForm,
        ]);
        $viewModel->setTemplate('smtm/crawlbot/index/index');

        $this->indexForm->setData($this->params()->fromQuery());

        if (! $this->indexForm->isValid()) {
            return $viewModel;
        }

        $crawlSettings = $this->indexForm->getData();
        $crawl = $this->crawlbot->crawlStart($crawlSettings);

        return $viewModel;
    }

    public function crawlIterateAction()
    {
        $id = $this->params()->fromRoute('id');

        $this->crawlbot->crawlIterate($id);
    }
}
