<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 11/03/2015
 * Time: 15:49
 */

namespace User\Form\Factory;

use User\Form\InputFilter\LoginFormInputFilter;
use User\Form\LoginForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginFormFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new LoginForm();
        $inputFilter = new LoginFormInputFilter();
        $form->setInputFilter($inputFilter->getInputFilter());

        return $form;
    }
}