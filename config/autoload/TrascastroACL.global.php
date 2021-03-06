<?php
/**
 * (c) Ismael Trascastro <i.trascastro@gmail.com>
 *
 * @link        https://github.com/itrascastro/TrascastroACL
 * @copyright   Copyright (c) Ismael Trascastro. (http://www.ismaeltrascastro.com)
 * @license     MIT License - http://en.wikipedia.org/wiki/MIT_License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * ----------------
 * Usage
 * ----------------
 *
 * 'guest' role is mandatory, feel free to add any other role
 *
 * In the forbidden key you have to put the controller and the action where a non allowed access will be redirected to
 *
 */

return [
    'TrascastroACL' => [
        'roles' => [
            'guest',
            'user',
            'admin',
        ],
        'forbidden' => [
            'controller'    => 'user\login\login',
            'action'        => 'forbidden',
        ],
        'role_provider' => 'User\Provider\RoleProvider',
    ],
];
