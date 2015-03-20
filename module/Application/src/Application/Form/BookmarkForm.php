<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 13/03/2015
 * Time: 16:28
 */

namespace Application\Form;



use Zend\Form\Form;

class BookmarkForm extends Form
{
    function __construct($name = null)
    {
        parent::__construct();

        $this->setName('Bookmark');
        $this->setAttribute('method','post');

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden',
        ));
        $this->add(array(
            'name' => 'date',
            'type' => 'hidden',
        ));
        $this->add(array(
            'name' => 'url',
            'type' => 'Url',
            'attribute' => array(
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'attribute' => array(
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'description',
            'type' => 'Text',
            'attribute' => array(
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'votes',
            'type' => 'Number',
            'attribute' => array(
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'idUser',
            'type' => 'Number',
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