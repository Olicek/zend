<?php
namespace Admin\Form;

use Zend\Form\Form;

class SignIn extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('sign');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Přihlašovací jméno:',
            ),
        ));
        
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type'  => 'password',
            ),
            'options' => array(
                'label' => 'Heslo',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }
}
