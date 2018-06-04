<?php

namespace Smtm\Crawlbot\Service;

use ArrayObject;
use Smtm\Crawlbot\Form\DefaultUrlSchemeSelectDecorator;
use Smtm\Crawlbot\Model\Crawlbot as ModelCrawlbot;
use Smtm\Crawlbot\Model\Entity\Crawlbot as EntityCrawlbot;
use Smtm\Crawlbot\Model\Entity\CrawlbotA as EntityCrawlbotA;
use Smtm\Crawlbot\Model\Entity\CrawlbotH1 as EntityCrawlbotH1;
use Smtm\Crawlbot\Model\Entity\CrawlbotH2 as EntityCrawlbotH2;
use Smtm\Crawlbot\Model\Entity\CrawlbotH3 as EntityCrawlbotH3;
use Smtm\Crawlbot\Model\Entity\CrawlbotH4 as EntityCrawlbotH4;
use Smtm\Crawlbot\Model\Entity\CrawlbotH5 as EntityCrawlbotH5;
use Smtm\Crawlbot\Model\Entity\CrawlbotH6 as EntityCrawlbotH6;
use Smtm\Crawlbot\Model\Entity\CrawlbotImg as EntityCrawlbotImg;
use Smtm\Crawlbot\Model\Entity\CrawlbotLink as EntityCrawlbotLink;
use Smtm\Crawlbot\Model\Entity\CrawlbotResponse as EntityCrawlbotResponse;
use Smtm\Crawlbot\Model\Entity\CrawlbotScript as EntityCrawlbotScript;
use Smtm\Crawlbot\Model\Entity\CrawlbotUriCrawled as EntityCrawlbotUriCrawled;
use Smtm\Crawlbot\Model\Entity\CrawlbotUriQueued as EntityCrawlbotUriQueued;
use Smtm\Http\Client;
use Smtm\Zfx\Db\TableGateway\RelationalTableGatewayInterface;
use Zend\Db\Sql\Expression;
use Zend\Dom\Document;
use Zend\Json\Json;

class Crawlbot
{
    const TAG_ENTITIES = [
        EntityCrawlbotA::class,
        EntityCrawlbotH1::class,
        EntityCrawlbotH2::class,
        EntityCrawlbotH3::class,
        EntityCrawlbotH4::class,
        EntityCrawlbotH5::class,
        EntityCrawlbotH6::class,
        EntityCrawlbotImg::class,
        EntityCrawlbotLink::class,
        EntityCrawlbotScript::class,
    ];

    protected $client;
    protected $model;

    public function __construct(Client $client, ModelCrawlbot $model)
    {
        $this->setClient($client);
        $this->setModel($model);
    }

    public function init(EntityCrawlbot $entityCrawlbot)
    {
        $this->getModel()->init($entityCrawlbot);
    }

    public function initEntityUriQueued(EntityCrawlbot $entityCrawlbot): EntityCrawlbotUriQueued
    {
        $entity = $this->getModel()->getEntityManager()->get(EntityCrawlbotUriQueued::class);
        $entity->parse($entityCrawlbot->getEntryPointUri());
        $entity->setCrawlId($entityCrawlbot->getId());

        return $entity;
    }

    public function initEntityUriCrawled(
        EntityCrawlbot $entityCrawlbot,
        EntityCrawlbotUriQueued $entityCrawlbotUriQueued,
        ?EntityCrawlbotUriCrawled $firstEntityCrawlbotUriCrawled = null
    ): EntityCrawlbotUriCrawled {
        $defaultUrlScheme = DefaultUrlSchemeSelectDecorator::getScheme($entityCrawlbot->getDefaultUrlScheme());

        $entity = $this->getModel()->getEntityManager()->get(EntityCrawlbotUriCrawled::class);
        if ($entityCrawlbotUriQueued->getAId() === null) {
            $entity->parse($entityCrawlbot->getEntryPointUri());
        } else {
            // TODO: Make the data transfer more elegant
            $urlData = $this->getModel()->extract($entityCrawlbotUriQueued);
            unset($urlData['id']);
            $entity = $this->getModel()->hydrate(
                $urlData,
                $entity
            );
            if ($entity->getScheme() === null) {
                $entity->setScheme($defaultUrlScheme);
            }
            if (($entity->getHost() === null) || ($entity->getHost() === '')) { // TODO: Set host to null if empty
                $entity->setHost($firstEntityCrawlbotUriCrawled->getHost());
            }
            if ($entity->getPort() === null) {
                $entity->setPort($firstEntityCrawlbotUriCrawled->getPort());
            }
            $entity->parse((string)$entity);
        }
        $entity->setCrawlId($entityCrawlbot->getId());
        $entity->setUriQueuedId($entityCrawlbotUriQueued->getId());

        return $entity;
    }

    protected function initEntityResponse(
        EntityCrawlbot $entityCrawlbot,
        EntityCrawlbotUriCrawled $entityCrawlbotUriCrawled
    ): EntityCrawlbotResponse {
        $response = $this->getClient()->communicate('GET', (string) $entityCrawlbotUriCrawled);
        $entity = $this->getModel()->getEntityManager()->get(EntityCrawlbotResponse::class);
        $entity->setCrawlId($entityCrawlbot->getId());
        $entity->setUriCrawledId($entityCrawlbotUriCrawled->getId());
        $entity->setStatusCode($response->getStatusCode());
        $entity->setHeaders(null);
        $entity->setBody($response->getBody()->getContents());
        $entity->setBodySize($response->getBody()->getSize());
        $entity->setBodyHash(sha1($response->getBody()->getContents()));

        return $entity;
    }

    protected function processContent(EntityCrawlbotResponse $entityCrawlbotResponse): array
    {
        $dom = new Document($entityCrawlbotResponse->getBody());
        $nodeLists = [];
        foreach (self::TAG_ENTITIES as $entityClass) {
            $tagName = $this->getEntityTagName($entityClass);
            $nodeLists[$tagName] = Document\Query::execute($tagName, $dom, Document\Query::TYPE_CSS);
        }

        return $nodeLists;
    }

    public function crawlStart(EntityCrawlbot $entityCrawlbot)
    {
        $this->init($entityCrawlbot);

        $this->getModel()->createTables();

        $entities = [];

        $baseTableGateway = $this->getModel()->getBaseTableGateway($entityCrawlbot);
        $entityCrawlbot = $this->getModel()->post($entityCrawlbot, $baseTableGateway);
        $entities[EntityCrawlbot::class] = $entityCrawlbot;

        $entityCrawlbotUriQueued = $this->initEntityUriQueued($entityCrawlbot);
        $entityCrawlbotUriQueued = $this->getModel()->post($entityCrawlbotUriQueued);
        $entities[EntityCrawlbotUriQueued::class] = $entityCrawlbotUriQueued;

        $entityCrawlbotUriCrawled = $this->initEntityUriCrawled($entityCrawlbot, $entityCrawlbotUriQueued);
        $entityCrawlbotUriCrawled = $this->getModel()->post($entityCrawlbotUriCrawled);
        $entities[EntityCrawlbotUriCrawled::class] = $entityCrawlbot;

        $entityCrawlbotResponse = $this->initEntityResponse($entityCrawlbot, $entityCrawlbotUriCrawled);
        $entityCrawlbotResponse = $this->getModel()->post($entityCrawlbotResponse);
        $entities[EntityCrawlbotResponse::class] = $entityCrawlbotResponse;

        $crawl = $this->processContent($entityCrawlbotResponse);

        $entities +=
            (!empty($entityCrawlbotResponse->getBodySize()))
                ? $this->insertTags($entityCrawlbot, $entityCrawlbotUriCrawled, $crawl)
                : [];

        return $entities;
    }

    public function crawlIterate(int $id)
    {
        $selectCrawlbot =
            $this->getModel()
                ->getEntityManager()
                ->get(EntityCrawlbot::class)
                ->setId($id);
        $selectCrawlbot = $this->getModel()->get([
            RelationalTableGatewayInterface::SELECT => [
                EntityCrawlbot::class => [
                    '*',
                ],
            ],
            RelationalTableGatewayInterface::WHERE => [
                RelationalTableGatewayInterface::EQUAL => [
                    EntityCrawlbot::class => $selectCrawlbot,
                ],
            ],
        ]);

        if (!$selectCrawlbot->count()) {
            throw new \Exception('No crawlbot record found with id ' . $id, 1);
        }

        $entityCrawlbot = $this->getModel()->decorateResultSet($selectCrawlbot, EntityCrawlbot::class)->current();
        $entities[EntityCrawlbot::class] = $entityCrawlbot;

        $this->init($entityCrawlbot);

        $selectCrawlbotUriCrawled =
            $this->getModel()
                ->getEntityManager()
                ->get(EntityCrawlbotUriCrawled::class)
                ->setCrawlId($entityCrawlbot->getId());
        $selectFirstUriCrawledIdAndLastCrawledUriQueuedId = $this->getModel()->get([
            RelationalTableGatewayInterface::SELECT => [
                EntityCrawlbotUriCrawled::class => [
                    'min_id' => new Expression('MIN(id)'),
                    'max_uri_queued_id' => new Expression('MAX(uri_queued_id)'),
                ],
            ],
            RelationalTableGatewayInterface::WHERE => [
                RelationalTableGatewayInterface::EQUAL => [
                    EntityCrawlbotUriCrawled::class => $selectCrawlbotUriCrawled,
                ],
            ],
            RelationalTableGatewayInterface::GROUP => [
                EntityCrawlbotUriCrawled::class => [
                    'crawl_id',
                ],
            ],
        ]);

        if (!$selectFirstUriCrawledIdAndLastCrawledUriQueuedId->count()) {
            throw new \Exception('No crawled URLs found for crawlbot ' . $id . '. Under normal conditions this would have been caused by premature termination of the crawl startup step.',
                2);
        }

        $firstUriCrawledIdAndLastCrawledUriQueuedId =
            $this->getModel()->decorateResultSet(
                $selectFirstUriCrawledIdAndLastCrawledUriQueuedId,
                new ArrayObject()
            )->toArray();
        $firstUriCrawledIdAndLastCrawledUriQueuedId = reset($firstUriCrawledIdAndLastCrawledUriQueuedId);
        $firstUriCrawledId = array_shift($firstUriCrawledIdAndLastCrawledUriQueuedId);
        $lastCrawledUriQueuedId = array_shift($firstUriCrawledIdAndLastCrawledUriQueuedId);
        if (($firstUriCrawledId === null) || ($lastCrawledUriQueuedId === null)) {
            throw new \Exception('The crawled url records seem compromised.', 3);
        }

        $selectFirstCrawlbotUriCrawled =
            $this->getModel()
                ->getEntityManager()
                ->get(EntityCrawlbotUriCrawled::class)
                ->setId($firstUriCrawledId);
        $selectFirstCrawlbotUriCrawled = $this->getModel()->get([
            RelationalTableGatewayInterface::SELECT => [
                EntityCrawlbotUriCrawled::class => [
                    '*',
                ],
            ],
            RelationalTableGatewayInterface::WHERE => [
                RelationalTableGatewayInterface::EQUAL => [
                    EntityCrawlbotUriCrawled::class => $selectFirstCrawlbotUriCrawled,
                ],
            ],
            RelationalTableGatewayInterface::LIMIT => 1,
        ]);
        $selectFirstCrawlbotUriCrawled = $selectFirstCrawlbotUriCrawled->current();

        $selectCrawlbotUriQueued =
            $this->getModel()
                ->getEntityManager()
                ->get(EntityCrawlbotUriQueued::class)
                ->setCrawlId($entityCrawlbot->getId());
        $selectCrawlbotUriQueued = $this->getModel()->get([
            RelationalTableGatewayInterface::SELECT => [
                EntityCrawlbotUriQueued::class => [
                    '*',
                ],
            ],
            RelationalTableGatewayInterface::WHERE => [
                RelationalTableGatewayInterface::EQUAL => [
                    EntityCrawlbotUriQueued::class => $selectCrawlbotUriQueued,
                ],
                RelationalTableGatewayInterface::GREATER_THAN => [
                    EntityCrawlbotUriQueued::class => [
                        'id' => $lastCrawledUriQueuedId,
                    ],
                ],
            ],
            RelationalTableGatewayInterface::LIMIT => 1,
        ]);
        if (!$selectCrawlbotUriQueued->count()) {
            return [];
        }
        $entityCrawlbotUriQueued = $selectCrawlbotUriQueued->current();

        $selectCrawlbotA =
            $this->getModel()
                ->getEntityManager()
                ->get(EntityCrawlbotA::class)
                ->setId($entityCrawlbotUriQueued->getAId());
        $selectCrawlbotA = $this->getModel()->get([
            RelationalTableGatewayInterface::SELECT => [
                EntityCrawlbotA::class => [
                    'uri_crawled_id',
                ],
            ],
            RelationalTableGatewayInterface::WHERE => [
                RelationalTableGatewayInterface::EQUAL => [
                    EntityCrawlbotA::class => $selectCrawlbotA,
                ],
            ],
            RelationalTableGatewayInterface::LIMIT => 1,
        ]);
        if (! $selectCrawlbotA->count()) {
            throw new \Exception('The a tag records seem compromised.', 4);
        }
        $entityCrawlbotA = $selectCrawlbotA->current();

        $selectCrawlbotAUriCrawled =
            $this->getModel()
                ->getEntityManager()
                ->get(EntityCrawlbotUriCrawled::class)
                ->setId($entityCrawlbotA->getUriCrawledId());
        $selectCrawlbotAUriCrawled = $this->getModel()->get([
            RelationalTableGatewayInterface::SELECT => [
                EntityCrawlbotUriCrawled::class => [
                    '*',
                ],
            ],
            RelationalTableGatewayInterface::WHERE => [
                RelationalTableGatewayInterface::EQUAL => [
                    EntityCrawlbotUriCrawled::class => $selectCrawlbotAUriCrawled,
                ],
            ],
            RelationalTableGatewayInterface::LIMIT => 1,
        ]);
        if (! $selectCrawlbotA->count()) {
            throw new \Exception('The crawled url records seem compromised.', 3);
        }
        $selectCrawlbotAUriCrawled = $selectCrawlbotAUriCrawled->current();

        $entityCrawlbotUriCrawled = $this->initEntityUriCrawled($entityCrawlbot, $entityCrawlbotUriQueued,
            $selectCrawlbotAUriCrawled);
        $entityCrawlbotUriCrawled = $this->getModel()->post($entityCrawlbotUriCrawled);
        $entities[EntityCrawlbotUriCrawled::class] = $entityCrawlbotUriCrawled;

        $entityCrawlbotResponse = $this->initEntityResponse($entityCrawlbot, $entityCrawlbotUriCrawled);
        $entityCrawlbotResponse = $this->getModel()->post($entityCrawlbotResponse);
        $entities[EntityCrawlbotResponse::class] = $entityCrawlbotResponse;

        $crawl = $this->processContent($entityCrawlbotResponse);

        $entities +=
            (!empty($entityCrawlbotResponse->getBodySize()))
                ? $this->insertTags($entityCrawlbot, $entityCrawlbotUriCrawled, $crawl)
                : [];

        return $entities;
    }

    protected function insertTags(
        EntityCrawlbot $entityCrawlbot,
        EntityCrawlbotUriCrawled $entityCrawlbotUriCrawled,
        $crawl
    ) {
        $entities = [];
        foreach (self::TAG_ENTITIES as $entityClass) {
            $callback =
                ($entityClass === EntityCrawlbotA::class)
                    ? [$this, 'processCrawlUrls']
                    : null;
            $entities += $this->insertTag($entityClass, $entityCrawlbot, $entityCrawlbotUriCrawled, $crawl, $callback);
        }

        return $entities;
    }

    protected function insertTag(
        string $entityClass,
        EntityCrawlbot $entityCrawlbot,
        EntityCrawlbotUriCrawled $entityCrawlbotUriCrawled,
        $crawl,
        callable $callback = null
    ) {
        $tagName = $this->getEntityTagName($entityClass);
        $entities = [];
        if (!empty($crawl[$tagName])) {
            foreach ($crawl[$tagName] as $node) {
                $entityInstance = new $entityClass();
                $entityInstance->setCrawlId($entityCrawlbot->getId());
                $entityInstance->setUriCrawledId($entityCrawlbotUriCrawled->getId());
                $entityInstance->setTagHtml($node->ownerDocument->saveXML($node));
                if (
                    ($urlAttribute = constant($entityClass . '::ATTRIBUTE_NAME_URL')) !== null
                    &&
                    $node->hasAttribute($urlAttribute)
                ) {
                    $entityInstance->setAttributeUri($node->getAttribute($urlAttribute));
                }
                $entityInstance = $this->getModel()->post($entityInstance);
                $entities[$entityClass][$entityInstance->getId()] = $entityInstance;
            }

            if ($callback !== null) {
                $entities += call_user_func_array($callback,
                    [$entityCrawlbot, $entityCrawlbotUriCrawled, $entities[$entityClass] ?? []]);
            }
        }

        return $entities;
    }

    protected function processCrawlUrls(
        EntityCrawlbot $entityCrawlbot,
        EntityCrawlbotUriCrawled $entityCrawlbotUriCrawled,
        array $entitiesCrawlbotA
    ): array {
        $entities = [];
        foreach ($entitiesCrawlbotA as $id => $entityCrawlbotA) {
            $attributeUri = $this->getModel()->getEntityManager()->get(EntityCrawlbotUriQueued::class);
            $attributeUri->parse($entityCrawlbotA->getAttributeUri());
            if($attributeUri->isJavascript() || $attributeUri->isFragment()) {
                continue;
            }
            $attributeUri->buildUriHash(
                DefaultUrlSchemeSelectDecorator::getScheme($entityCrawlbot->getDefaultUrlScheme()),
                $entityCrawlbotUriCrawled->getHost(),
                $entityCrawlbotUriCrawled->getPort()
            );

            $selectCrawlbotUriQueued = $this->getModel()->get([
                RelationalTableGatewayInterface::SELECT => [
                    EntityCrawlbotUriQueued::class => [
                        $this->getModel()->getEntityDefinition(EntityCrawlbotUriQueued::class)[RelationalTableGatewayInterface::INSERT_SEQUENCE_COLUMN],
                    ],
                ],
                RelationalTableGatewayInterface::WHERE => [
                    RelationalTableGatewayInterface::EQUAL => [
                        EntityCrawlbotUriQueued::class => $this->getModel()->getEntityManager()->get(EntityCrawlbotUriQueued::class)->setUriHash($attributeUri->getUriHash()),
                    ],
                ],
            ]);
            if ($selectCrawlbotUriQueued->count()) {
                continue;
            }

            $entity = $this->getModel()->getEntityManager()->get(EntityCrawlbotUriQueued::class);
            $entity->parse($entityCrawlbotA->getAttributeUri());
            $entity->setCrawlId($entityCrawlbot->getId());
            $entity->setAId($entityCrawlbotA->getId());
            $entity->setUriHash($attributeUri->getUriHash());
            $entity = $this->getModel()->post($entity);
            $entities[EntityCrawlbotUriQueued::class][$entity->getId()] = $entity;
        }

        return $entities;
    }

    public function getEntityTagName($entity)
    {
        $entityClass = $this->getModel()->getEntityClass($entity);
        return constant($entityClass . '::TAG_NAME');
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return Crawlbot
     */
    public function setClient(Client $client): Crawlbot
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return ModelCrawlbot
     */
    public function getModel(): ModelCrawlbot
    {
        return $this->model;
    }

    /**
     * @param ModelCrawlbot $model
     * @return Crawlbot
     */
    public function setModel(ModelCrawlbot $model): Crawlbot
    {
        $this->model = $model;
        return $this;
    }
}