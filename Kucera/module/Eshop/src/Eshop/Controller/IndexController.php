<?php

namespace Eshop\Controller;

use Zend\View\Model\ViewModel;
use Application\Model\Image;

/**
 * Description of AdminController
 *
 * @author Petr Olišar
 */
class IndexController extends \Application\Controller\BaseController
{
    
    private $image;


    public function indexAction() 
    {
        $this->menu();
        return new ViewModel(array(
            'categoryList' => $this->getCategoryListTable()->fetchAll(),
        ));
    }
    
    public function categoryAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->menu();
        return new ViewModel(array(
            'productList' => $this->getProductListTable()->getCategory($id),
            'category' => $this->getCategoryListTable()->getCategory($id),
        ));
    }
    
    public function productListAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->menu();
        return new ViewModel(array(
            'productList' => $this->getProductListTable()->getProductList($id),
            'product' => $this->getProductTable()->getProductList($id),
            'images' => $this->getImageTable()->fetchAll(),
        ));
    }
    
    public function productAction()
    {
        $this->menu();
        $id = (int) $this->params()->fromRoute('id', 0);
        return new ViewModel(array(
            'images' => $this->getImageTable()->fetchAll(),
            'product' => $this->getProductTable()->getProduct($id),
            'identity' => $this->identity,
        ));
    }
    
    private function getImageTable()
    {
        if (!$this->image) {
            $sm = $this->getServiceLocator();
            $this->image = $sm->get('Application\Model\ImageTable');
        }
        return $this->image;
    }
}

