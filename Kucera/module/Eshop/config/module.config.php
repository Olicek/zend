<?php

// module/Eshop/conﬁg/module.conﬁg.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'Eshop\Controller\Index' => 'Eshop\Controller\IndexController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'eshop' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/eshop[/:action][/:id]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Eshop\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'eshop' => __DIR__ . '/../view',
        ),
    ),
);