<?php

namespace Smtm\Crawlbot\Model\Entity;

use Smtm\Zfx\Uri\ReparsedUri;

class CrawlbotUri extends ReparsedUri
{
    protected $id;
    protected $crawlId;
    protected $uriHash;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CrawlbotUri
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
     * @return CrawlbotUri
     */
    public function setCrawlId($crawlId)
    {
        $this->crawlId = $crawlId;
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
     * @return CrawlbotUri
     */
    public function setUriHash($uriHash)
    {
        $this->uriHash = $uriHash;
        return $this;
    }

    public function buildUriHash($defaultScheme = null, $defaultHost = null, $defaultPort = null)
    {
        if($this->getScheme() === null) {
            $this->setScheme($defaultScheme);
        }
        if(($this->getHost() === null) || ($this->getHost() === '')) { // TODO: Set host to null if empty
            $this->setHost($defaultHost);
            $this->setPort($defaultPort);
        }

        $this->setUriHash(sha1($this->toString()));
        return $this->getUriHash();
    }
}