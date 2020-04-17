<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\logDbTarget\controllers;

use skeeks\cms\backend\controllers\BackendModelStandartController;
use skeeks\cms\grid\DateTimeColumnData;
use skeeks\cms\logDbTarget\models\LogDbTargetModel;
use skeeks\yii2\form\fields\SelectField;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminLogDbTargetController extends BackendModelStandartController
{
    public function init()
    {
        $this->name = \Yii::t('skeeks/logdb/app', "Managing logs");
        $this->modelShowAttribute = "id";
        $this->modelClassName = LogDbTargetModel::className();

        $this->generateAccessActions = false;
        $this->accessCallback = function () {
            if (!\Yii::$app->skeeks->site->is_default) {
                return false;
            }
            return \Yii::$app->user->can($this->uniqueId);
        };

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                "filters" => [
                    'visibleFilters' => [
                        'level',
                        'category',
                        'message',
                        'log_time',
                    ],

                    'filtersModel' => [
                        'fields' => [
                            'level' => [
                                'field' => [
                                    'class' => SelectField::class,
                                    'items' => [
                                        \yii\log\Logger::LEVEL_ERROR         => 'error',
                                        \yii\log\Logger::LEVEL_WARNING       => 'warning',
                                        \yii\log\Logger::LEVEL_INFO          => 'info',
                                        \yii\log\Logger::LEVEL_TRACE         => 'trace',
                                        \yii\log\Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
                                        \yii\log\Logger::LEVEL_PROFILE_END   => 'profile end',
                                    ],
                                ],
                            ],
                        ],
                    ],

                ],
                'grid'    => [
                    'defaultOrder'   => [
                        'log_time' => SORT_DESC,
                    ],
                    'visibleColumns' => [
                        'checkbox',
                        'actions',
                        'level',
                        'category',
                        'log_time',
                        'prefix',
                        'message',
                    ],
                    'columns'        => [
                        'log_time' => [
                            'class' => DateTimeColumnData::class,
                        ],
                        'level'    => [
                            'value' => function ($model) {
                                return \yii\log\Logger::getLevelName($model->level);
                            },
                        ],
                        'message'  => [
                            'value' => function ($model) {
                                return "<pre><code>".substr(\yii\helpers\Html::encode($model->message), 0, 1000).'</code></pre>';
                            },
                        ],
                    ],
                ],
            ],
            /*"create" => [
                'fields' => [$this, 'updateFields'],
            ],
            "update" => [
                'fields' => [$this, 'updateFields'],
            ],*/
        ]);
    }
}