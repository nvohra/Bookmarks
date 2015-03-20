<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 11/03/2015
 * Time: 16:18
 */

namespace User\Service;


use Zend\Authentication\Storage\Session;

class AuthenticationStorageService extends Session
{
    public function setRememberMe($rememberMe = 0, $time = 2592000)
    {
        if ($rememberMe == 1) {
            $this->session->getManager()->rememberMe($time);
        }
    }

    public function forgetMe()
    {
        $this->session->getManager()->forgetMe();
    }
}