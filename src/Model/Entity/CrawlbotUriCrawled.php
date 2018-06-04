<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotUriCrawled extends CrawlbotUri
{
    protected $uriQueuedId;
    protected $uriHash;
    protected $requestMethod;
    protected $requestHeaders;
    protected $requestBody;
    protected $httpStatusCode;
    protected $responseBodySize;

    /**
     * @return mixed
     */
    public function getUriQueuedId()
    {
        return $this->uriQueuedId;
    }

    /**
     * @param mixed $uriQueuedId
     * @return CrawlbotUriCrawled
     */
    public function setUriQueuedId($uriQueuedId)
    {
        $this->uriQueuedId = $uriQueuedId;
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
     * @return CrawlbotUriCrawled
     */
    public function setUriHash($uriHash)
    {
        $this->uriHash = $uriHash;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * @param mixed $requestMethod
     * @return CrawlbotUriCrawled
     */
    public function setRequestMethod($requestMethod)
    {
        $this->requestMethod = $requestMethod;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestHeaders()
    {
        return $this->requestHeaders;
    }

    /**
     * @param mixed $requestHeaders
     * @return CrawlbotUriCrawled
     */
    public function setRequestHeaders($requestHeaders)
    {
        $this->requestHeaders = $requestHeaders;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestBody()
    {
        return $this->requestBody;
    }

    /**
     * @param mixed $requestBody
     * @return CrawlbotUriCrawled
     */
    public function setRequestBody($requestBody)
    {
        $this->requestBody = $requestBody;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * @param mixed $httpStatusCode
     * @return CrawlbotUriCrawled
     */
    public function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponseBodySize()
    {
        return $this->responseBodySize;
    }

    /**
     * @param mixed $responseBodySize
     * @return CrawlbotUriCrawled
     */
    public function setResponseBodySize($responseBodySize)
    {
        $this->responseBodySize = $responseBodySize;
        return $this;
    }
}