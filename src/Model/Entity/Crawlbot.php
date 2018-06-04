<?php

namespace Smtm\Crawlbot\Model\Entity;

class Crawlbot implements \JsonSerializable
{
    protected $id;
    protected $dbTableSuffix;
    protected $defaultUrlScheme;
    protected $useCookies;
    protected $entryPointUri;

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
        ];
    }

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
    public function getUseCookies()
    {
        return $this->useCookies;
    }

    /**
     * @param mixed $useCookies
     * @return Crawlbot
     */
    public function setUseCookies($useCookies)
    {
        $this->useCookies = $useCookies;
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
}