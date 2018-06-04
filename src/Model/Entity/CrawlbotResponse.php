<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotResponse
{
    protected $id;
    protected $crawlId;
    protected $uriCrawledId;
    protected $statusCode;
    protected $headers;
    protected $body;
    protected $bodySize;
    protected $bodyHash;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CrawlbotResponse
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
     * @return CrawlbotResponse
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
     * @return CrawlbotResponse
     */
    public function setUriCrawledId($uriCrawledId)
    {
        $this->uriCrawledId = $uriCrawledId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return CrawlbotResponse
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     * @return CrawlbotResponse
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     * @return CrawlbotResponse
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBodySize()
    {
        return $this->bodySize;
    }

    /**
     * @param mixed $bodySize
     * @return CrawlbotResponse
     */
    public function setBodySize($bodySize)
    {
        $this->bodySize = $bodySize;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBodyHash()
    {
        return $this->bodyHash;
    }

    /**
     * @param mixed $bodyHash
     * @return CrawlbotResponse
     */
    public function setBodyHash($bodyHash)
    {
        $this->bodyHash = $bodyHash;
        return $this;
    }
}