<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 06/03/2015
 * Time: 18:56
 */

namespace User\Provider\Factory;

use User\Provider\RoleProvider;

class RoleProviderFactory
{
    public function __invoke($serviceLocator)
    {
        $authenticationService = $serviceLocator->get('User\Service\Authentication');

        return new RoleProvider($authenticationService);
    }
}