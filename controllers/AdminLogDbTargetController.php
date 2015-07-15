<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.05.2015
 */
namespace skeeks\cms\LogDbTarget\controllers;

use skeeks\cms\LogDbTarget\models\LogDbTargetModel;
use skeeks\cms\modules\admin\controllers\AdminModelEditorController;

/**
 * Class AdminLogDbTargetController
 * @package skeeks\cms\LogDbTarget\controllers
 */
class AdminLogDbTargetController extends AdminModelEditorController
{
    public function init()
    {
        $this->name                     = "Управление логами";
        $this->modelShowAttribute       = "id";
        $this->modelClassName           = LogDbTargetModel::className();

        parent::init();
    }
}