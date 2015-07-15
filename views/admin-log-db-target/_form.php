<?php
use yii\helpers\Html;
use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;
/* @var $this yii\web\View */
/* @var $action \skeeks\cms\modules\admin\actions\modelEditor\AdminOneModelEditAction */
/* @var $model \skeeks\modules\cms\form2\models\Form2FormSend */
?>
<?=
\yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'level',
        'category',
        [
            'attribute' => 'log_time',
            'value' => \Yii::$app->formatter->asDatetime($model->log_time, 'full') . " (" . \Yii::$app->formatter->asRelativeTime($model->log_time) . ")"
        ],
        'prefix',
        [
            'attribute'     => 'message',
            'format'        => 'html',
            'value'         => "<pre>" . $model->message . "</pre>"
        ],
    ],
])
?>