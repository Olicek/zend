<?php

// module/Album/src/Album/Model/AlbumTable.php:
namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class ProductTable extends AbstractTableGateway
{
    protected $table ='zam_product';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Product());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getProduct($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Řádek $id nenalezen.");
        }
        return $row;
    }
    
    public function getProductList($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('productlist_id' => $id));
        return $rowset;
    }


    public function saveProduct(\Application\Model\Product $product, $productListId = null)
    {
        $data = array(
            'title' => $product->title,
            'description' => $product->description,
            'text' => $product->text,
            'price' => $product->price,
            'created' => date('Y-m-d h:i:s')
        );
        $id = (int)$product->id;
        if ($id == 0) {
            $data = array(
                'title' => $product->title,
                'description' => $product->description,
                'text' => $product->text,
                'price' => $product->price,
                'created' => date('Y-m-d h:i:s'),
                'published' => 1,
                'productlist_id' => $productListId
            );
            $this->insert($data);
        } else {
            if ($this->getProduct($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteProduct($id)
    {
        $this->delete(array('id' => $id));
    }
    
    public function published($id)
    {
        if ($actual =$this->getProduct($id)) 
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