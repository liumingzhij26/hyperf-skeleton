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
    'url_blacklist' => [
        'system_reserved' => [
            'method' => [
                'show_success',
                'show_error',
                'show_result',
                '__get',
                '__set',
            ],
            'route' => [
            ],
        ],
    ],

    'url_whitelist' => [
        'route' => [//加入白名单 url 不做路由参数的强制验证
            '/',
            '/index',
            '/index/index',
            '/ping'
        ],
    ],
];
