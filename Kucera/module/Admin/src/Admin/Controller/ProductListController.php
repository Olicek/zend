<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Admin\Form\NewProductList;

/**
 * Description of UserController
 *
 * @author Pracovna
 */
class ProductListController extends SecuredController
{
    private $productList;
    
    public function indexAction() {
        $this->menu();
        $this->layout('layout/alternativelayout');
        $form  = new NewProductList($this->getCategoryListTable()->fetchAll());
        $form->get('submit')->setAttribute('value', 'Vytvořit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $productList = new \Application\Model\ProductList;
            $form->setInputFilter($productList->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $productList->exchangeArray($form->getData());
                $this->getProductListTable()->saveProductList($productList);

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin', array(
                    'controller' => 'ProductList'
                ));
            }
        }
        return new ViewModel(array(
            'productList' => $this->getProductListTable()->fetchAll(),
            'form' => $form,
        ));
    }
    
    public function findAction()
    {
        $this->menu();
        $this->layout('layout/alternativelayout');
        $id = (int) $this->params()->fromRoute('id', 0);
        $form  = new NewProductList($this->getCategoryListTable()->fetchAll());
        $form->get('submit')->setAttribute('value', 'Vytvořit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $productList = new \Application\Model\ProductList;
            $form->setInputFilter($productList->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $productList->exchangeArray($form->getData());
                $this->getProductListTable()->saveProductList($productList);

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin', array(
                    'controller' => 'ProductList'
                ));
            }
        }
        return new ViewModel(array(
            'productList' => $this->getProductListTable()->getCategory($id),
            'form' => $form,
        ));
    }
    
    public function editAction()
    {
        $this->menu();
        $this->layout('layout/alternativelayout');
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('admin', array(
                'controller' => 'ProductList'
            ));
        }
        $productList = $this->getProductListTable()->getProductList($id);

        $form  = new NewProductList($this->getCategoryListTable()->fetchAll());
        $form->bind($productList);
        $form->get('submit')->setAttribute('value', 'Editovat');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($productList->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getProductListTable()->saveProductList($form->getData());

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin', array(
                    'controller' => 'ProductList'
                ));
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('admin', array(
                'controller' => 'productList'
            ));
        }
        $this->getProductListTable()->deleteProductList($id);
        return $this->redirect()->toRoute('admin', array(
            'controller' => 'ProductList'
        ));
    }
    
    public function publishAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->getProductListTable()->published($id);
        return $this->redirect()->toRoute('admin', array(
            'controller' => 'productList',
            'action' => 'index'
        ));
    }
    
    public function getProductListTable()
    {
        if (!$this->productList) {
            $sm = $this->getServiceLocator();
            $this->productList = $sm->get('Application\Model\ProductListTable');
        }
        return $this->productList;
    }
}

?>
