<?php
namespace skeeks\cms\logDbTarget\jobs;

use skeeks\cms\logDbTarget\services\LogCleanup;
use skeeks\cms\job\contracts\JobReporterInterface;
use skeeks\cms\job\exceptions\JobCancelledException;
use skeeks\cms\job\handlers\AbstractJobHandler;
use skeeks\cms\job\runtime\JobContext;

class LogCleanupJobHandler extends AbstractJobHandler
{
    public function run(JobContext $context, JobReporterInterface $reporter): void
    {
        $settings = clone \Yii::$app->logDbTargetSettings;
        $site = $context->getSite();
        if ($context->getRun()->cms_site_id && !$site) {
            throw new \skeeks\cms\job\exceptions\JobPermanentException('Сайт задания не найден.');
        }
        // Restore configured defaults before applying this run's site overrides.
        // Do not mutate a component cached by the worker for a previous site.
        $settings->setAttributes($settings->callAttributes, false);
        $settings->cmsSite = $site;
        $settings->cmsUser = null;
        $settings->setAttributes($settings->getSettings(false));
        $reporter->setTotal(null);
        $reporter->setStage('cleanup', 'Чистка mysql логов');
        $deleted = 0;
        $checkpoint = static function (array $progress) use ($reporter, &$deleted) {
            if ($reporter->isCancelled()) { throw new JobCancelledException('Чистка отменена.'); }
            $delta = $progress['deleted'] - $deleted;
            if ($delta > 0) { $reporter->advance($delta); $reporter->countSuccess($delta); }
            $deleted = $progress['deleted'];
            $reporter->heartbeat();
        };
        $result = \Yii::createObject(LogCleanup::class)->run((int)$settings->storeLogsTime, $checkpoint);
        $reporter->setResult($result);
        if (!$result['enabled']) {
            $reporter->countSkipped();
            $reporter->setStage('disabled', 'Чистка отключена настройками');
        } else {
            $reporter->setStage('completed', 'Удалено записей: '.$result['deleted']);
        }
    }
}