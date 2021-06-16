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

use GuzzleHttp\Client;
use Hyperf\HttpServer\ResponseEmitter;

return [
    'scan' => [
        'paths' => [
            BASE_PATH . '/app',
            BASE_PATH . '/library',
        ],
        'ignore_annotations' => [
            'mixin',
        ],
        'class_map' => [
            Client::class => BASE_PATH . '/class_map/GuzzleHttp/Client.php',
            ResponseEmitter::class => BASE_PATH . '/class_map/Hyperf/HttpServer/ResponseEmitter.php',
        ],
    ],
];
