<?php

namespace Smtm\Crawlbot\Controller;

use Smtm\Crawlbot\Form\IndexFormDecorator;
use Smtm\Crawlbot\Model\Entity\Crawlbot as EntityCrawlbot;
use Smtm\Crawlbot\Service\Crawlbot;
use Zend\I18n\Translator\Translator;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
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

    public function crawlStartAction(): ViewModel
    {
        $viewModel = new ViewModel([
            'form' => $this->indexForm,
        ]);
        $viewModel->setTemplate('smtm/crawlbot/index/index');

        $this->indexForm->setData($this->params()->fromQuery());

        // TODO: Add proper URL validation which rejects schemeless urls
        if (! $this->indexForm->isValid()) {
            return $viewModel;
        }

        $crawlSettings = $this->indexForm->getData();

        // TODO: Use a custom InputFilter for the dbTableSuffix
        $dbTableSuffix = ($crawlSettings->getDbTableSuffix() === null || $crawlSettings->getDbTableSuffix() === '') ? date('_-_Y-m-d_H-i-s') : $crawlSettings->getDbTableSuffix();
        $crawlSettings->setDbTableSuffix($dbTableSuffix);

        $data = $this->crawlbot->crawlStart($crawlSettings);

        $viewModel->setVariables([
            'url' => [
                'crawl_iterate' =>
                    $this->url()->fromRoute(
                        'smtm-crawlbot/crawl-iterate-action/crawl-iterate',
                        [
                            'id' => $data[EntityCrawlbot::class]->getId(),
                        ]
                    ),
            ],
            'crawlbot' => $data[EntityCrawlbot::class],
        ]);

        return $viewModel;
    }

    public function crawlIterateAction(): JsonModel
    {
        $id = $this->params()->fromRoute('id');

        $viewModel = new JsonModel();

        $data = $this->crawlbot->crawlIterate($id);

        $viewModel->setVariables([
            'url' => [
                'crawl_iterate' =>
                    $this->url()->fromRoute(
                        'smtm-crawlbot/crawl-iterate-action/crawl-iterate',
                        [
                            'id' => $data[EntityCrawlbot::class]->getId(),
                        ]
                    ),
            ],
            'crawlbot' => $data[EntityCrawlbot::class],
        ]);

        return $viewModel;
    }
}
