<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.05.2015
 */

namespace skeeks\cms\logDbTarget\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%log_db_target}}".
 *
 * @property string  $id
 * @property integer $level
 * @property string  $category
 * @property integer $log_time
 * @property string  $prefix
 * @property string  $message
 */
class LogDbTargetModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log_db_target}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'log_time'], 'integer'],
            [['prefix', 'message'], 'string'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => \Yii::t('skeeks/logdb/app', 'ID'),
            'level'    => \Yii::t('skeeks/logdb/app', 'Level'),
            'category' => \Yii::t('skeeks/logdb/app', 'Category'),
            'log_time' => \Yii::t('skeeks/logdb/app', 'Log Time'),
            'prefix'   => \Yii::t('skeeks/logdb/app', 'Prefix'),
            'message'  => \Yii::t('skeeks/logdb/app', 'Message'),
        ];
    }
}