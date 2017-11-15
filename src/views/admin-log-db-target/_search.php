<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 26.05.2016
 */

?>
<? $form = \skeeks\cms\modules\admin\widgets\filters\AdminFiltersForm::begin([
    'action' => '/' . \Yii::$app->request->pathInfo,
]); ?>

    <?/*= $form->field($searchModel, 'name')->setVisible(true)->textInput([
        'placeholder' => \Yii::t('skeeks/cms', 'Search by name')
    ]) */?>

    <?= $form->field($searchModel, 'level')->listBox(\yii\helpers\ArrayHelper::merge(['' => 'Все'], [
            \yii\log\Logger::LEVEL_ERROR => 'error',
            \yii\log\Logger::LEVEL_WARNING => 'warning',
            \yii\log\Logger::LEVEL_INFO => 'info',
            \yii\log\Logger::LEVEL_TRACE => 'trace',
            \yii\log\Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
            \yii\log\Logger::LEVEL_PROFILE_END => 'profile end',
        ]), ['size' => 1])->setVisible(); ?>

    <?= $form->field($searchModel, 'category'); ?>
    <?= $form->field($searchModel, 'message'); ?>

<? $form::end(); ?>
