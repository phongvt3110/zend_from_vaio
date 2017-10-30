<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Frontend;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'frontend_root' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'route'    => '/frontend/',
                    'defaults' => [
                        'controller' => Controller\FrontendController::class,
                        'action'     => 'index'
                    ]
                ]
            ],
            'frontend_actions' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/frontend[/:action]',
                    'defaults' => [
                        'controller' => Controller\FrontendController::class,
                        'action'     => 'index'
                    ]
                ]
            ],
            'product_home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/product',
                    'route' => '/product/',
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'index'
                    ]
                ]
            ],
            'product_actions' => [
                'type'     => Segment::class,
                'options'  => [
                    'route'     => '/product[/:action]',
                    'defaults'  =>  [
                        'controller'  => Controller\ProductController::class,
                        'action'      => 'index'
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\FrontendController::class => InvokableFactory::class,
            Controller\ProductController::class  => InvokableFactory::class
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'frontend/frontend/index'       => __DIR__ . '/../view/frontend/index/index.phtml',
            'frontend/frontend/home'        => __DIR__ . '/../view/frontend/home/home.phtml',
            'frontend/frontend/products'    => __DIR__ . '/../view/frontend/products/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'frontend/product/index'   => __DIR__ . '../view/product/index/index.phtml',
            'frontend/product/add'     => __DIR__ . '../view/product/add/add.phtml',
            'frontend/product/find'     => __DIR__ . '../view/product/find/find.phtml',
            'frontend/product/details'  => __DIR__ . '../view/product/details/details.phtml',
            'frontend/product/delete'   => __DIR__ . '../view/product/delete/delele.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
