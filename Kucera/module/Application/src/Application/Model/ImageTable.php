<?php

// module/Album/src/Album/Model/AlbumTable.php:
namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class ImageTable extends AbstractTableGateway
{
    protected $table ='zam_images';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Image());
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

    public function saveProductList(\ProductList $productList)
    {
        $data = array(
            'title' => $productList->title,
            'categorylist_id' => $productList->categorylist_id,
            'published'  => 1,
        );
        $id = (int)$productList->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getCategory($id)) {
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
}