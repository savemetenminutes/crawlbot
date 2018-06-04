<?php

namespace Smtm\Crawlbot\Model;

use Smtm\Crawlbot\Model\Entity\Crawlbot;
use Smtm\Crawlbot\Model\Entity\CrawlbotA;
use Smtm\Crawlbot\Model\Entity\CrawlbotResponse;
use Smtm\Crawlbot\Model\Entity\CrawlbotH1;
use Smtm\Crawlbot\Model\Entity\CrawlbotH2;
use Smtm\Crawlbot\Model\Entity\CrawlbotH3;
use Smtm\Crawlbot\Model\Entity\CrawlbotH4;
use Smtm\Crawlbot\Model\Entity\CrawlbotH5;
use Smtm\Crawlbot\Model\Entity\CrawlbotH6;
use Smtm\Crawlbot\Model\Entity\CrawlbotImg;
use Smtm\Crawlbot\Model\Entity\CrawlbotLink;
use Smtm\Crawlbot\Model\Entity\CrawlbotScript;
use Smtm\Crawlbot\Model\Entity\CrawlbotUriCrawled;
use Smtm\Crawlbot\Model\Entity\CrawlbotUriQueued;
use Smtm\Zfx\Db\TableGateway\RelationalTableGatewayInterface;

interface CrawlbotInterface extends RelationalTableGatewayInterface
{
    const ADAPTER_CRAWLBOT = 0;
    const SCHEMA_CRAWLBOT = null;
    const TABLE_CRAWLBOT = 'crawlbot';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT = 'id';
    const ENTITY_CRAWLBOT = Crawlbot::class;

    const ADAPTER_CRAWLBOT_A = 0;
    const SCHEMA_CRAWLBOT_A = null;
    const TABLE_CRAWLBOT_A = 'crawlbot_a';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_A = 'id';
    const ENTITY_CRAWLBOT_A = CrawlbotA::class;

    const ADAPTER_CRAWLBOT_RESPONSE = 0;
    const SCHEMA_CRAWLBOT_RESPONSE = null;
    const TABLE_CRAWLBOT_RESPONSE = 'crawlbot_response';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_RESPONSE = 'id';
    const ENTITY_CRAWLBOT_RESPONSE = CrawlbotResponse::class;

    const ADAPTER_CRAWLBOT_H1 = 0;
    const SCHEMA_CRAWLBOT_H1 = null;
    const TABLE_CRAWLBOT_H1 = 'crawlbot_h1';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_H1 = 'id';
    const ENTITY_CRAWLBOT_H1 = CrawlbotH1::class;

    const ADAPTER_CRAWLBOT_H2 = 0;
    const SCHEMA_CRAWLBOT_H2 = null;
    const TABLE_CRAWLBOT_H2 = 'crawlbot_h2';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_H2 = 'id';
    const ENTITY_CRAWLBOT_H2 = CrawlbotH2::class;

    const ADAPTER_CRAWLBOT_H3 = 0;
    const SCHEMA_CRAWLBOT_H3 = null;
    const TABLE_CRAWLBOT_H3 = 'crawlbot_h3';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_H3 = 'id';
    const ENTITY_CRAWLBOT_H3 = CrawlbotH3::class;

    const ADAPTER_CRAWLBOT_H4 = 0;
    const SCHEMA_CRAWLBOT_H4 = null;
    const TABLE_CRAWLBOT_H4 = 'crawlbot_h4';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_H4 = 'id';
    const ENTITY_CRAWLBOT_H4 = CrawlbotH4::class;

    const ADAPTER_CRAWLBOT_H5 = 0;
    const SCHEMA_CRAWLBOT_H5 = null;
    const TABLE_CRAWLBOT_H5 = 'crawlbot_h5';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_H5 = 'id';
    const ENTITY_CRAWLBOT_H5 = CrawlbotH5::class;

    const ADAPTER_CRAWLBOT_H6 = 0;
    const SCHEMA_CRAWLBOT_H6 = null;
    const TABLE_CRAWLBOT_H6 = 'crawlbot_h6';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_H6 = 'id';
    const ENTITY_CRAWLBOT_H6 = CrawlbotH6::class;

    const ADAPTER_CRAWLBOT_IMG = 0;
    const SCHEMA_CRAWLBOT_IMG = null;
    const TABLE_CRAWLBOT_IMG = 'crawlbot_img';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_IMG = 'id';
    const ENTITY_CRAWLBOT_IMG = CrawlbotImg::class;

    const ADAPTER_CRAWLBOT_LINK = 0;
    const SCHEMA_CRAWLBOT_LINK = null;
    const TABLE_CRAWLBOT_LINK = 'crawlbot_link';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_LINK = 'id';
    const ENTITY_CRAWLBOT_LINK = CrawlbotLink::class;

    const ADAPTER_CRAWLBOT_SCRIPT = 0;
    const SCHEMA_CRAWLBOT_SCRIPT = null;
    const TABLE_CRAWLBOT_SCRIPT = 'crawlbot_script';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_SCRIPT = 'id';
    const ENTITY_CRAWLBOT_SCRIPT = CrawlbotScript::class;

    const ADAPTER_CRAWLBOT_URI_CRAWLED = 0;
    const SCHEMA_CRAWLBOT_URI_CRAWLED = null;
    const TABLE_CRAWLBOT_URI_CRAWLED = 'crawlbot_uri_crawled';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_URI_CRAWLED = 'id';
    const ENTITY_CRAWLBOT_URI_CRAWLED = CrawlbotUriCrawled::class;

    const ADAPTER_CRAWLBOT_URI_QUEUED = 0;
    const SCHEMA_CRAWLBOT_URI_QUEUED = null;
    const TABLE_CRAWLBOT_URI_QUEUED = 'crawlbot_uri_queued';
    const INSERT_SEQUENCE_COLUMN_CRAWLBOT_URI_QUEUED = 'id';
    const ENTITY_CRAWLBOT_URI_QUEUED = CrawlbotUriQueued::class;

    const ENTITY_DEFINITIONS = [
        self::ENTITY_CRAWLBOT => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT,
            self::SCHEMA => self::SCHEMA_CRAWLBOT,
            self::TABLE => self::TABLE_CRAWLBOT,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT,
            self::ENTITY => self::ENTITY_CRAWLBOT,
            self::RELATES => [
                self::ENTITY_CRAWLBOT_A => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_A => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_H1 => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_H1 => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_H2 => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_H2 => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_H3 => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_H3 => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_H4 => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_H4 => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_H5 => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_H5 => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_H6 => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_H6 => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_IMG => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_IMG => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_LINK => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_LINK => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_RESPONSE => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_RESPONSE => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_SCRIPT => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_SCRIPT => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_URI_CRAWLED => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_URI_CRAWLED => 'crawl_id',
                    ],
                ],
                self::ENTITY_CRAWLBOT_URI_QUEUED => [
                    [
                        self::ENTITY_CRAWLBOT => 'id',
                        self::ENTITY_CRAWLBOT_URI_QUEUED => 'crawl_id',
                    ],
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_A => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_A,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_A,
            self::TABLE => self::TABLE_CRAWLBOT_A,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_A,
            self::ENTITY => self::ENTITY_CRAWLBOT_A,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_A => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_H1 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H1,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H1,
            self::TABLE => self::TABLE_CRAWLBOT_H1,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_H1,
            self::ENTITY => self::ENTITY_CRAWLBOT_H1,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_H1 => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_H2 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H2,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H2,
            self::TABLE => self::TABLE_CRAWLBOT_H2,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_H2,
            self::ENTITY => self::ENTITY_CRAWLBOT_H2,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_H2 => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_H3 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H3,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H3,
            self::TABLE => self::TABLE_CRAWLBOT_H3,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_H3,
            self::ENTITY => self::ENTITY_CRAWLBOT_H3,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_H3 => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_H4 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H4,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H4,
            self::TABLE => self::TABLE_CRAWLBOT_H4,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_H4,
            self::ENTITY => self::ENTITY_CRAWLBOT_H4,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_H4 => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_H5 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H5,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H5,
            self::TABLE => self::TABLE_CRAWLBOT_H5,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_H5,
            self::ENTITY => self::ENTITY_CRAWLBOT_H5,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_H5 => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_H6 => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_H6,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_H6,
            self::TABLE => self::TABLE_CRAWLBOT_H6,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_H6,
            self::ENTITY => self::ENTITY_CRAWLBOT_H6,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_H6 => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_IMG => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_IMG,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_IMG,
            self::TABLE => self::TABLE_CRAWLBOT_IMG,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_IMG,
            self::ENTITY => self::ENTITY_CRAWLBOT_IMG,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_IMG => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_LINK => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_LINK,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_LINK,
            self::TABLE => self::TABLE_CRAWLBOT_LINK,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_LINK,
            self::ENTITY => self::ENTITY_CRAWLBOT_LINK,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_LINK => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_RESPONSE => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_RESPONSE,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_RESPONSE,
            self::TABLE => self::TABLE_CRAWLBOT_RESPONSE,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_RESPONSE,
            self::ENTITY => self::ENTITY_CRAWLBOT_RESPONSE,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_RESPONSE => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_SCRIPT => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_SCRIPT,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_SCRIPT,
            self::TABLE => self::TABLE_CRAWLBOT_SCRIPT,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_SCRIPT,
            self::ENTITY => self::ENTITY_CRAWLBOT_SCRIPT,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_SCRIPT => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_URI_CRAWLED => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_URI_CRAWLED,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_URI_CRAWLED,
            self::TABLE => self::TABLE_CRAWLBOT_URI_CRAWLED,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_URI_CRAWLED,
            self::ENTITY => self::ENTITY_CRAWLBOT_URI_CRAWLED,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_URI_CRAWLED => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
                self::ENTITY_CRAWLBOT_URI_QUEUED => [
                    self::ENTITY_CRAWLBOT_URI_CRAWLED => 'uri_queued_id',
                    self::ENTITY_CRAWLBOT_URI_QUEUED => 'id',
                ],
            ],
        ],
        self::ENTITY_CRAWLBOT_URI_QUEUED => [
            self::ADAPTER => self::ADAPTER_CRAWLBOT_URI_QUEUED,
            self::SCHEMA => self::SCHEMA_CRAWLBOT_URI_QUEUED,
            self::TABLE => self::TABLE_CRAWLBOT_URI_QUEUED,
            self::INSERT_SEQUENCE_COLUMN => self::INSERT_SEQUENCE_COLUMN_CRAWLBOT_URI_QUEUED,
            self::ENTITY => self::ENTITY_CRAWLBOT_URI_QUEUED,
            self::RELATES => [
                self::ENTITY_CRAWLBOT => [
                    self::ENTITY_CRAWLBOT_URI_QUEUED => 'crawl_id',
                    self::ENTITY_CRAWLBOT => 'id',
                ],
                self::ENTITY_CRAWLBOT_A => [
                    self::ENTITY_CRAWLBOT_URI_QUEUED => 'a_id',
                    self::ENTITY_CRAWLBOT_A => 'id',
                ],
                self::ENTITY_CRAWLBOT_URI_CRAWLED => [
                    self::ENTITY_CRAWLBOT_URI_QUEUED => 'id',
                    self::ENTITY_CRAWLBOT_URI_CRAWLED => 'uri_queued_id',
                ],
            ],
        ],
    ];
}