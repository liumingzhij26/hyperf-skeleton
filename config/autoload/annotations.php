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
use Hyperf\JsonRpc\JsonRpcPoolTransporter;
use Hyperf\JsonRpc\Pool\RpcConnection;
use Overtrue\Flysystem\Qiniu\QiniuAdapter;
use Xxtime\Flysystem\Aliyun\OssAdapter;

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
            RpcConnection::class => BASE_PATH . '/class_map/Hyperf/JsonRpc/Pool/RpcConnection.php',
            JsonRpcPoolTransporter::class => BASE_PATH . '/class_map/Hyperf/JsonRpc/JsonRpcPoolTransporter.php',
            OssAdapter::class => BASE_PATH . '/class_map/Xxtime/Flysystem/Aliyun/OssAdapter.php',
            QiniuAdapter::class => BASE_PATH . '/class_map/Overtrue/Flysystem/Qiniu/QiniuAdapter.php',
        ],
    ],
];
