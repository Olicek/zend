<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\ContactForm; 
use Zend\Mail;


class IndexController extends BaseController
{

    
    public function indexAction()
    {
        $this->menu();
        return array('myvar' => 'test');

    }
    
    public function aboutAction()
    {
        $date = $this->params()->fromRoute('date', 0);
        $this->menu();
        return new ViewModel(array('date' => $date));
    }
    
    public function contactAction()
    {
        $this->menu();
        $form = new ContactForm();
        $form->prepareElements();
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $mail = new Mail\Message();
//            $form->setInputFilter($album->getInputFilter());
//            $form->setData($request->getPost());

            if ($form->isValid()) {
                $mail = new Mail\Message();
                $mail->setBody('This is the text of the email.');
                $mail->setFrom('Freeaqingme@example.org', 'Sender\'s name');
                $mail->addTo('Matthew@example.com', 'Name o. recipient');
                $mail->setSubject('TestSubject');

                $transport = new Mail\Transport\Sendmail();
                $transport->send($mail);

                // Redirect to list of albums
                return $this->redirect()->toRoute('application');
            }
        }
        return array('form' => $form);
    }
}
