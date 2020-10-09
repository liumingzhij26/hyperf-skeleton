<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

return [
    'default' => [
        'driver' => Hyperf\AsyncQueue\Driver\RedisDriver::class,
        'channel' => sprintf('%s#%s#redis_default_queue', env('APP_NAME'), env('PHASE', 'prod')),
        'timeout' => 5,
        'retry_seconds' => [//失败后重新尝试间隔
            1, 5, 60, 300, 3600,
        ],
        'handle_timeout' => 5,//消息处理超时时间
        'processes' => 3,//消费进程数
        'concurrent' => [
            'limit' => 5,//同时处理消息数
        ],
    ],

];
