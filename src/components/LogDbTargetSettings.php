<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 16.07.2015
 */

namespace skeeks\cms\LogDbTarget\components;

use skeeks\cms\backend\widgets\ActiveFormBackend;
use skeeks\cms\base\Component;
use skeeks\cms\components\Cms;
use skeeks\cms\logDbTarget\assets\LogDbTargetAsset;
use skeeks\cms\models\CmsAgent;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

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
        'error'   => 'error',
        'warning' => 'warning',
        'info'    => 'info',
        'trace'   => 'trace',
        'profile' => 'profile',
    ];

    /**
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('skeeks/logdb/app', 'Logging errors in the mysql database'),
            'image' => [LogDbTargetAsset::class, 'icons/Database-mysql.svg'],
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
        'warning',
    ];


    /**
     * @var string
     */
    public $exceptString = "yii\db\Command*,yii\web\Session*,yii\db\Connection*";
    /**
     * @var string
     */
    public $categoriesString = "";

    /**
     * @var string
     */
    public $enabled = Cms::BOOL_Y;

    /**
     * @var int
     */
    public $exportInterval = 9999999999;

    /**
     * @var int
     */
    public $storeLogsTime = 432000; //5 дней

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['levels'], 'safe'],
            [['logVars'], 'safe'],
            [['exceptString'], 'string'],
            [['categoriesString'], 'string'],
            [['enabled'], 'string'],
            [['storeLogsTime'], 'integer'],
            [['exportInterval'], 'integer'],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'levels'           => \Yii::t('skeeks/logdb/app', 'Error levels'),
            'logVars'          => \Yii::t('skeeks/logdb/app', 'Additional information for logging'),
            'exceptString'     => \Yii::t('skeeks/logdb/app', 'Not logging'),
            'categoriesString' => \Yii::t('skeeks/logdb/app', 'Logging only categies'),
            'enabled'          => \Yii::t('skeeks/logdb/app', 'On or off'),
            'storeLogsTime'    => \Yii::t('skeeks/logdb/app', 'Time storage of logs (sec.)'),
            'exportInterval'   => \Yii::t('skeeks/logdb/app', 'How many messages should be accumulated before they are exported'),
        ]);
    }

    public function beginConfigForm()
    {
        return ActiveFormBackend::begin();
    }

    public function renderConfigFormFields(ActiveForm $form)
    {
        return \Yii::$app->view->renderFile(__DIR__.'/_form.php', [
            'form'  => $form,
            'model' => $this,
        ], $this);
    }

    /**
     * @return array
     */
    public function getSafeLevels()
    {
        $result = [];
        if (!$this->levels) {
            return [];
        }

        foreach ($this->levels as $key => $level) {
            if (in_array($level, self::$levelMap)) {
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

        if ($this->exceptString) {
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

        if ($this->categoriesString) {
            return explode(",", $this->categoriesString);
        }

        return $result;
    }

}