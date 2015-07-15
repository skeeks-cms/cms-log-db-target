<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.05.2015
 */
namespace skeeks\cms\logDbTarget\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%log_db_target}}".
 *
 * @property string $id
 * @property integer $level
 * @property string $category
 * @property integer $log_time
 * @property string $prefix
 * @property string $message
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
            [['category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'level' => Yii::t('app', 'Level'),
            'category' => Yii::t('app', 'Category'),
            'log_time' => Yii::t('app', 'Log Time'),
            'prefix' => Yii::t('app', 'Prefix'),
            'message' => Yii::t('app', 'Message'),
        ];
    }
}