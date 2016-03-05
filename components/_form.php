<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 27.03.2015
 */
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\LogDbTarget\components\LogDbTargetSettings */
?>

<?= $form->fieldSet('Настройки логирования'); ?>

    <?= $form->fieldRadioListBoolean($model, 'enabled'); ?>

    <?= $form->field($model, 'levels')->checkboxList(\skeeks\cms\LogDbTarget\components\LogDbTargetSettings::$levelMap); ?>

    <?= $form->field($model, 'logVars')->checkboxList([
        '_GET' => '_GET',
        '_POST' => '_POST',
        '_FILES' => '_FILES',
        '_COOKIE' => '_COOKIE',
        '_SESSION' => '_SESSION',
        '_SERVER' => '_SERVER',
    ]); ?>

    <?= $form->field($model, 'exceptString')->textarea(); ?>
    <?= $form->field($model, 'categoriesString')->textarea(); ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet('Чистка логов'); ?>
    <?= $form->fieldInputInt($model, 'storeLogsTime')->hint('Если не хотите чтобы логи удалилсь вообще, установите значение 0.'); ?>
<?= $form->fieldSetEnd(); ?>



