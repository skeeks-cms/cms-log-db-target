<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.07.2015
 */
namespace skeeks\cms\logDbTarget;
/**
 * Class Module
 * @package skeeks\cms\logDbTarget
 */
class Module extends \skeeks\cms\base\Module
{
    public $controllerNamespace = 'skeeks\cms\logDbTarget\controllers';

    /**
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            "version"               => file_get_contents(__DIR__ . "/VERSION"),
        ]);
    }
}