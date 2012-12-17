<?php

// module/Album/src/Album/Model/AlbumTable.php:
namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class UserTable extends AbstractTableGateway
{
    protected $table ='zam_users';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new User());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getUser($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Řádek $id nenalezen.");
        }
        return $row;
    }
    
    public function signUser($user)
    {
        return $this->select(array('username' => $user));
    }

    public function saveUser(\Application\Model\User $user)
    {
        $data = array(
            'username' => $user->username,
            'name' => $user->name,
            'role' => $user->role
        );
        $id = (int)$user->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getUser($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id neexistuje.');
            }
        }
    }

    public function deleteUser($id)
    {
        $this->delete(array('id' => $id));
    }
}