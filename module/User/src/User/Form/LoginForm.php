<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 11/03/2015
 * Time: 16:08
 */

namespace User\Form;


use Zend\Form\Form;

class LoginForm extends Form
{
    function __construct($name = null)
    {
        parent::__construct();

        $this->setName('user');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-signin');

        $this->add(array(
            'name' => 'email',
            'type' => 'Email',
            'attributes' => array(
                'class'         => 'form-control',
                'required'      => 'required',
                'autofocus'     => 'autofocus',
                'placeholder'   => 'Email',
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'attributes' => array(
                'class'         => 'form-control',
                'required'      => 'required',
                'placeholder'   => 'Password',
            ),
        ));

        $this->add(array(
            'name' => 'rememberme',
            'type' => 'Checkbox',
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'id' => 'submitbutton',
                'class' => 'btn btn-lg btn-primary btn-block',
            ),
        ));
    }
}