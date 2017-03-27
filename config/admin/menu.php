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
                "label"     => \Yii::t('skeeks/logdb/app', 'Logs'),
                "img"       => ['\skeeks\cms\logDbTarget\assets\LogDbTargetAsset', 'icons/log.png'],

                'items' =>
                [
                    [
                        "label"     => \Yii::t('skeeks/logdb/app', 'Logs'),
                        "url"       => ["logDbTarget/admin-log-db-target"],
                        "img"       => ['\skeeks\cms\logDbTarget\assets\LogDbTargetAsset', 'icons/log.png'],
                    ],

                    [
                        "label" => \Yii::t('skeeks/logdb/app', 'Settings'),
                        "url"   => ["cms/admin-settings", "component" => 'skeeks\cms\LogDbTarget\components\LogDbTargetSettings'],
                        "img"       => ['skeeks\cms\assets\CmsAsset', 'images/icons/settings.png'],
                    ],

                ]
            ],
        ]
    ]
];