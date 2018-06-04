<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotScript
{
    const TAG_NAME = 'script';
    const ATTRIBUTE_NAME_URL = 'src';

    protected $id;
    protected $crawlId;
    protected $uriCrawledId;
    protected $tagHtml;
    protected $attributeUri;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CrawlbotScript
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
     * @return CrawlbotScript
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
     * @return CrawlbotScript
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
     * @return CrawlbotScript
     */
    public function setTagHtml($tagHtml)
    {
        $this->tagHtml = $tagHtml;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttributeUri()
    {
        return $this->attributeUri;
    }

    /**
     * @param mixed $attributeUri
     * @return CrawlbotScript
     */
    public function setAttributeUri($attributeUri)
    {
        $this->attributeUri = $attributeUri;
        return $this;
    }
}