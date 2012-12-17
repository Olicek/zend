<?php

namespace Admin\Controller;

/**
 * Description of SecuredController
 *
 * @author Pracovna
 */
class SecuredController extends \Application\Controller\BaseController {
    
    public function dispatch(\Zend\Stdlib\RequestInterface $request, \Zend\Stdlib\ResponseInterface $response = null) {
        parent::dispatch($request, $response);
        if(!$this->identity)
        {
            $this->flashMessenger()->addMessage('Nemáte povolení do administrátorské sekce!');
            return $this->redirect()->toRoute('home');
        }
    }
}

?>
