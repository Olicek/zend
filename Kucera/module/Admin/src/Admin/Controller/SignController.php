<?php

namespace Admin\Controller;
use Admin\Form\SignIn;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Db\Adapter\Adapter;
use Zend\Authentication\AuthenticationService;
use Zend\Session\Container;
/**
 * Description of SignController
 *
 * @author Pracovna
 */
class SignController extends \Application\Controller\BaseController
{
    
    private $user;
    public function indexAction()
    {
        
        if ($this->identity) {
            return $this->redirect()->toRoute('home');
        }
        $this->menu();
        $form  = new SignIn();
        $form->get('submit')->setAttribute('value', 'Přihlásit se');
        
        $error = array();
        $auth = new AuthenticationService();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $data = $form->getData();

                $db = new Adapter(array(
                    'driver' => 'Pdo_Mysql',
                    'database' => 'kucera',
                    'username' => 'root',
                    'password' => ''
                 ));
                $authAdapter = new AuthAdapter($db);
                
                $authAdapter
                    ->setTableName('zam_users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('password');
                
                $authAdapter
                    ->setIdentity($data['name'])
                    ->setCredential($this->calculateHash($data['password']));

                
                $result = $auth->authenticate($authAdapter);

                if (!$result->isValid()) {
                    foreach ($result->getMessages() as $message) {
                        $error =  "$message\n";
                    }
                } else {
//                  // store the identity as an object where only the username and
                    // real_name have been returned
                    $storage = $auth->getStorage();

                    // store the identity as an object where the password column has
                    // been omitted
                    $storage->write($authAdapter->getResultRowObject(
                        null,
                        'password'
                    ));
                    $this->flashMessenger()->addMessage('Byl jste úspěšně přihlášen!');
                    return $this->redirect()->toRoute('home');
                }
                print_r($authAdapter->getResultRowObject());  
            }
        }
        return array('form' => $form, 'error' => $error);
    }
    
    public function logOutAction()
    {
        $this->auth->clearIdentity();
        $this->flashMessenger()->addMessage('Byl jste odhlášen!');
        return $this->redirect()->toRoute('home');
    }
    
    public function calculateHash($password)
    {
        return hash('sha512', $password);
    }
    
    public function getUserTable()
    {
        if (!$this->user) {
            $sm = $this->getServiceLocator();
            $this->user = $sm->get('Application\Model\ProductTable');
        }
        return $this->user;
    }
}

?>
