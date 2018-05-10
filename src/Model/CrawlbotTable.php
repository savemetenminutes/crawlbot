<?php
namespace Smtm\Crawlbot\Model;

use Smtm\Crawlbot\Model\Entity\Crawlbot as EntityCrawlbot;
use Smtm\Zfx\Db\Sql\Ddl\CreateTable as Zfx_CreateTable;
use Smtm\Zfx\Db\Sql\Ddl\AlterTable as Zfx_AlterTable;
use Smtm\Zfx\Db\Sql\Ddl\TruncateTable as Zfx_TruncateTable;
use Smtm\Zfx\Db\TableGateway\RelationalTableGateway;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql as Sql;
use Zend\Db\Sql\Insert as Insert;
use Zend\Db\Sql\Select as Select;

class CrawlbotTable extends RelationalTableGateway implements CrawlbotTableInterface {
    protected $crawlbot;
    /*
    public function __construct(AdapterInterface ...$adapters) {
        parent::__construct($adapters);
    }
    */

    /**
     * @return mixed
     */
    public function getCrawlbot()
    {
        return $this->crawlbot;
    }

    /**
     * @param EntityCrawlbot $crawlbot
     * @return CrawlbotTable
     */
    public function setCrawlbot(EntityCrawlbot $crawlbot): CrawlbotTable
    {
        $this->crawlbot = $crawlbot;
        return $this;
    }

    public function init(EntityCrawlbot $crawlbot) {
        $this->setCrawlbot($crawlbot);
        $this->createTables();
    }

    protected function createTables()
    {
        $dbTableSuffix = $this->getCrawlbot()->getDbTableSuffix();
        $dbTableSuffix = ($dbTableSuffix === null || $dbTableSuffix === '') ? date('_-_Y-m-d_H-i-s') : $dbTableSuffix;
        $this->getCrawlbot()->setDbTableSuffix($dbTableSuffix);

        foreach($this->getEntityDefinitions() as $entity => $entityDefinition) {
            if($entityDefinition[self::TABLE_IDENTIFIER]->getTable() === self::TABLE_CRAWLBOT) {
                continue;
            }
            $adapter = $this->getAdapter($entityDefinition[self::ADAPTER]);
            $sql = $this->getAdapterDefinition($entityDefinition[self::ADAPTER])[self::TABLE_GATEWAY]->getSql();
            $tableName = $entityDefinition[self::TABLE_IDENTIFIER]->getTable();
            $newTable = new Zfx_CreateTable();
            $newTable->setTable($tableName.$dbTableSuffix);
            $newTable->setIfNotExists(true);
            $newTable->copyTableStructure($tableName, $adapter);
            $query = $sql->buildSqlString($newTable, $adapter);
            $adapter->query(
                $query,
                Adapter::QUERY_MODE_EXECUTE
            );
        }
    }

    public function backupTable() {
        $dateSuffix = date('Y-m-d_H-i-s');

        // Because there is no cross-platform (nor a platform-specific for that matter) support for things like CREATE TABLE ... LIKE and TRUNCATE TABLE we have to do all this...
        $adapter = $this->tableGateway->getAdapter();
        $sql = new Sql($adapter);
        $sql->getSqlPlatform()->setTypeDecorator('Smtm\Zfx\Db\Sql\Ddl\CreateTable', new Zfx_MysqlCreateTableDecorator()); // this practically does nothing... yet...
        $sql->getSqlPlatform()->setTypeDecorator('Zend\Db\Sql\Ddl\CreateTable', new Zfx_MysqlCreateTableDecorator()); // the default key needs to be overwritten with the new decorator as the \Zend\Db\Sql\Platform\Platform::getDecorator() method checks whether Smtm\Zfx\Db\Sql\Platform\Mysql\Ddl\CreateTableDecorator is an instance of Zend\Db\Sql\Ddl\CreateTable (which we ultimately extend) which as a key is stored and iterated through earlier in the decorators collection
        $sql->getSqlPlatform()->setTypeDecorator('Smtm\Zfx\Db\Sql\Ddl\AlterTable', new Zfx_MysqlAlterTableDecorator());
        $sql->getSqlPlatform()->setTypeDecorator('Zend\Db\Sql\Ddl\AlterTable', new Zfx_MysqlAlterTableDecorator());

        $newTable = new Zfx_CreateTable();
        $newTable->setTable($this->tableGateway->getTable().'_-_'.$dateSuffix);
        $newTable->setIfNotExists(true);
        $newTable->copyTableStructure($this->tableGateway->getTable(), $adapter);
        $query = $sql->buildSqlString($newTable, $adapter);
        $adapter->query(
            $query,
            $adapter::QUERY_MODE_EXECUTE
        );
        //$query = 'CREATE TABLE IF NOT EXISTS `'.$this->tableGateway->getTable().'_-_'.$dateSuffix.'` LIKE `'.$this->tableGateway->getTable().'`';
        //$this->db->setQuery($query);
        //$this->db->execute();

        $truncateTable = new Zfx_TruncateTable();
        $truncateTable->setTable($this->tableGateway->getTable().'_-_'.$dateSuffix);
        $query = $sql->buildSqlString($truncateTable, $adapter);
        $adapter->query(
            $query,
            $adapter::QUERY_MODE_EXECUTE
        );
        //$query = 'TRUNCATE TABLE `'.$this->tableGateway->getTable().'_-_'.$dateSuffix.'`';
        //$this->db->setQuery($query);
        //$this->db->execute();

        $insert = new Insert();
        $insert->into($this->tableGateway->getTable().'_-_'.$dateSuffix);
        $select = new Select();
        $select->columns(['*']);
        $select->from($this->tableGateway->getTable());
        $insert->select($select);
        $query = $sql->buildSqlString($insert, $adapter);
        $adapter->query(
            $query,
            $adapter::QUERY_MODE_EXECUTE
        );
        //$query = 'INSERT INTO `'.$this->tableGateway->getTable().'_-_'.$dateSuffix.'` SELECT * FROM `'.$this->tableGateway->getTable().'`';
        //$this->db->setQuery($query);
        //$this->db->execute();

        $truncateTable = new Zfx_TruncateTable();
        $truncateTable->setTable($this->tableGateway->getTable());
        $query = $sql->buildSqlString($truncateTable, $adapter);
        $adapter->query(
            $query,
            $adapter::QUERY_MODE_EXECUTE
        );
        //$query = 'TRUNCATE TABLE `'.$this->tableGateway->getTable().'`';
        //$this->db->setQuery($query);
        //$this->db->execute();

        $alterTable = new Zfx_AlterTable();
        $alterTable->setTable($this->tableGateway->getTable().'_-_'.$dateSuffix);
        $alterTable->setAutoIncrement(1);
        $query = $sql->buildSqlString($alterTable, $adapter);
        $adapter->query(
            $query,
            $adapter::QUERY_MODE_EXECUTE
        );
        //$query = 'ALTER TABLE `'.$this->tableGateway->getTable().'` AUTO_INCREMENT=1';
        //$this->db->setQuery($query);
        //$this->db->execute();
    }

    public function fetchAll() {
        return $this->tableGateway->select();
    }

    public function select($columns = ['*'], $where = null, $limit = null) {
        $select = new Select();
        $select->columns($columns);
        if(!empty($where)) {
            $select->where($where);
        }
        if(!empty((int)$limit)) {
            $select->limit((int)$limit);
        }
        return $this->tableGateway->selectWith($select);
    }

    public function save(Array $attr) {
        $id = (!empty($attr['id'])?(int)$attr['id']:0);
        if ($id === 0) {
            $this->tableGateway->insert($attr);
            $id = $this->tableGateway->getLastInsertValue();
        } else if ($this->select(
            [
                'id'=>$id
            ]
        )) {
            $this->tableGateway->update($attr, ['id' => $id]);
        } else {
            try {
                throw new \Exception('Cannot update row. No matching row id found.', 0);
            } catch(\Exception $e) {
                return false;
            }
        }

        return true;
    }

    public function deleteRow($id) {
        $this->tableGateway->delete(
            [
                'id' => (int) $id
            ]
        );
    }


}