<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.06.2015
 */
return [
    'components' =>
    [
        'log' => [
            'targets' => [
                [
                    'class'     => 'skeeks\cms\LogDbTarget\LogDbTarget',
                    'logVars'   => [],
                    'levels' => [
                        'error',
                        'warning'
                    ],
                ],
            ],
        ]
    ],

    'modules' =>
    [
        'LogDbTarget' => [
            'class'         => '\skeeks\cms\LogDbTarget\Module',
        ]
    ]
];