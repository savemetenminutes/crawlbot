<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotH2
{
    const TAG_NAME = 'h2';
    const ATTRIBUTE_NAME_URL = null;

    protected $id;
    protected $crawlId;
    protected $uriCrawledId;
    protected $tagHtml;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CrawlbotH2
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCrawlId()
    {
        return $this->crawlId;
    }

    /**
     * @param mixed $crawlId
     * @return CrawlbotH2
     */
    public function setCrawlId($crawlId)
    {
        $this->crawlId = $crawlId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUriCrawledId()
    {
        return $this->uriCrawledId;
    }

    /**
     * @param mixed $uriCrawledId
     * @return CrawlbotH2
     */
    public function setUriCrawledId($uriCrawledId)
    {
        $this->uriCrawledId = $uriCrawledId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTagHtml()
    {
        return $this->tagHtml;
    }

    /**
     * @param mixed $tagHtml
     * @return CrawlbotH2
     */
    public function setTagHtml($tagHtml)
    {
        $this->tagHtml = $tagHtml;
        return $this;
    }
}