<?php

namespace Smtm\Crawlbot\Model\Entity;

class CrawlbotUrls
{
    protected $id;
    protected $crawl_id;
    protected $url;
    protected $empty_response;
    protected $a;
    protected $h1;
    protected $h2;
    protected $h3;
    protected $h4;
    protected $h5;
    protected $h6;
    protected $link;
    protected $script;
    protected $img;
    protected $a_count;
    protected $h1_count;
    protected $h2_count;
    protected $h3_count;
    protected $h4_count;
    protected $h5_count;
    protected $h6_count;
    protected $link_count;
    protected $script_count;
    protected $img_count;
    protected $a_ids;
    protected $h1_ids;
    protected $h2_ids;
    protected $h3_ids;
    protected $h4_ids;
    protected $h5_ids;
    protected $h6_ids;
    protected $link_ids;
    protected $script_ids;
    protected $img_ids;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return CrawlbotUrls
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
     * @return CrawlbotUrls
     */
    public function setCrawlId($crawl_id)
    {
        $this->crawl_id = $crawl_id;
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
     * @return CrawlbotUrls
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmptyResponse()
    {
        return $this->empty_response;
    }

    /**
     * @param mixed $empty_response
     * @return CrawlbotUrls
     */
    public function setEmptyResponse($empty_response)
    {
        $this->empty_response = $empty_response;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param mixed $a
     * @return CrawlbotUrls
     */
    public function setA($a)
    {
        $this->a = $a;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * @param mixed $h1
     * @return CrawlbotUrls
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH2()
    {
        return $this->h2;
    }

    /**
     * @param mixed $h2
     * @return CrawlbotUrls
     */
    public function setH2($h2)
    {
        $this->h2 = $h2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH3()
    {
        return $this->h3;
    }

    /**
     * @param mixed $h3
     * @return CrawlbotUrls
     */
    public function setH3($h3)
    {
        $this->h3 = $h3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH4()
    {
        return $this->h4;
    }

    /**
     * @param mixed $h4
     * @return CrawlbotUrls
     */
    public function setH4($h4)
    {
        $this->h4 = $h4;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH5()
    {
        return $this->h5;
    }

    /**
     * @param mixed $h5
     * @return CrawlbotUrls
     */
    public function setH5($h5)
    {
        $this->h5 = $h5;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH6()
    {
        return $this->h6;
    }

    /**
     * @param mixed $h6
     * @return CrawlbotUrls
     */
    public function setH6($h6)
    {
        $this->h6 = $h6;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     * @return CrawlbotUrls
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * @param mixed $script
     * @return CrawlbotUrls
     */
    public function setScript($script)
    {
        $this->script = $script;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     * @return CrawlbotUrls
     */
    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getACount()
    {
        return $this->a_count;
    }

    /**
     * @param mixed $a_count
     * @return CrawlbotUrls
     */
    public function setACount($a_count)
    {
        $this->a_count = $a_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH1Count()
    {
        return $this->h1_count;
    }

    /**
     * @param mixed $h1_count
     * @return CrawlbotUrls
     */
    public function setH1Count($h1_count)
    {
        $this->h1_count = $h1_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH2Count()
    {
        return $this->h2_count;
    }

    /**
     * @param mixed $h2_count
     * @return CrawlbotUrls
     */
    public function setH2Count($h2_count)
    {
        $this->h2_count = $h2_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH3Count()
    {
        return $this->h3_count;
    }

    /**
     * @param mixed $h3_count
     * @return CrawlbotUrls
     */
    public function setH3Count($h3_count)
    {
        $this->h3_count = $h3_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH4Count()
    {
        return $this->h4_count;
    }

    /**
     * @param mixed $h4_count
     * @return CrawlbotUrls
     */
    public function setH4Count($h4_count)
    {
        $this->h4_count = $h4_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH5Count()
    {
        return $this->h5_count;
    }

    /**
     * @param mixed $h5_count
     * @return CrawlbotUrls
     */
    public function setH5Count($h5_count)
    {
        $this->h5_count = $h5_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH6Count()
    {
        return $this->h6_count;
    }

    /**
     * @param mixed $h6_count
     * @return CrawlbotUrls
     */
    public function setH6Count($h6_count)
    {
        $this->h6_count = $h6_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinkCount()
    {
        return $this->link_count;
    }

    /**
     * @param mixed $link_count
     * @return CrawlbotUrls
     */
    public function setLinkCount($link_count)
    {
        $this->link_count = $link_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScriptCount()
    {
        return $this->script_count;
    }

    /**
     * @param mixed $script_count
     * @return CrawlbotUrls
     */
    public function setScriptCount($script_count)
    {
        $this->script_count = $script_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgCount()
    {
        return $this->img_count;
    }

    /**
     * @param mixed $img_count
     * @return CrawlbotUrls
     */
    public function setImgCount($img_count)
    {
        $this->img_count = $img_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAIds()
    {
        return $this->a_ids;
    }

    /**
     * @param mixed $a_ids
     * @return CrawlbotUrls
     */
    public function setAIds($a_ids)
    {
        $this->a_ids = $a_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH1Ids()
    {
        return $this->h1_ids;
    }

    /**
     * @param mixed $h1_ids
     * @return CrawlbotUrls
     */
    public function setH1Ids($h1_ids)
    {
        $this->h1_ids = $h1_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH2Ids()
    {
        return $this->h2_ids;
    }

    /**
     * @param mixed $h2_ids
     * @return CrawlbotUrls
     */
    public function setH2Ids($h2_ids)
    {
        $this->h2_ids = $h2_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH3Ids()
    {
        return $this->h3_ids;
    }

    /**
     * @param mixed $h3_ids
     * @return CrawlbotUrls
     */
    public function setH3Ids($h3_ids)
    {
        $this->h3_ids = $h3_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH4Ids()
    {
        return $this->h4_ids;
    }

    /**
     * @param mixed $h4_ids
     * @return CrawlbotUrls
     */
    public function setH4Ids($h4_ids)
    {
        $this->h4_ids = $h4_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH5Ids()
    {
        return $this->h5_ids;
    }

    /**
     * @param mixed $h5_ids
     * @return CrawlbotUrls
     */
    public function setH5Ids($h5_ids)
    {
        $this->h5_ids = $h5_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getH6Ids()
    {
        return $this->h6_ids;
    }

    /**
     * @param mixed $h6_ids
     * @return CrawlbotUrls
     */
    public function setH6Ids($h6_ids)
    {
        $this->h6_ids = $h6_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinkIds()
    {
        return $this->link_ids;
    }

    /**
     * @param mixed $link_ids
     * @return CrawlbotUrls
     */
    public function setLinkIds($link_ids)
    {
        $this->link_ids = $link_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getScriptIds()
    {
        return $this->script_ids;
    }

    /**
     * @param mixed $script_ids
     * @return CrawlbotUrls
     */
    public function setScriptIds($script_ids)
    {
        $this->script_ids = $script_ids;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgIds()
    {
        return $this->img_ids;
    }

    /**
     * @param mixed $img_ids
     * @return CrawlbotUrls
     */
    public function setImgIds($img_ids)
    {
        $this->img_ids = $img_ids;
        return $this;
    }
}