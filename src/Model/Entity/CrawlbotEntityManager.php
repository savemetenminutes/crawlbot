<?php

namespace Smtm\Crawlbot\Model\Entity;

use Zend\ServiceManager\AbstractPluginManager;

class CrawlbotEntityManager extends AbstractPluginManager
{
    public function validate($instance)
    {
        return true;
    }
}