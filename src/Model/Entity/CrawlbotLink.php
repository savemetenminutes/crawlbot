<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotLink
{
    const TAG_NAME = 'link';
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
     * @return CrawlbotLink
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
     * @return CrawlbotLink
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
     * @return CrawlbotLink
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
     * @return CrawlbotLink
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
     * @return CrawlbotLink
     */
    public function setAttributeUri($attributeUri)
    {
        $this->attributeUri = $attributeUri;
        return $this;
    }
}