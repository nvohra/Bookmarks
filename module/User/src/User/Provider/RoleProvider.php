<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 06/03/2015
 * Time: 18:50
 */

namespace User\Provider;


use TrascastroACL\Provider\RoleProviderInterface;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Authentication\AuthenticationService;

class RoleProvider implements RoleProviderInterface
{
    /**
     * @var AuthenticationService
     */
    private $authenticationService;

    /**
     * @param AuthenticationServiceInterface $authenticationService
     */
    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * @return String
     */
    public function getUserRole()
    {
        return ($identity = $this->authenticationService->getIdentity()) ? $identity->role : 'guest';
    }
}