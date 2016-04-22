Error logging in mysql database for SkeekS CMS
===================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/cms-log-db-target "*"
```

or add

```
"skeeks/cms-log-db-target": "*"
```

Configuration app
----------

```php

'components' =>
[
    'i18n' => [
        'translations' =>
        [
            'skeeks/logdb/app' => [
                'class'             => 'yii\i18n\PhpMessageSource',
                'basePath'          => '@skeeks/cms/logDbTarget/messages',
                'fileMap' => [
                    'skeeks/logdb/app' => 'app.php',
                ],
            ]
        ]
    ],

    'logDbTargetSettings' => [
        'class'     => 'skeeks\cms\logDbTarget\components\LogDbTargetSettings',
    ],

    'log' => [
        'targets' => [
            [
                'class'     => 'skeeks\cms\logDbTarget\LogDbTarget',
            ],
        ],
    ]
],

'modules' =>
[
    'logDbTarget' => [
        'class'         => '\skeeks\cms\logDbTarget\Module',
    ]
]

```

##Links
* [Web site](http://en.cms.skeeks.com)
* [Web site (rus)](http://cms.skeeks.com)
* [Author](http://skeeks.com)
* [ChangeLog](https://github.com/skeeks-cms/cms-log-db-target/blob/master/CHANGELOG.md)


___

> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](http://skeeks.com) | [en.cms.skeeks.com](http://en.cms.skeeks.com) | [cms.skeeks.com](http://cms.skeeks.com) | [marketplace.cms.skeeks.com](http://marketplace.cms.skeeks.com)


