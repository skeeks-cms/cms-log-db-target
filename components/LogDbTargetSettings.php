<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 16.07.2015
 */
namespace skeeks\cms\LogDbTarget\components;

use skeeks\cms\base\Component;
use skeeks\cms\components\Cms;
use skeeks\cms\models\CmsAgent;
use yii\base\Event;
use yii\console\Application;
use yii\helpers\ArrayHelper;
use yii\log\Logger;

/**
 * Class LogDbTargetSettings
 * @package skeeks\cms\LogDbTarget\components
 */
class LogDbTargetSettings extends Component
{
    /**
     * @var array доступные уровни ошибок
     */
    static public $levelMap = [
        'error'     => 'error',
        'warning'   => 'warning',
        'info'      => 'info',
        'trace'     => 'trace',
        'profile'   => 'profile',
    ];

    /**
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name'          => 'Логирование ошибок в базу mysql',
        ]);
    }

    /**
     * //'_GET', '_POST', '_FILES', '_COOKIE', '_SESSION', '_SERVER'
     * @var array
     */
    public $logVars = [];
    /**
     * @var array
     */
    public $levels = [
        'error',
        'warning'
    ];


    /**
     * @var string
     */
    public $exceptString      = "yii\db\Command*,yii\web\Session*,yii\db\Connection*";
    /**
     * @var string
     */
    public $categoriesString  = "";

    /**
     * @var string
     */
    public $enabled     = Cms::BOOL_Y;

    /**
     * @var int
     */
    public $storeLogsTime      = 432000; //5 дней


    public function init()
    {
        parent::init();

        if (\Yii::$app instanceof Application)
        {
            \Yii::$app->on(Cms::EVENT_AFTER_UPDATE, function(Event $e)
            {

                //Вставка агентов
                if (!CmsAgent::find()->where(['name' => 'logDbTarget/agents/clear-logs'])->one())
                {
                    ( new CmsAgent([
                        'name'              => 'logDbTarget/agents/clear-logs',
                        'description'       => 'Чистка mysql логов',
                        'agent_interval'    => 3600*3, //раз в три часа
                        'next_exec_at'      => \Yii::$app->formatter->asTimestamp(time()) + 3600*3,
                        'is_period'         => Cms::BOOL_N
                    ]) )->save();
                }

            });
        }
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['levels'], 'safe'],
            [['logVars'], 'safe'],
            [['exceptString'], 'string'],
            [['categoriesString'], 'string'],
            [['enabled'], 'string'],
            [['storeLogsTime'], 'integer'],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'levels'                    => 'Уровни ошибок',
            'logVars'                   => 'Дополнительные данные для логирования',
            'exceptString'              => 'Не логировать',
            'categoriesString'          => 'Логировать только категории',
            'enabled'                   => 'Включен или выключен',
            'storeLogsTime'             => 'Время хранения логов (сек.)',
        ]);
    }

    /**
     * @return array
     */
    public function getSafeLevels()
    {
        $result = [];
        foreach ($this->levels as $key => $level)
        {
            if (in_array($level, self::$levelMap))
            {
                $result[$key] = $level;
            }
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getExcept()
    {
        $result = [];

        if ($this->exceptString)
        {
            return explode(",", $this->exceptString);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        $result = [];

        if ($this->categoriesString)
        {
            return explode(",", $this->categoriesString);
        }

        return $result;
    }

}