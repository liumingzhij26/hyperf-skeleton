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
    'drive' => 'redis',
    'enable' => true,
    'options' => [
        'redis' => [
            'pool_name' => 'default',
            'retry_delay' => 500, //毫秒
            'retry_count' => 2, //2次
        ],
    ],
];
