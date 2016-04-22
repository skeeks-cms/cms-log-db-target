<?php
return
[
    'logDbTarget/agents/clear-logs' =>
    [
        'description'       => \Yii::t('skeeks/logdb/app','Cleaning mysql logs'),
        'agent_interval'    => 3600*3, //раз в три часа
        'next_exec_at'      => \Yii::$app->formatter->asTimestamp(time()) + 3600*3,
        'is_period'         => 'N'
    ]
];