<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 07.03.2015
 */
namespace skeeks\cms\logDbTarget\console\controllers;
use yii\console\Controller;
use skeeks\cms\logDbTarget\models\LogDbTargetModel;

/**
 * Агенты модуля логов
 *
 * Class AgentsController
 * @package skeeks\cms\logDbTarget\console\controllers
 */
class AgentsController extends Controller
{
    /**
     * Просмотр созданных бекапов баз данных
     */
    public function actionClearLogs()
    {
        $deleted = LogDbTargetModel::deleteAll([
            '<=', 'log_time', \Yii::$app->formatter->asTimestamp(time()) - (int) \Yii::$app->logDbTargetSettings->storeLogsTime
        ]);

        $this->stdout('storeLogsTime: ' . \Yii::$app->logDbTargetSettings->storeLogsTime . "\n");
        $this->stdout('Clear logs: ' . $deleted . "\n");

        \Yii::info(\Yii::t('skeeks/logdb/app', 'The number of remote logging') . ": " . $deleted);
    }
}
