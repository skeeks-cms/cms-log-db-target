<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\LogDbTarget;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class DbTarget extends \yii\log\DbTarget
{
    public $logTable = '{{%log_db_target}}';
}