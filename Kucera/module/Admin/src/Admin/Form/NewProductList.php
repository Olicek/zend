<?php
namespace Admin\Form;

use Zend\Form\Form;

class NewProductList extends Form
{
    public function __construct($categoryList, $name = null)
    {
        // we want to ignore the name passed
        parent::__construct('productList');

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
                'label' => 'Nová kategorie',
            ),
        ));
        $myCategory = array();
        foreach ($categoryList as $category) {
            $myCategory[$category->id] = $category->title;
        }
        $this->add(array(
             'type' => 'Zend\Form\Element\Select',
             'name' => 'categorylist_id',
             'options' => array(
                 'label' => 'Kategorie',
                 'value_options' => $myCategory,
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
