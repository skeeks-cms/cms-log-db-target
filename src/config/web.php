<?php
return [
    'components' => [
        'backendAdmin' => [
            'menu' => [
                'data' => [
                    'other' => [
                        'items' => [
                            [
                                "name"  => ['skeeks/logdb/app', 'Logs'],
                                "image" => ['\skeeks\cms\logDbTarget\assets\LogDbTargetAsset', 'icons/log.png'],

                                'items' => [
                                    [
                                        "name"  => ['skeeks/logdb/app', 'Logs'],
                                        "url"   => ["logDbTarget/admin-log-db-target"],
                                        "image" => ['\skeeks\cms\logDbTarget\assets\LogDbTargetAsset', 'icons/log.png'],
                                    ],

                                    [
                                        "name"  => ['skeeks/logdb/app', 'Settings'],
                                        "url"   => ["cms/admin-settings", "component" => 'skeeks\cms\LogDbTarget\components\LogDbTargetSettings'],
                                        "image" => ['\skeeks\cms\assets\CmsAsset', 'images/icons/settings-big.png'],
                                    ],

                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];