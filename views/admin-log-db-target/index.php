<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.06.2015
 */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?= \skeeks\cms\modules\admin\widgets\GridViewStandart::widget([
    'dataProvider'  => $dataProvider,
    'filterModel'   => $searchModel,
    'adminController'   => $controller,
    'columns' => [
        [
            'attribute' => 'level',
            'value'         => function($model)
            {
                return \yii\log\Logger::getLevelName($model->level);
            },
            'filter' => [
                \yii\log\Logger::LEVEL_ERROR => 'error',
                \yii\log\Logger::LEVEL_WARNING => 'warning',
                \yii\log\Logger::LEVEL_INFO => 'info',
                \yii\log\Logger::LEVEL_TRACE => 'trace',
                \yii\log\Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
                \yii\log\Logger::LEVEL_PROFILE_END => 'profile end',
            ]
        ],
        [
            'attribute' => 'category'
        ],
        [
            'attribute' => 'prefix',
            'visible' => false
        ],
        [
            'class'         => \skeeks\cms\grid\DateTimeColumnData::className(),
            'attribute'     => 'log_time'
        ],

        [
            'class'         => \yii\grid\DataColumn::className(),
            'value'         => function($model)
            {
                return "<pre><code>" . substr(\yii\helpers\Html::encode($model->message), 0, 200) . '</code></pre>';
            },
            'attribute'     => 'message',
            'format'        => 'raw'
        ],

    ],
]); ?>
