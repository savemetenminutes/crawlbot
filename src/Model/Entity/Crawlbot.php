<?php

namespace Smtm\Crawlbot\Model\Entity;

class Crawlbot
{
    protected $id;
    protected $dbTableSuffix;
    protected $defaultUrlScheme;
    protected $entryPointUri;
    protected $urls;
    protected $currentUrl;
    protected $currentIndex;
    protected $urlCount;
    protected $entryPointPageUrlCount;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Crawlbot
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDbTableSuffix()
    {
        return $this->dbTableSuffix;
    }

    /**
     * @param mixed $dbTableSuffix
     * @return Crawlbot
     */
    public function setDbTableSuffix($dbTableSuffix)
    {
        $this->dbTableSuffix = $dbTableSuffix;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultUrlScheme()
    {
        return $this->defaultUrlScheme;
    }

    /**
     * @param mixed $defaultUrlScheme
     * @return Crawlbot
     */
    public function setDefaultUrlScheme($defaultUrlScheme)
    {
        $this->defaultUrlScheme = $defaultUrlScheme;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntryPointUri()
    {
        return $this->entryPointUri;
    }

    /**
     * @param mixed $entryPointUri
     * @return Crawlbot
     */
    public function setEntryPointUri($entryPointUri)
    {
        $this->entryPointUri = $entryPointUri;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @param mixed $urls
     * @return Crawlbot
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentUrl()
    {
        return $this->currentUrl;
    }

    /**
     * @param mixed $currentUrl
     * @return Crawlbot
     */
    public function setCurrentUrl($currentUrl)
    {
        $this->currentUrl = $currentUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentIndex()
    {
        return $this->currentIndex;
    }

    /**
     * @param mixed $currentIndex
     * @return Crawlbot
     */
    public function setCurrentIndex($currentIndex)
    {
        $this->currentIndex = $currentIndex;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlCount()
    {
        return $this->urlCount;
    }

    /**
     * @param mixed $urlCount
     * @return Crawlbot
     */
    public function setUrlCount($urlCount)
    {
        $this->urlCount = $urlCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntryPointPageUrlCount()
    {
        return $this->entryPointPageUrlCount;
    }

    /**
     * @param mixed $entryPointPageUrlCount
     * @return Crawlbot
     */
    public function setEntryPointPageUrlCount($entryPointPageUrlCount)
    {
        $this->entryPointPageUrlCount = $entryPointPageUrlCount;
        return $this;
    }
}