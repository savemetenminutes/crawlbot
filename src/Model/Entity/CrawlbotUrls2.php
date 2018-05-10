<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotUrls2
{
    protected $id;
    protected $url;
    protected $link_id;
    protected $crawl_flag;
    protected $preprefix;
    protected $scheme;
    protected $scheme_separator;
    protected $relative_scheme;
    protected $fragment;
    protected $authorization;
    protected $host;
    protected $path;
    protected $assumed_path;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CrawlbotUrls2
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return CrawlbotUrls2
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinkId()
    {
        return $this->link_id;
    }

    /**
     * @param mixed $link_id
     * @return CrawlbotUrls2
     */
    public function setLinkId($link_id)
    {
        $this->link_id = $link_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCrawlFlag()
    {
        return $this->crawl_flag;
    }

    /**
     * @param mixed $crawl_flag
     * @return CrawlbotUrls2
     */
    public function setCrawlFlag($crawl_flag)
    {
        $this->crawl_flag = $crawl_flag;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPreprefix()
    {
        return $this->preprefix;
    }

    /**
     * @param mixed $preprefix
     * @return CrawlbotUrls2
     */
    public function setPreprefix($preprefix)
    {
        $this->preprefix = $preprefix;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @param mixed $scheme
     * @return CrawlbotUrls2
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSchemeSeparator()
    {
        return $this->scheme_separator;
    }

    /**
     * @param mixed $scheme_separator
     * @return CrawlbotUrls2
     */
    public function setSchemeSeparator($scheme_separator)
    {
        $this->scheme_separator = $scheme_separator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRelativeScheme()
    {
        return $this->relative_scheme;
    }

    /**
     * @param mixed $relative_scheme
     * @return CrawlbotUrls2
     */
    public function setRelativeScheme($relative_scheme)
    {
        $this->relative_scheme = $relative_scheme;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * @param mixed $fragment
     * @return CrawlbotUrls2
     */
    public function setFragment($fragment)
    {
        $this->fragment = $fragment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorization()
    {
        return $this->authorization;
    }

    /**
     * @param mixed $authorization
     * @return CrawlbotUrls2
     */
    public function setAuthorization($authorization)
    {
        $this->authorization = $authorization;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     * @return CrawlbotUrls2
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     * @return CrawlbotUrls2
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAssumedPath()
    {
        return $this->assumed_path;
    }

    /**
     * @param mixed $assumed_path
     * @return CrawlbotUrls2
     */
    public function setAssumedPath($assumed_path)
    {
        $this->assumed_path = $assumed_path;
        return $this;
    }
}