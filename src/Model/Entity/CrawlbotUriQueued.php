<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotUriQueued extends CrawlbotUri
{
    protected $AId;
    protected $uriHash;

    /**
     * @return mixed
     */
    public function getAId()
    {
        return $this->AId;
    }

    /**
     * @param mixed $AId
     * @return CrawlbotUriQueued
     */
    public function setAId($AId)
    {
        $this->AId = $AId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUriHash()
    {
        return $this->uriHash;
    }

    /**
     * @param mixed $uriHash
     * @return CrawlbotUriQueued
     */
    public function setUriHash($uriHash)
    {
        $this->uriHash = $uriHash;
        return $this;
    }
}