<?php

// module/Album/src/Album/Model/AlbumTable.php:
namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class ProductListTable extends AbstractTableGateway
{
    protected $table ='zam_productlist';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new ProductList());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getProductList($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Řádek $id nenalezen.");
        }
        return $row;
    }
    
    public function getCategory($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('categorylist_id' => $id));
        return $rowset;
    }


    public function saveProductList(\Application\Model\ProductList $productList)
    {
        $data = array(
            'title' => $productList->title,
            'categorylist_id' => $productList->categorylist_id
        );
        $id = (int)$productList->id;
        if ($id == 0) {
            $data = array(
                'title' => $productList->title,
                'categorylist_id' => $productList->categorylist_id,
                'published'  => 1,
            );
            $this->insert($data);
        } else {
            if ($this->getProductList($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteProductList($id)
    {
        $this->delete(array('id' => $id));
    }
    
    public function published($id)
    {
        if ($actual =$this->getProductList($id)) 
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