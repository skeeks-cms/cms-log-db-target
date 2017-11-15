<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 22.03.2016
 */
namespace skeeks\cms\logDbTarget\console\controllers;
use skeeks\cms\logDbTarget\models\LogDbTargetModel;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Массовая читска данных
 *
 * @package skeeks\cms\logDbTarget\console\controllers
 */
class FlushController extends Controller
{
    /**
     * Чистка логов старше чем (указать количество дней)
     * @param int $countDay количество дней
     */
    public function actionLogs($countDay = 5)
    {
        if ($count = LogDbTargetModel::find()->where(['<=', 'log_time', time() - 3600*24*$countDay])->count())
        {
            $this->stdout("Total logs found: {$count}\n", Console::BOLD);
            $totalDeleted = LogDbTargetModel::deleteAll(['<=', 'log_time', time() - 3600*24*$countDay]);
            $this->stdout("Total deleted: {$totalDeleted}\n");
        } else
        {
            $this->stdout("Нечего удалять\n", Console::BOLD);
        }
    }
}