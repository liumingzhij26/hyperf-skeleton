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
    'cookie' => [
        'default_domain' => env('DEFAULT_DOMAIN', ''),
    ],

    //slb 负载状态检测
    'service_status_path' => BASE_PATH . sprintf('/runtime/service_status'),

    //关闭 rpc 缓存
    'close_rpc_smart_cache' => env('CLOSE_RPC_SMART_CACHE', false),
];
