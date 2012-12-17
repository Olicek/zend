<?php

/**
 * Description of ContactForm
 *
 * @author Pracovna
 */
namespace Application\Form;

use Zend\Form\Form;

class ContactForm extends Form
{
    public function prepareElements()
    {
        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Vaše jméno:',
            ),
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Email',
            'name' => 'email',
            'options' => array(
                'label' => 'Vaše emailová adresa:',
            ),
        ));
        $this->add(array(
            'name' => 'subject',
            'options' => array(
                'label' => 'Předmět',
            ),
            'attributes' => array(
                'type'  => 'text',
            ),
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'message',
            'options' => array(
                'label' => 'Zpráva',
            ),
        ));
        $this->add(array(
            'name' => 'send',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Odeslat',
            ),
        ));

        // We could also define the input filter here, or
        // lazy-create it in the getInputFilter() method.
    }
}