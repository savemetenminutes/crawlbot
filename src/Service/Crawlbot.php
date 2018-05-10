<?php

namespace Smtm\Crawlbot\Service;

use DateTime;
use Smtm\Crawlbot\Model\CrawlbotTable;
use Smtm\Crawlbot\Model\Entity\Crawlbot as EntityCrawlbot;
use Smtm\Http\Client;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Uri\Uri;

class Crawlbot
{
    protected $client;
    protected $table;
    protected $adapters;

    public function __construct(Client $client, CrawlbotTable $table, array $adapters = [])
    {
        $this->client = $client;
        $this->table = $table;
        $this->adapters = $adapters;
    }

    public function init(EntityCrawlbot $crawlbot)
    {
        //$tableSuffix = new DateTime();
        $this->table->init($crawlbot);
    }

    public function crawlStart(EntityCrawlbot $crawlbot)
    {
        $this->init($crawlbot);

        $crawl = $this->processContent($crawlbot);

        $crawlId = $this->insertCrawler($entryPointUri/*, $urls*/, $sqlTableSuffix, $hostname, $defaultUrlScheme);

        $urlTableId = $this->insertUrl($crawlId, $crawl, $sqlTableSuffix);

        $this->insertContent($crawlId, $urlTableId, $crawl, $sqlTableSuffix);

        if (empty($emptyResponse)) {
            $a = $this->insertA($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $urls = $this->processCrawlUrls($a, $url, array(0 => $burl), $sqlTableSuffix, $hostname,
                $defaultUrlScheme);
            //array_unshift($urls, $burl);
            //$urls = array(0=>$burl)+$urls;
            $this->insertH1($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $this->insertH2($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $this->insertH3($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $this->insertH4($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $this->insertH5($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $this->insertH6($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $this->insertLink($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $this->insertScript($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
            $this->insertImg($crawlId, $urlTableId, $crawl, $sqlTableSuffix);
        }

        $i = 0;
        $this->updateCrawler($crawlId, $i, $url, $urls, 1);
    }

    public function crawlIterate(int $id)
    {
        //$crawl =
        $query = 'SELECT * FROM `tpt_crawler` WHERE `id`=' . $id;
        $tpt_vars['db']['handler']->query($query);
        $crawler = $tpt_vars['db']['handler']->fetch_assoc();

        if (!empty($crawler)) {
            $sqlTableSuffix =

            $links_ids = explode("\n", trim($crawler['links_ids']));
            $urls = explode("\n", trim($crawler['urls']));
            $curl = $crawler['current_url'];
            $i = $crawler['current_index'];
            $i++;
            $search_text = $crawler['search_text'];
            $default_scheme = $crawler['default_scheme'];
            $hostname = $crawler['host'];

            if(!isset($urls[$i])) {
                die('Done!');
            }
            $link_id = $links_ids[$i];
            $url = $urls[$i];

            $crawl = tpt_crawler::crawl($tpt_vars, $url, $link_id, $default_scheme);

            /*
            $_urls_export = var_export($urls, true);

                <br />
                <pre class="font-size-10">
                $_urls_export
                </pre>
            */
            if (!empty($input['storestats'])) {
                $url_table_id = tpt_crawler::insert_url($tpt_vars, $id, $crawl, $sqltable_suffix);

                tpt_crawler::insert_content($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);

                if (empty($empty_response)) {
                    $a = tpt_crawler::insert_a($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    $urls = tpt_crawler::process_crawl_urls($tpt_vars, $a, $url, array_combine($links_ids, $urls), $sqltable_suffix, $hostname, $default_scheme);
                    tpt_crawler::insert_h1($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    tpt_crawler::insert_h2($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    tpt_crawler::insert_h3($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    tpt_crawler::insert_h4($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    tpt_crawler::insert_h5($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    tpt_crawler::insert_h6($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    tpt_crawler::insert_link($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    tpt_crawler::insert_script($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                    tpt_crawler::insert_img($tpt_vars, $id, $url_table_id, $crawl, $sqltable_suffix);
                }
            }

            tpt_crawler::update_crawler($tpt_vars, $id, $i, $url, $urls);







            $tpt_vars['environment']['ajax_result']['append_html']['results'] = 1;
            $tpt_vars['environment']['ajax_result']['update_elements']['results'] = <<< EOT
<div class="padding-10">
	<div style="border: 1px solid #000;">
		<div class="font-weight-bold font-size-20 text-align-left">
			$url
		</div>
EOT;
            foreach ($crawl['mtch'] as $m) {
                $match = htmlspecialchars($m[0]);
                $tpt_vars['environment']['ajax_result']['update_elements']['results'] .= <<< EOT
	<div>
	$match
	</div>
EOT;
            }
            $tpt_vars['environment']['ajax_result']['update_elements']['results'] .= <<< EOT
	</div>
</div>
EOT;

            if ($i < count($urls) - 1) {
                $tpt_vars['environment']['ajax_result']['exec_script'][] = <<< EOT
var crawler_id = $id;
var storestats = $storestats;
var table_suffix = "$esctable_suffix";
setTimeout(function() {
goGetSome('crawler.crawl', window);
}, 500);
EOT;
            }
        } else {
            die('Cannot find crawler record with id: '.$id);
        }
    }

    protected function insertCrawler($url, $sqlTableSuffix, $hostname, $defaultScheme='https', $options= array('search_text'=>'')) {
        $query = '
INSERT INTO
	`tpt_crawler`
(
	`default_scheme`,
	`host`,
	`url`,
	`search_text`,
	`table_suffix`,
	`current_url`,
	`current_index`
)
VALUES(
	"' . mysql_real_escape_string($defaultScheme) . '",
	"' . mysql_real_escape_string($hostname) . '",
	"' . mysql_real_escape_string($url) . '",
	"' . mysql_real_escape_string($options['search_text']) . '",
	"' . $sqlTableSuffix . '",
	"' . mysql_real_escape_string($url) . '",
	0
)
';
        $db->query($query);
        $id = $db->last_id();

        return $id;
    }

    protected function updateCrawler($crawlId, $index, $url, $urls, $homepage=0) {
        $url_count = count($urls);
        $links_ids = implode("\n", array_keys($urls));
        $urls = implode("\n", $urls);

        $query = '
UPDATE
	`tpt_crawler`
SET
	`links_ids`="' . mysql_real_escape_string($links_ids) . '",
	`urls`="' . mysql_real_escape_string($urls) . '",
	`current_url`="' . mysql_real_escape_string($url) . '",
	`current_index`=' . $index . ',
	`url_count`=' . $url_count . '
WHERE
	`id`=' . $crawlId
        ;
        if(!empty($homepage)) {
            $query = '
UPDATE
	`tpt_crawler`
SET
	`links_ids`="' . mysql_real_escape_string($links_ids) . '",
	`urls`="' . mysql_real_escape_string($urls) . '",
	`current_url`="' . mysql_real_escape_string($url) . '",
	`current_index`=' . $index . ',
	`url_count`=' . $url_count . ',
	`homepage_url_count`=' . $url_count . '
WHERE
	`id`=' . $crawlId
            ;
        }
        $db->query($query);
    }

    protected function processCrawlUrls($a, $url, $urls, $sqlTableSuffix, $hostname, $defaultScheme = 'https') {
        foreach($a as $id=>$m) {
            $pa = $ba = tpt_parse_url2($m[1]);

            $crawlFlag = 0;
            if(empty($pa['host'])) {
                $ba['host'] = $hostname;
            }
            if(($ba['host'] == $hostname) && (($pa['scheme'] == 'http') || ($pa['scheme'] == 'https'))) {
                $ba['scheme'] = $defaultScheme;
                $ba['path'] = $ba['assumed_path'];
                $ext = '';
                if(!empty($ba['path'])) {
                    $expath = explode('/', $ba['path']);
                    $expath = array_pop($expath);
                    $expath = explode('.', $expath);
                    $ext = ((count($expath)>1)?array_pop($expath):'');
                }
                $ba = tpt_build_url($ba);
                if(!in_array($ba, $urls) && (empty($ext) || !in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'bmp')))) {
                    $urls[$id] = $ba;
                    $crawlFlag = 1;
                }
            }

            $this->insertUrl2($url, $id, $pa, $crawlFlag, $sqlTableSuffix);
        }

        return $urls;
    }

    protected function processContent(EntityCrawlbot $entityCrawlbot)
    {
        $url = new Uri($entityCrawlbot->getEntryPointUri());

        $response = $this->client->communicate('GET', $url->toString());

        $emptyResponse = $response->getBody()->getSize();

        Dom

        preg_match_all('#<link[^>]+href="(.*?)"[^>]*/?>#i', $response, $link, PREG_SET_ORDER);
        preg_match_all('#<a[^>]+href="(.*?)"[^>]*>#i', $response, $a, PREG_SET_ORDER);
        preg_match_all('#<h1[^>]+>(.*?)</h1>#i', $response, $h1, PREG_SET_ORDER);
        preg_match_all('#<h2[^>]+>(.*?)</h2>#i', $response, $h2, PREG_SET_ORDER);
        preg_match_all('#<h3[^>]+>(.*?)</h3>#i', $response, $h3, PREG_SET_ORDER);
        preg_match_all('#<h4[^>]+>(.*?)</h4>#i', $response, $h4, PREG_SET_ORDER);
        preg_match_all('#<h5[^>]+>(.*?)</h5>#i', $response, $h5, PREG_SET_ORDER);
        preg_match_all('#<h6[^>]+>(.*?)</h6>#i', $response, $h6, PREG_SET_ORDER);
        preg_match_all('#<script[^>]+src="(.*?)"[^>]*>#i', $response, $script, PREG_SET_ORDER);
        preg_match_all('#<img[^>]+src="(.*?)"[^>]*/?>#i', $response, $img, PREG_SET_ORDER);

        return array(
            'link_id' => $linkId,
            'url' => $url,
            'mtch'=>$mtch,
            'link' => $link,
            'a' => $a,
            'h1' => $h1,
            'h2' => $h2,
            'h3' => $h3,
            'h4' => $h4,
            'h5' => $h5,
            'h6' => $h6,
            'script' => $script,
            'img' => $img,
            'response' => $response,
            'info' => $result['rawinfo'],
            'empty_response' => $emptyResponse
        );
    }

    protected function insertUrl2($url, $linkId, $pa, $crawlFlag, $sqlTableSuffix) {
        $query = '
INSERT INTO
	`tpt_crawler_urls2'.$sqlTableSuffix.'`
	(
		`url`,
		`link_id`,
		`crawl_flag`,
		`preprefix`,
		`scheme`,
		`scheme_separator`,
		`relative_scheme`,
		`fragment`,
		`authorization`,
		`host`,
		`path`,
		`assumed_path`
	)
	VALUES(
		"' . mysql_real_escape_string($url) . '",
		"' . intval($linkId, 10) . '",
		"' . intval($crawlFlag, 10) . '",
		"' . mysql_real_escape_string($pa['preprefix']) . '",
		"' . mysql_real_escape_string($pa['scheme']) . '",
		"' . mysql_real_escape_string($pa['scheme_separator']) . '",
		' . intval($pa['relative_scheme'], 10) . ',
		"' . mysql_real_escape_string($pa['fragment']) . '",
		"' . mysql_real_escape_string($pa['authorization']) . '",
		"' . mysql_real_escape_string($pa['host']) . '",
		"' . mysql_real_escape_string($pa['path']) . '",
		"' . mysql_real_escape_string($pa['assumed_path']) . '"
	)
';
        $db->query($query);
    }

    protected function insertUrl($crawlId, $crawl, $sqlTableSuffix) {
        $query = '
INSERT INTO
	`tpt_crawler_urls'.$sqlTableSuffix.'`
	(
		`search_id`,
		`link_id`,
		`url`,
		`status`,
		`empty_response`
	)
	VALUES(
		' . $crawlId . ',
		' . intval($crawl['link_id'], 10) . ',
		"' . mysql_real_escape_string($crawl['url']) . '",
		' . (!empty($crawl['info']['http_code'])?intval($crawl['info']['http_code'], 10):0) . ',
		' . $crawl['empty_response'] . '
	)
';
        $db->query($query);
        return $db->last_id();
    }

    protected function insertImg($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // IMG
        $m_ent = array();
        $m_ids = array();
        if(!empty($crawl['img'])) {
            foreach ($crawl['img'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_img' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`img`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`img_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`img_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertScript($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // SCRIPT
        $m_ent = array();
        $m_ids = array();
        if(!empty($crawl['script'])) {
            foreach ($crawl['script'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_script' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`script`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`script_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`script_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertLink($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // LINK
        $m_ent = array();
        $m_ids = array();
        if(!empty($crawl['link'])) {
            foreach ($crawl['link'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_link' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`link`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`link_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`link_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertH6($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // H6
        $m_ent = array();
        $m_ids = array();
        if(!empty($crawl['h6'])) {
            foreach ($crawl['h6'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_h6' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`h6`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`h6_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`h6_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertH5($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // H5
        $m_ent = array();
        $m_ids = array();
        if(!empty($crawl['h5'])) {
            foreach ($crawl['h5'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_h5' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`h5`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`h5_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`h5_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertH4($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // H4
        $m_ent = array();
        $m_ids = array();
        if(!empty($crawl['h4'])) {
            foreach ($crawl['h4'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_h4' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`h4`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`h4_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`h4_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertH3($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // H3
        $m_ent = array();
        $m_ids = array();
        if($crawl['h3']) {
            foreach ($crawl['h3'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_h3' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`h3`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`h3_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`h3_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertH2($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // H2
        $m_ent = array();
        $m_ids = array();
        if(!empty($crawl['h2'])) {
            foreach ($crawl['h2'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_h2' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`h2`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`h2_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`h2_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertH1($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // H1
        $m_ent = array();
        $m_ids = array();
        if(!empty($crawl['h1'])) {
            foreach ($crawl['h1'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_h1' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`h1`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`h1_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`h1_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }
    }

    protected function insertA($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        // A
        $m_ent = array();
        $m_ids = array();
        $m_a = array();
        if(!empty($crawl['a'])) {
            foreach ($crawl['a'] as $m) {
                $query = '
INSERT INTO
	`tpt_crawler_a' . $sqlTableSuffix . '`
	(
		`search_id`,
		`tag_html`,
		`url`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($m[0]) . '",
		"' . mysql_real_escape_string($m[1]) . '",
		' . $urlTableId . '
	)
';
                $db->query($query);
                $m_id = $db->last_id();
                $m_ent[] = $m[1];
                $m_ids[] = $m_id;
                $m_a[$m_id] = $m;
            }
            $query = '
UPDATE
	`tpt_crawler_urls' . $sqlTableSuffix . '`
SET
	`a`="' . mysql_real_escape_string(implode("\n", $m_ent)) . '",
	`a_ids`="' . mysql_real_escape_string(implode("\n", $m_ids)) . '",
	`a_count`=' . count($m_ent) . '
WHERE
	`id`=' . $urlTableId . '
';
            $db->query($query);
        }

        return $m_a;
    }

    protected function insertContent($crawlId, $urlTableId, $crawl, $sqlTableSuffix) {
        $query = '
INSERT INTO
	`tpt_crawler_content'.$sqlTableSuffix.'`
	(
		`search_id`,
		`html`,
		`hash`,
		`url_table_id`
	)
	VALUES(
		' . $crawlId . ',
		"' . mysql_real_escape_string($crawl['response']) . '",
		"' . mysql_real_escape_string(sha1($crawl['response'])) . '",
		' . $urlTableId . '
	)
';
        $db->query($query);
    }
}