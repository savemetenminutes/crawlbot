<?php

namespace Smtm\Crawlbot\Model;

use Smtm\Crawlbot\Model\Entity\Crawlbot;
use Smtm\Crawlbot\Model\Entity\CrawlbotA;
use Smtm\Crawlbot\Model\Entity\CrawlbotContent;
use Smtm\Crawlbot\Model\Entity\CrawlbotH1;
use Smtm\Crawlbot\Model\Entity\CrawlbotH2;
use Smtm\Crawlbot\Model\Entity\CrawlbotH3;
use Smtm\Crawlbot\Model\Entity\CrawlbotH4;
use Smtm\Crawlbot\Model\Entity\CrawlbotH5;
use Smtm\Crawlbot\Model\Entity\CrawlbotH6;
use Smtm\Crawlbot\Model\Entity\CrawlbotImg;
use Smtm\Crawlbot\Model\Entity\CrawlbotLink;
use Smtm\Crawlbot\Model\Entity\CrawlbotScript;
use Smtm\Crawlbot\Model\Entity\CrawlbotUrls;
use Smtm\Crawlbot\Model\Entity\CrawlbotUrls2;
use Smtm\Zfx\Db\TableGateway\RelationalTableGatewayInterface;

use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\NamingStrategy\UnderscoreNamingStrategy;

interface CrawlbotTableInterface extends RelationalTableGatewayInterface
{
    const ADAPTER_CRAWLBOT = 0;
    const SCHEMA_CRAWLBOT = null;
    const TABLE_CRAWLBOT = 'crawlbot';
    const ENTITY_CRAWLBOT = Crawlbot::class;
    const HYDRATOR_CRAWLBOT = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_A = 0;
    const SCHEMA_CRAWLBOT_A = null;
    const TABLE_CRAWLBOT_A = 'crawlbot_a';
    const ENTITY_CRAWLBOT_A = CrawlbotA::class;
    const HYDRATOR_CRAWLBOT_A = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_A = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_CONTENT = 0;
    const SCHEMA_CRAWLBOT_CONTENT = null;
    const TABLE_CRAWLBOT_CONTENT = 'crawlbot_content';
    const ENTITY_CRAWLBOT_CONTENT = CrawlbotContent::class;
    const HYDRATOR_CRAWLBOT_CONTENT = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_CONTENT = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_H1 = 0;
    const SCHEMA_CRAWLBOT_H1 = null;
    const TABLE_CRAWLBOT_H1 = 'crawlbot_h1';
    const ENTITY_CRAWLBOT_H1 = CrawlbotH1::class;
    const HYDRATOR_CRAWLBOT_H1 = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_H1 = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_H2 = 0;
    const SCHEMA_CRAWLBOT_H2 = null;
    const TABLE_CRAWLBOT_H2 = 'crawlbot_h2';
    const ENTITY_CRAWLBOT_H2 = CrawlbotH2::class;
    const HYDRATOR_CRAWLBOT_H2 = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_H2 = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_H3 = 0;
    const SCHEMA_CRAWLBOT_H3 = null;
    const TABLE_CRAWLBOT_H3 = 'crawlbot_h3';
    const ENTITY_CRAWLBOT_H3 = CrawlbotH3::class;
    const HYDRATOR_CRAWLBOT_H3 = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_H3 = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_H4 = 0;
    const SCHEMA_CRAWLBOT_H4 = null;
    const TABLE_CRAWLBOT_H4 = 'crawlbot_h4';
    const ENTITY_CRAWLBOT_H4 = CrawlbotH4::class;
    const HYDRATOR_CRAWLBOT_H4 = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_H4 = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_H5 = 0;
    const SCHEMA_CRAWLBOT_H5 = null;
    const TABLE_CRAWLBOT_H5 = 'crawlbot_h5';
    const ENTITY_CRAWLBOT_H5 = CrawlbotH5::class;
    const HYDRATOR_CRAWLBOT_H5 = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_H5 = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_H6 = 0;
    const SCHEMA_CRAWLBOT_H6 = null;
    const TABLE_CRAWLBOT_H6 = 'crawlbot_h6';
    const ENTITY_CRAWLBOT_H6 = CrawlbotH6::class;
    const HYDRATOR_CRAWLBOT_H6 = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_H6 = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_IMG = 0;
    const SCHEMA_CRAWLBOT_IMG = null;
    const TABLE_CRAWLBOT_IMG = 'crawlbot_img';
    const ENTITY_CRAWLBOT_IMG = CrawlbotImg::class;
    const HYDRATOR_CRAWLBOT_IMG = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_IMG = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_LINK = 0;
    const SCHEMA_CRAWLBOT_LINK = null;
    const TABLE_CRAWLBOT_LINK = 'crawlbot_link';
    const ENTITY_CRAWLBOT_LINK = CrawlbotLink::class;
    const HYDRATOR_CRAWLBOT_LINK = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_LINK = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_SCRIPT = 0;
    const SCHEMA_CRAWLBOT_SCRIPT = null;
    const TABLE_CRAWLBOT_SCRIPT = 'crawlbot_script';
    const ENTITY_CRAWLBOT_SCRIPT = CrawlbotScript::class;
    const HYDRATOR_CRAWLBOT_SCRIPT = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_SCRIPT = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_URLS = 0;
    const SCHEMA_CRAWLBOT_URLS = null;
    const TABLE_CRAWLBOT_URLS = 'crawlbot_urls';
    const ENTITY_CRAWLBOT_URLS = CrawlbotUrls::class;
    const HYDRATOR_CRAWLBOT_URLS = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_URLS = UnderscoreNamingStrategy::class;

    const ADAPTER_CRAWLBOT_URLS2 = 0;
    const SCHEMA_CRAWLBOT_URLS2 = null;
    const TABLE_CRAWLBOT_URLS2 = 'crawlbot_urls2';
    const ENTITY_CRAWLBOT_URLS2 = CrawlbotUrls2::class;
    const HYDRATOR_CRAWLBOT_URLS2 = ClassMethods::class;
    const NAMING_STRATEGY_CRAWLBOT_URLS2 = UnderscoreNamingStrategy::class;

    const ENTITY_DEFINITIONS = [
        self::ENTITY_CRAWLBOT => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT,
            self::SCHEMA => self::SCHEMA_CRAWLBOT,
            self::TABLE => self::TABLE_CRAWLBOT,
            self::ENTITY => self::ENTITY_CRAWLBOT,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT,
        ],
        self::ENTITY_CRAWLBOT_A => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_A,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_A,
            self::TABLE => self::TABLE_CRAWLBOT_A,
            self::ENTITY => self::ENTITY_CRAWLBOT_A,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_A,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_A,
        ],
        self::ENTITY_CRAWLBOT_CONTENT => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_CONTENT,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_CONTENT,
            self::TABLE => self::TABLE_CRAWLBOT_CONTENT,
            self::ENTITY => self::ENTITY_CRAWLBOT_CONTENT,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_CONTENT,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_CONTENT,
        ],
        self::ENTITY_CRAWLBOT_H1 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H1,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H1,
            self::TABLE => self::TABLE_CRAWLBOT_H1,
            self::ENTITY => self::ENTITY_CRAWLBOT_H1,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_H1,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_H1,
        ],
        self::ENTITY_CRAWLBOT_H2 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H2,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H2,
            self::TABLE => self::TABLE_CRAWLBOT_H2,
            self::ENTITY => self::ENTITY_CRAWLBOT_H2,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_H2,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_H2,
        ],
        self::ENTITY_CRAWLBOT_H3 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H3,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H3,
            self::TABLE => self::TABLE_CRAWLBOT_H3,
            self::ENTITY => self::ENTITY_CRAWLBOT_H3,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_H3,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_H3,
        ],
        self::ENTITY_CRAWLBOT_H4 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H4,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H4,
            self::TABLE => self::TABLE_CRAWLBOT_H4,
            self::ENTITY => self::ENTITY_CRAWLBOT_H4,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_H4,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_H4,
        ],
        self::ENTITY_CRAWLBOT_H5 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H5,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H5,
            self::TABLE => self::TABLE_CRAWLBOT_H5,
            self::ENTITY => self::ENTITY_CRAWLBOT_H5,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_H5,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_H5,
        ],
        self::ENTITY_CRAWLBOT_H6 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H6,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H6,
            self::TABLE => self::TABLE_CRAWLBOT_H6,
            self::ENTITY => self::ENTITY_CRAWLBOT_H6,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_H6,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_H6,
        ],
        self::ENTITY_CRAWLBOT_IMG => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_IMG,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_IMG,
            self::TABLE => self::TABLE_CRAWLBOT_IMG,
            self::ENTITY => self::ENTITY_CRAWLBOT_IMG,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_IMG,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_IMG,
        ],
        self::ENTITY_CRAWLBOT_LINK => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_LINK,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_LINK,
            self::TABLE => self::TABLE_CRAWLBOT_LINK,
            self::ENTITY => self::ENTITY_CRAWLBOT_LINK,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_LINK,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_LINK,
        ],
        self::ENTITY_CRAWLBOT_SCRIPT => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_SCRIPT,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_SCRIPT,
            self::TABLE => self::TABLE_CRAWLBOT_SCRIPT,
            self::ENTITY => self::ENTITY_CRAWLBOT_SCRIPT,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_SCRIPT,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_SCRIPT,
        ],
        self::ENTITY_CRAWLBOT_URLS => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_URLS,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_URLS,
            self::TABLE => self::TABLE_CRAWLBOT_URLS,
            self::ENTITY => self::ENTITY_CRAWLBOT_URLS,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_URLS,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_URLS,
        ],
        self::ENTITY_CRAWLBOT_URLS2 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_URLS2,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_URLS2,
            self::TABLE => self::TABLE_CRAWLBOT_URLS2,
            self::ENTITY => self::ENTITY_CRAWLBOT_URLS2,
            self::HYDRATOR => self::HYDRATOR_CRAWLBOT_URLS2,
            self::NAMING_STRATEGY => self::NAMING_STRATEGY_CRAWLBOT_URLS2,
        ],
    ];
    /*
    const RELATIONS = [
        self::ENTITY_CRAWLBOT => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_A => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_CONTENT => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_H1 => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_H2 => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_H3 => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_H4 => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_H5 => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_H6 => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_IMG => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_LINK => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_SCRIPT => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_URLS => [
            self::RELATES => [],
        ],
        self::ENTITY_CRAWLBOT_URLS2 => [
            self::RELATES => [],
        ],
    ];
    */
}