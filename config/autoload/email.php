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
    'system_notice' => [
        'host' => env('EMAIL_HOST'),
        'port' => env('EMAIL_PORT'),
        'username' => env('EMAIL_USERNAME'),
        'password' => env('EMAIL_PASSWORD'),
    ],

    'system_administrator' => [
        //        'liumingzhi@thefair.net.cn'
    ],
];
