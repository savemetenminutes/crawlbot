<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotContent
{
    protected $id;
    protected $crawl_id;
    protected $content;
    protected $hash;
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
     * @return CrawlbotContent
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
     * @return CrawlbotContent
     */
    public function setCrawlId($crawl_id)
    {
        $this->crawl_id = $crawl_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return CrawlbotContent
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     * @return CrawlbotContent
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
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
     * @return CrawlbotContent
     */
    public function setUrlTableId($url_table_id)
    {
        $this->url_table_id = $url_table_id;
        return $this;
    }
}