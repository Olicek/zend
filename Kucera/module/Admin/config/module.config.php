<?php

// module/Admin/conﬁg/module.conﬁg.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Index' => 'Admin\Controller\IndexController',
            'User' => 'Admin\Controller\UserController',
            'Category' => 'Admin\Controller\CategoryController',
            'ProductList' => 'Admin\Controller\ProductListController',
            'Product' => 'Admin\Controller\ProductController',
            'Sign' => 'Admin\Controller\SignController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/admin/[:controller][/:action][/:id]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                       // 'controller' => 'Admin\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_map' => array(
            'layout/alternativelayout'           => __DIR__ . '/../view/layout/alternativelayout.phtml',
        ),
        'template_path_stack' => array(
            'admin' => __DIR__ . '/../view',
        ),
    ),
);