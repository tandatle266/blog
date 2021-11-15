<?php
    return  [
        [
            'label' => 'dashboard',
            'route' => 'admin.index',
            'icon' => 'fa-home',
        ],
        [
            'label' => 'Post',
            'route' => 'post.index',
            'icon' => 'fa-blog',
            'items' => [
                [
                    'label' => 'All Post ',
                    'route' => 'post.index',
                ],
                [
                    'label' => 'Add Post ',
                    'route' => 'post.create',
                ]
            ]
        ],
        [
                'label' => 'Media',
                'route' => 'image.index',
                'icon' => 'fa-media',
                'items' =>[
                    [
                        'label' => 'All Media ',
                        'route' => 'image.index',
                    ],
                    [
                        'label' => 'Add Media ',
                        'route' => 'image.create',
                    ]
            ]
        ],[
                'label' => 'Comment',
                'route' => 'comment.index',
                'icon' => 'fa-list',
                'items' =>[
                    [
                        'label' => 'All Comment ',
                        'route' => 'comment.index',
                    ],
                    [
                        'label' => 'Create comment ',
                        'route' => 'comment.create',
                    ]
            ]
        ],[
                'label' => 'Export/Import',
                'route' => 'admin.export',
                'icon' => '',
        ],[
                'label' => 'Rule',
                'route' => 'role.index',
                'icon' => '',
        ]
    ]

?>