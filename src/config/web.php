<?php
return [
    'components' => [
        'backendAdmin' => [
            'menu' => [
                'data' => [
                    'settings' => [
                        'items' => [
                            [
                                "name"  => ['skeeks/logdb/app', 'Logs'],
                                "url"   => ["logDbTarget/admin-log-db-target"],
                                "image" => ['\skeeks\cms\assets\CmsAsset', 'images/icons/admin-menu/activity.svg'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
