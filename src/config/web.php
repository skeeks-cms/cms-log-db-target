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
                                "image" => ['\skeeks\cms\logDbTarget\assets\LogDbTargetAsset', 'icons/log.png'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];