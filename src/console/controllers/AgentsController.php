<?php
namespace skeeks\cms\logDbTarget\console\controllers;

use skeeks\cms\logDbTarget\services\LogCleanup;
use yii\console\Controller;
use yii\console\ExitCode;

/** Backwards-compatible CLI entry point; the queue calls the service directly. */
class AgentsController extends Controller
{
    public function actionClearLogs()
    {
        $lifetime = (int)\Yii::$app->logDbTargetSettings->storeLogsTime;
        $result = \Yii::createObject(LogCleanup::class)->run($lifetime);
        $this->stdout('storeLogsTime: '.$lifetime."\n");
        $this->stdout('Clear logs: '.$result['deleted']."\n");
        \Yii::info(\Yii::t('skeeks/logdb/app', 'The number of remote logging').': '.$result['deleted']);
        return ExitCode::OK;
    }
}