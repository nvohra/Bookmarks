<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 30/01/2015
 * Time: 19:41
 */

namespace Application\Model;


use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Paginator\Paginator;

class BookmarkDao
{

    private $table;

    function __construct(TableGateway $table)
    {
        $this->table = $table;
    }

    public function findAll($paginated = true)
    {
        return ($paginated) ? new Paginator(new DbTableGateway($this->table)) : $this->table->select();
    }

    public function getById($id)
    {
        $rowset = $this->table->select(['id' => $id]);

        return $rowset->current();
    }


    public function delete($id)
    {
        $this->table->delete(['id' => $id]);
    }

    public function save($data)
    {
        $this->table->insert($data);
    }

    public function update($data)
    {
        $this->table->update($data, ['id' => $data['id']]);
    }
}