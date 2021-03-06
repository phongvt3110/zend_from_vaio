<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'admin_home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/admin',
                    'route'    => '/admin/',
                    'defaults' => [
                        'controller' => Controller\AdminController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'admin_actions' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\AdminController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'album_home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/album',
                    'route'    => '/album/',
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'album_actions' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/album[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\AdminController::class => InvokableFactory::class
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/adminlayout'      => __DIR__ . '/../view/layout/adminlayout.phtml',
            'layout/admin2layout'      => __DIR__ . '/../view/layout/admin2layout.phtml',
            'admin/admin/index'       => __DIR__ . '/../view/admin/index/index.phtml',
            'admin/admin/home'        => __DIR__ . '/../view/admin/home/home.phtml',
            'admin/album/index'       => __DIR__ . '/../view/album/index/index.phtml',
            'admin/album/add'         => __DIR__ . '/../view/album/add/add.phtml',
            'admin/album/edit'        => __DIR__ . '/../view/album/edit/edit.phtml',
            'admin/album/delete'      => __DIR__ . '/../view/album/delete/delete.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
