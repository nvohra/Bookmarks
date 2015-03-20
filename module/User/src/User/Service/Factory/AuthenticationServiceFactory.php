<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 11/03/2015
 * Time: 16:23
 */

namespace User\Service\Factory;


use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationServiceFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('database');

        $authAdapter = new CredentialTreatmentAdapter($adapter);
        $authAdapter
            ->setTableName('user')
            ->setIdentityColumn('email')
            ->setCredentialColumn('password')
            ->setCredentialTreatment('MD5(?)')
        ;

        $storage = $serviceLocator->get('User\Service\AuthenticationStorage');

        return new AuthenticationService($storage, $authAdapter);
    }
}