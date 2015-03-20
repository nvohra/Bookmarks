<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'user\user\index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/user/',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'index',
                        'roles'      => ['admin', 'user'],
                    ),
                ),
                'may_terminate' => true, //parent route can be alone
                'child_routes' => array(
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => 'page/[:page]/',
                            'constraints' => array(
                                'page' => '[0-9]+',
                            ),
                        ),
                    ),
                ),
            ),
            'user\user\view' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/user/view/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'view',
                        'roles'      => ['admin', 'user'],
                    ),
                ),
            ),
            'user\user\create' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/admin/user/create/',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'create',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'user\user\doCreate' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/admin/user/do-create/',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'doCreate',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'user\user\delete' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/user/delete/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'delete',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'user\user\update' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/user/update/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'update',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'user\user\doUpdate' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/admin/user/do-update/',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'doUpdate',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'user\login\login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login/',
                    'defaults' => array(
                        'controller' => 'User\Controller\Login',
                        'action'     => 'login',
                        'roles'      => ['guest'],
                    ),
                ),
            ),
            'user\login\doLogin' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/do-login/',
                    'defaults' => array(
                        'controller' => 'User\Controller\Login',
                        'action'     => 'doLogin',
                        'roles'      => ['guest'],
                    ),
                ),
            ),
            'user\login\logout' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/logout/',
                    'defaults' => array(
                        'controller' => 'User\Controller\Login',
                        'action'     => 'logout',
                        'roles'      => ['admin', 'user'],
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'aliases' => array(
            'Zend\Authentication\AuthenticationService' => 'User\Service\Authentication', // needed for identity plugin
        ),
        'factories' => array(
            'UserDao' => 'User\Model\Factory\UserDaoFactory',
            'User\Service\AuthenticationStorage'    => 'User\Service\Factory\AuthenticationStorageServiceFactory',
            'User\Service\Authentication'           => 'User\Service\Factory\AuthenticationServiceFactory',
            'UserForm' => 'User\Form\Factory\UserFormFactory',
            'User\Provider\RoleProvider' => 'User\Provider\Factory\RoleProviderFactory',
            'User\Form\Login' => 'User\Form\Factory\LoginFormFactory',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            //'User\Controller\Index' => 'User\Controller\IndexController,
        ),
        'factories' => array(
            'User\Controller\User'  => 'User\Controller\Factory\UserControllerFactory',
            'User\Controller\Login' => 'User\Controller\Factory\LoginControllerFactory',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            //'layout/layout'        => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'            => __DIR__ . '/../view/error/404.phtml',
            'error/index'          => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
