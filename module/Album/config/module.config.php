<?php
/**
 * Created by PhpStorm.
 * User: vallabh
 * Date: 9/30/15
 * Time: 10:19 AM
 */
return [
    'controllers'  => [
        'invokables' => [
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
        ],
    ],
    // The following section is new and should be added to your file
    'router'       => [
        'routes' => [
            'album' => [
                'type'    => 'segment',
                'options' => [
                    'route'       => '/album[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults'    => [
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];
