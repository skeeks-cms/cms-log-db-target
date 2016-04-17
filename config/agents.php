<?php
return
[
    'logDbTarget/agents/clear-logs' =>
    [
        'description'       => 'Чистка mysql логов',
        'agent_interval'    => 3600*3, //раз в три часа
        'next_exec_at'      => \Yii::$app->formatter->asTimestamp(time()) + 3600*3,
        'is_period'         => 'N'
    ]
];