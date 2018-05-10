<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotH4
{
    protected $id;
    protected $crawl_id;
    protected $tag_html;
    protected $url;
    protected $url_table_id;

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
        return $this->crawl_id;
    }

    /**
     * @param mixed $crawl_id
     * @return CrawlbotA
     */
    public function setCrawlId($crawl_id)
    {
        $this->crawl_id = $crawl_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTagHtml()
    {
        return $this->tag_html;
    }

    /**
     * @param mixed $tag_html
     * @return CrawlbotA
     */
    public function setTagHtml($tag_html)
    {
        $this->tag_html = $tag_html;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return CrawlbotA
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlTableId()
    {
        return $this->url_table_id;
    }

    /**
     * @param mixed $url_table_id
     * @return CrawlbotA
     */
    public function setUrlTableId($url_table_id)
    {
        $this->url_table_id = $url_table_id;
        return $this;
    }
}