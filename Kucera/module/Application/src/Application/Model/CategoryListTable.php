<?php

// module/Album/src/Album/Model/AlbumTable.php:
namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;

class CategoryListTable extends AbstractTableGateway
{
    protected $table ='zam_categorylist';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new CategoryList());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select(function (Select $select) {
             $select->order('title ASC');
        });
        return $resultSet;
    }

    public function getCategory($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Řádek $id nenalezen.");
        }
        return $row;
    }

    public function saveCategory(\Application\Model\CategoryList $category)
    {
        $data = array('title' => $category->title);
        $id = (int)$category->id;
        if ($id == 0) {
            $data = array(
                'title' => $category->title,
                'published'  => 1,
            );
            $this->insert($data);
        } else {
            if ($this->getCategory($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteCategory($id)
    {
        $this->delete(array('id' => $id));
    }
    
    public function published($id)
    {
        if ($actual =$this->getCategory($id)) 
        {
            if ($actual->published)
            {
                $data = array('published' => 0,);
            } else
            {
                $data = array('published' => 1,);
            }
            $this->update($data, array('id' => $id));
        } else {
            throw new \Exception('Form id does not exist');
        }
    }
}