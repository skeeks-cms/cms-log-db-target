<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 27.03.2015
 */
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\LogDbTarget\components\LogDbTargetSettings */
?>

<?= $form->fieldSet(\Yii::t('skeeks/logdb/app', 'Logging options')); ?>

<?= $form->fieldRadioListBoolean($model, 'enabled'); ?>

<?= $form->field($model, 'levels')->checkboxList(\skeeks\cms\LogDbTarget\components\LogDbTargetSettings::$levelMap); ?>

<?= $form->field($model, 'logVars')->checkboxList([
    '_GET'     => '_GET',
    '_POST'    => '_POST',
    '_FILES'   => '_FILES',
    '_COOKIE'  => '_COOKIE',
    '_SESSION' => '_SESSION',
    '_SERVER'  => '_SERVER',
]); ?>

<?= $form->field($model, 'exceptString')->textarea(); ?>
<?= $form->field($model, 'categoriesString')->textarea(); ?>
<?= $form->field($model, 'exportInterval'); ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet(\Yii::t('skeeks/logdb/app', 'Cleaning logs')); ?>
<?= $form->fieldInputInt($model, 'storeLogsTime')->hint(\Yii::t('skeeks/logdb/app', 'If you do not want to deleted all logs, set to 0.')); ?>
<?= $form->fieldSetEnd(); ?>



