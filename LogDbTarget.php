<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.07.2015
 */
namespace skeeks\cms\LogDbTarget;

use yii\log\DbTarget;

/**
 * Class LogDbTarget
 * @package skeeks\cms\LogDbTarget
 */
class LogDbTarget extends DbTarget
{
    public $logTable = '{{%log_db_target}}';
}