<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService;
/**
 * Description of BaseController
 *
 * @author Pracovna
 */
class BaseController  extends AbstractActionController
{
    protected $categoryList;
    protected $productListMenu;
    protected $productMenu;
    protected $auth;
    protected $identity;


    public function __construct() {
         $this->auth = new AuthenticationService();
         $this->identity = $this->auth->hasIdentity();
     }

    public function menu()
    {
        $this->layout()->categoriesMenu = $this->getCategoryListTable()->fetchAll();
        $this->layout()->productListMenu = $this->getProductListTable()->fetchAll();
        $this->layout()->flashMessages = $this->flashMessenger()->getMessages();
        $this->layout()->auth = $this->auth;
        $this->layout()->identity = $this->identity;
    }
    
    public function getCategoryListTable()
    {
        if (!$this->categoryList) {
            $sm = $this->getServiceLocator();
            $this->categoryList = $sm->get('Application\Model\CategoryListTable');
        }
        return $this->categoryList;
    }
    
    public function getProductListTable()
    {
        if (!$this->productListMenu) {
            $sm = $this->getServiceLocator();
            $this->productListMenu = $sm->get('Application\Model\ProductListTable');
        }
        return $this->productListMenu;
    }
    
    public function getProductTable()
    {
        if (!$this->productMenu) {
            $sm = $this->getServiceLocator();
            $this->productMenu = $sm->get('Application\Model\ProductTable');
        }
        return $this->productMenu;
    }
}

?>
