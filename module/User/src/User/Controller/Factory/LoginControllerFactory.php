<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 10/03/2015
 * Time: 16:25
 */

namespace User\Controller\Factory;

use User\Controller\LoginController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginControllerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $authenticationService = $sm->get('User\Service\Authentication');
        $form = $sm->get('User\Form\Login');

        return new LoginController($authenticationService, $form);
    }
}