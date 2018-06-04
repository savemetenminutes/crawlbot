<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotImg
{
    const TAG_NAME = 'img';
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
     * @return CrawlbotImg
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
     * @return CrawlbotImg
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
     * @return CrawlbotImg
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
     * @return CrawlbotImg
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
     * @return CrawlbotImg
     */
    public function setAttributeUri($attributeUri)
    {
        $this->attributeUri = $attributeUri;
        return $this;
    }
}