<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
return [

    'bootstrap' => ['log'],

    'components' => [

        'i18n' => [
            'translations' => [
                'skeeks/logdb/app' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/logDbTarget/messages',
                    'fileMap'  => [
                        'skeeks/logdb/app' => 'app.php',
                    ],
                ],
            ],
        ],

        'cmsAgent' => [
            'commands' => [

                'logDbTarget/agents/clear-logs' => [
                    'class'    => \skeeks\cms\agent\CmsAgent::class,
                    'name'     => ['skeeks/logdb/app', 'Cleaning mysql logs'],
                    'interval' => 3600 * 3,
                ],

            ],
        ],

        'log' => [
            'targets' => [
                [
                    'class' => 'skeeks\cms\logDbTarget\LogDbTarget',
                ],
            ],
        ],

        'logDbTargetSettings' => [
            'class' => 'skeeks\cms\logDbTarget\components\LogDbTargetSettings',
        ],
    ],

    'modules' => [
        'logDbTarget' => [
            'class' => '\skeeks\cms\logDbTarget\Module',
        ],
    ],

];