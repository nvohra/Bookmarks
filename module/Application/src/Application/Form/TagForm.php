<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 12/03/2015
 * Time: 22:34
 */

namespace Application\Form;


use Zend\Form\Form;

class TagForm extends Form
{
    function __construct($name = null)
    {
        parent::__construct();

        $this->setName('Tag');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));

        $this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'attribute' => array(
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attribute' => array(
                'required' => 'submitbutton',
            ),
        ));
    }
}