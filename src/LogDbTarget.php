<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\logDbTarget;

use skeeks\cms\components\Cms;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class LogDbTarget extends DbTarget
{
    public function init()
    {
        parent::init();

        $this->logVars = \Yii::$app->logDbTargetSettings->logVars ? (array)\Yii::$app->logDbTargetSettings->logVars : [];
        $this->levels = (array)\Yii::$app->logDbTargetSettings->getSafeLevels();
        $this->except = (array)\Yii::$app->logDbTargetSettings->getExcept();
        $this->categories = (array)\Yii::$app->logDbTargetSettings->getCategories();
        $this->enabled = (bool)(\Yii::$app->logDbTargetSettings->enabled == Cms::BOOL_Y);
        $this->exportInterval = (int)\Yii::$app->logDbTargetSettings->exportInterval;
    }
}