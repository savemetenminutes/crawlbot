<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotH3
{
    const TAG_NAME = 'h3';
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
     * @return CrawlbotH3
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
     * @return CrawlbotH3
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
     * @return CrawlbotH3
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
     * @return CrawlbotH3
     */
    public function setTagHtml($tagHtml)
    {
        $this->tagHtml = $tagHtml;
        return $this;
    }
}