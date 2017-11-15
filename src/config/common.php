<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.06.2015
 */
return [

    'components' => [
        'cmsAgent' => [
            'commands' => [

                'logDbTarget/agents/clear-logs' => [
                    'class' => \skeeks\cms\agent\CmsAgent::class,
                    'name' => ['skeeks/logdb/app', 'Cleaning mysql logs'],
                    'interval' => 3600*3,
                ],

            ]
        ],
    ],
];