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
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'application\tag\index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/tag/',
                    'defaults' => array(
                        'controller' => 'Application\Tag\Controller',
                        'action'     => 'index',
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
            'application\tag\create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/tag/create/',
                    'defaults' => array(
                        'controller' => 'Application\Tag\Controller',
                        'action'     => 'create',
                    ),
                ),
            ),
            'application\tag\doCreate' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/tag/do-create/',
                    'defaults' => array(
                        'controller' => 'Application\Tag\Controller',
                        'action'     => 'doCreate',
                    ),
                ),
            ),
            'application\tag\delete' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/tag/delete/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Tag\Controller',
                        'action'     => 'delete',
                    ),
                ),
            ),
            'application\tag\update' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/tag/update/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Tag\Controller',
                        'action'     => 'update',
                    ),
                ),
            ),
            'application\tag\doUpdate' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/tag/do-update/',
                    'defaults' => array(
                        'controller' => 'Application\Tag\Controller',
                        'action'     => 'doUpdate',
                    ),
                ),
            ),
            'application\tag\view' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/tag/view/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Tag\Controller',
                        'action'     => 'view',
                    ),
                ),
            ),
            'application\bookmark\index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/bookmark/',
                    'defaults' => array(
                        'controller' => 'Application\Bookmark\Controller',
                        'action'     => 'index',
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
            'application\bookmark\create' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/bookmark/create/',
                    'defaults' => array(
                        'controller' => 'Application\Bookmark\Controller',
                        'action'     => 'create',
                    ),
                ),
            ),
            'application\bookmark\doCreate' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/bookmark/do-create/',
                    'defaults' => array(
                        'controller' => 'Application\Bookmark\Controller',
                        'action'     => 'doCreate',
                    ),
                ),
            ),
            'application\bookmark\delete' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/bookmark/delete/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Bookmark\Controller',
                        'action'     => 'delete',
                    ),
                ),
            ),
            'application\bookmark\update' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/bookmark/update/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Bookmark\Controller',
                        'action'     => 'update',
                    ),
                ),
            ),
            'application\bookmark\doUpdate' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/admin/bookmark/do-update/',
                    'defaults' => array(
                        'controller' => 'Application\Bookmark\Controller',
                        'action'     => 'doUpdate',
                    ),
                ),
            ),
            'application\bookmark\view' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/admin/bookmark/view/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Bookmark\Controller',
                        'action'     => 'view',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
//            'application' => array(
//                'type'    => 'Literal',
//                'options' => array(
//                    'route'    => '/application',
//                    'defaults' => array(
//                        '__NAMESPACE__' => 'Application\Controller',
//                        'controller'    => 'Index',
//                        'action'        => 'index',
//                    ),
//                ),
//                'may_terminate' => true,
//                'child_routes' => array(
//                    'default' => array(
//                        'type'    => 'Segment',
//                        'options' => array(
//                            'route'    => '/[:controller[/:action]]',
//                            'constraints' => array(
//                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
//                            ),
//                            'defaults' => array(
//                            ),
//                        ),
//                    ),
//                ),
//            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'database' => 'Zend\Db\Adapter\AdapterServiceFactory',
            'TagDao'   => 'Application\Model\Factory\TagDaoFactory',
            'TagForm'  => 'Application\Form\Factory\TagFormFactory',
            'BookmarkDao'   => 'Application\Model\Factory\BookmarkDaoFactory',
            'BookmarkForm' => 'Application\Form\Factory\BookmarkFormFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Tag' => 'Application\Controller\TagController',
            'Application\Controller\Bookmark' => 'Application\Controller\BookmarkController',
        ),
        'factories' => array(
            'Application\Tag\Controller' => 'Application\Controller\Factory\TagControllerFactory',
            'Application\Bookmark\Controller' => 'Application\Controller\Factory\BookmarkControllerFactory',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'                    => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index'          => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'                        => __DIR__ . '/../view/error/404.phtml',
            'error/index'                      => __DIR__ . '/../view/error/index.phtml',
            'partial/form/tag'                 => __DIR__ . '/../view/partial/newTagForm.phtml',
            'partial/form/bookmark'            => __DIR__ . '/../view/partial/newBookmarkForm.phtml',
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
