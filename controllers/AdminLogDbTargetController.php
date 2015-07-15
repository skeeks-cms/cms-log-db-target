<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.05.2015
 */
namespace skeeks\cms\logDbTarget\controllers;

use skeeks\cms\logDbTarget\models\LogDbTargetModel;
use skeeks\cms\modules\admin\controllers\AdminModelEditorController;
use yii\helpers\ArrayHelper;

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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = ArrayHelper::merge(parent::actions(),
            [
                "update" =>
                [
                    "name"         => "Смотреть",
                    "icon"          => "glyphicon glyphicon-pencil",
                ],
            ]
        );

        unset($actions['create']);

        return $actions;
    }
}