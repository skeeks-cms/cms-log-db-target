<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2015
 */
namespace skeeks\cms\LogDbTarget;

use skeeks\cms\components\Cms;
use yii\log\DbTarget;

/**
 * Class LogDbTarget
 * @package skeeks\cms\LogDbTarget
 */
class LogDbTarget extends DbTarget
{
    public $logTable = '{{%log_db_target}}';

    public function init()
    {
        parent::init();

        $this->logVars      = \Yii::$app->logDbTargetSettings->logVars ? (array) \Yii::$app->logDbTargetSettings->logVars : [];
        $this->levels       = (array) \Yii::$app->logDbTargetSettings->getSafeLevels();
        $this->except       = (array) \Yii::$app->logDbTargetSettings->getExcept();
        $this->categories   = (array) \Yii::$app->logDbTargetSettings->getCategories();
        $this->enabled      = (bool) (\Yii::$app->logDbTargetSettings->enabled == Cms::BOOL_Y);
    }
}