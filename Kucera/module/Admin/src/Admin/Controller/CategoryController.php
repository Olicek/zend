<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Admin\Form\NewCategory;    

/**
 * Description of UserController
 *
 * @author Pracovna
 */
class CategoryController extends SecuredController
{
    private $category;
    
    public function indexAction() {
        $this->menu();
        $this->layout('layout/alternativelayout');
        $form  = new NewCategory();
        $form->get('submit')->setAttribute('value', 'Vytvořit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $category = new \Application\Model\CategoryList;
            $form->setInputFilter($category->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $category->exchangeArray($form->getData());
                $this->getCategoryListTable()->saveCategory($category);

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin', array(
                    'controller' => 'category'
                ));
            }
        }
        return new ViewModel(array(
            'categories' => $this->getCategoryListTable()->fetchAll(),
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
                'controller' => 'category'
            ));
        }
        $category = $this->getCategoryListTable()->getCategory($id);

        $form  = new NewCategory();
        $form->bind($category);
        $form->get('submit')->setAttribute('value', 'Editovat');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($category->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getCategoryListTable()->saveCategory($form->getData());

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin', array(
                    'controller' => 'category'
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
                'controller' => 'category'
            ));
        }
        $this->getCategoryListTable()->deleteCategory($id);
        return $this->redirect()->toRoute('admin', array(
            'controller' => 'category'
        ));
    }
    
    public function publishAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $this->getCategoryListTable()->published($id);
        return $this->redirect()->toRoute('admin', array(
            'controller' => 'category',
            'action' => 'index'
        ));
    }
    
    public function getCategoryTable()
    {
        if (!$this->category) {
            $sm = $this->getServiceLocator();
            $this->category = $sm->get('Application\Model\categoryListTable');
        }
        return $this->category;
    }
}

?>
