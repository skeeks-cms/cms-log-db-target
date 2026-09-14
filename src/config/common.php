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
                    'jobType' => 'log-db-target.clear-logs',
                    'class'    => \skeeks\cms\agent\CmsAgent::class,
                    'name'     => ['skeeks/logdb/app', 'Cleaning mysql logs'],
                    'interval' => 3600 * 3,
                ],

            ],
        ],

        'jobRegistry' => [
            'types' => [
                'log-db-target.clear-logs' => [
                    'type' => 'log-db-target.clear-logs',
                    'title' => 'Чистка mysql логов',
                    'handler' => \skeeks\cms\logDbTarget\jobs\LogCleanupJobHandler::class,
                    'queue' => 'maintenance',
                    'timeout' => 7200,
                    'leaseSeconds' => 120,
                    'maxAttempts' => 1,
                    'idempotent' => false,
                    'overlapPolicy' => 'skip',
                    'permission' => \skeeks\cms\rbac\CmsManager::PERMISSION_ROLE_ADMIN_ACCESS,
                    // This operation affects shared data across the installation's sites.
                    'resourceKey' => static function () { return 'log-db-target:clear-logs'; },
                    'dedupKey' => static function () { return 'log-db-target:clear-logs'; },
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

        'authManager' => [
            'config' => [
                'roles' => [
                    [
                        'name'  => \skeeks\cms\rbac\CmsManager::ROLE_ADMIN,
                        'child' => [
                            //Есть доступ к системе администрирования
                            'permissions' => [
                                "logDbTarget/admin-log-db-target",
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'modules' => [
        'logDbTarget' => [
            'class' => '\skeeks\cms\logDbTarget\Module',
        ],
    ],

];