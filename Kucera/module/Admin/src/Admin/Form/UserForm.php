<?php
namespace Admin\Form;

use Zend\Form\Form;

class UserForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('user');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Přihlašovací jméno',
            ),
        ));

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Celé jméno',
            ),
        ));
        
        $this->add(array(
             'type' => 'Zend\Form\Element\Select',
             'name' => 'role',
             'options' => array(
                 'label' => 'Role',
                 'value_options' => array(
                     'guest' => 'Návštěvník',
                     'registered' => 'Registrovaný',
                     'moderator' => 'Moderátor',
                     'administrator' => 'Administrátor',
                 ),
             )
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
