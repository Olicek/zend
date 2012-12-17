<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;

/**
 * Description of AdminController
 *
 * @author Petr Olišar
 */
class IndexController extends SecuredController
{
    
    public function indexAction() {
        $this->menu();
        $this->layout('layout/alternativelayout');
        return new ViewModel();
    }
}