<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2015
 */
return [
    'other' =>
    [
        'items' =>
        [
            [
                "label"     => "Логи",
                "img"       => ['\skeeks\cms\logDbTarget\assets\LogDbTargetAsset', 'icons/log.png'],

                'items' =>
                [
                    [
                        "label"     => "Логи",
                        "url"       => ["logDbTarget/admin-log-db-target"],
                        "img"       => ['\skeeks\cms\logDbTarget\assets\LogDbTargetAsset', 'icons/log.png'],
                    ],

                    [
                        "label" => "Настройки",
                        "url"   => ["cms/admin-settings", "component" => 'skeeks\cms\LogDbTarget\components\LogDbTargetSettings'],
                        "img"       => ['\skeeks\cms\modules\admin\assets\AdminAsset', 'images/icons/settings.png'],
                    ],

                ]
            ],
        ]
    ]
];