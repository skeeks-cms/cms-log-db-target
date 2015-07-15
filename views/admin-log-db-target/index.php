<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.06.2015
 */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */



$controll = [
    'class'         => \skeeks\cms\modules\admin\grid\ActionColumn::className(),
    'controller'    => $controller
];

if ($isOpenNewWindow)
{
    $controll['isOpenNewWindow'] = true;
}
?>

<?= \skeeks\cms\modules\admin\widgets\GridViewHasSettings::widget([
    'dataProvider'  => $dataProvider,
    'filterModel'   => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        $controll,
        [
            'attribute' => 'level'
        ],
        [
            'attribute' => 'category'
        ],
        [
            'attribute' => 'prefix'
        ],
        [
            'class'         => \skeeks\cms\grid\DateTimeColumnData::className(),
            'attribute'     => 'log_time'
        ],

    ],
]); ?>
