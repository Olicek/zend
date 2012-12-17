<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Admin\Form\UserForm;    

/**
 * Description of UserController
 *
 * @author Pracovna
 */
class UserController extends SecuredController
{
    private $user;
    
    public function indexAction() {
        $this->menu();
        $this->layout('layout/alternativelayout');
        return new ViewModel(array(
            'users' => $this->getUserTable()->fetchAll(),
        ));
    }
    
    public function editAction()
    {
        $this->menu();
        $this->layout('layout/alternativelayout');
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('admin', array(
                'controller' => 'user'
            ));
        }
        $user = $this->getUserTable()->getUser($id);

        $form  = new UserForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Editovat');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getUserTable()->saveUser($form->getData());

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin', array(
                    'controller' => 'user'
                ));
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }
    
    public function getUserTable()
    {
        if (!$this->user) {
            $sm = $this->getServiceLocator();
            $this->user = $sm->get('Application\Model\UserTable');
        }
        return $this->user;
    }
}

?>
