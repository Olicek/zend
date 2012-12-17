<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Admin\Form\NewProduct;    
/**
 * Description of ProductController
 *
 * @author Pracovna
 */
class ProductController extends SecuredController
{
    private $image;


    public function indexAction() {
        $this->menu();
        $this->layout('layout/alternativelayout');
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('admin', array(
                'controller' => 'productList'
            ));
        }
        $form  = new NewProduct();
        $form->get('submit')->setAttribute('value', 'Vytvořit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $product = new \Application\Model\Product;
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $product->exchangeArray($form->getData());
                $this->getProductTable()->saveProduct($product, $id);

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin', array(
                    'controller' => 'product',
                    'action' => 'index',
                    'id' => $id
                ));
            }
        }
        return new ViewModel(array(
            'products' => $this->getProductTable()->getProductList($id),
            'productList' => $this->getProductListTable()->getProductList($id),
            'images' => $this->getImageTable()->fetchAll(),
            'id' => $id,
            'form' => $form,
        ));
    }
    
    public function detailAction()
    {
        $this->menu();
        $this->layout('layout/alternativelayout');
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('admin', array(
                'controller' => 'product'
            ));
        }
        $product = $this->getProductTable()->getProduct($id);

        $form  = new NewProduct();
        $form->bind($product);
        $form->get('submit')->setAttribute('value', 'Editovat');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($product->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getProductTable()->saveProduct($form->getData());

                return $this->redirect()->toRoute('admin', array(
                    'controller' => 'product',
                    'action' => 'detail',
                    'id' => $id
                ));
            }
        }
        return new ViewModel(array(
            'product' => $product,
            'images' => $this->getImageTable()->fetchAll(),
            'id' => $id,
            'form' => $form,
        ));
    }
    
    public function publishAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->getProductTable()->published($id);
        return $this->redirect()->toRoute('admin', array(
            'controller' => 'product',
            'action' => 'detail',
            'id' => $id
        ));
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('admin', array(
                'controller' => 'product'
            ));
        }
        $this->getProductTable()->deleteProduct($id);
        return $this->redirect()->toRoute('admin', array(
            'controller' => 'product'
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

?>
