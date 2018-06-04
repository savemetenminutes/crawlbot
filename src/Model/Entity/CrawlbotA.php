<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotA
{
    const TAG_NAME = 'a';
    const ATTRIBUTE_NAME_URL = 'href';

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
     * @return CrawlbotA
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
     * @return CrawlbotA
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
     * @return CrawlbotA
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
     * @return CrawlbotA
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
     * @return CrawlbotA
     */
    public function setAttributeUri($attributeUri)
    {
        $this->attributeUri = $attributeUri;
        return $this;
    }
}