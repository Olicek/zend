<?php
namespace Admin\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class NewProduct extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('category');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Nový produkt',
            ),
        ));
        
        $this->add(array(
            'name' => 'description',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Popis produktu',
            ),
        ));
        
        $this->add(array(
            'name' => 'text',
            'attributes' => array(
                'type'  => 'textarea',
            ),
            'options' => array(
                'label' => 'Text',
            ),
        ));
        
        $this->add(array(
            'name' => 'price',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Cena',
            ),
        ));
        
        $this->add(new Element\Csrf('security'));

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
