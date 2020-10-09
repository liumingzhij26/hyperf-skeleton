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

use Hyperf\Server\Server;
use Hyperf\Server\SwooleEvent;
use TheFairLib\Server\Core\HttpServer;
use TheFairLib\Server\Core\TcpServer;

$appEnv = env('PHASE', 'rd');
$appName = env('APP_NAME');
$logName = "service.error.txt";
if ($appEnv == 'rd') {
    $logFile = BASE_PATH . sprintf('/runtime/logs/%s', $logName);
} else {
    $logFile = rtrim(env('LOG_DIR'), '\\/') . sprintf('/%s/%s', $appName, $logName);
}
return [
    'mode' => SWOOLE_PROCESS,
    'servers' => value(function () {
        $data = [
            [
                //https://wiki.geekdream.com/Specification/json-rpc_2.0.html
                'name' => 'json-rpc',
                'type' => Server::SERVER_BASE,
                'host' => '0.0.0.0',
                'port' => (int) env('RPC_POST', 3201),
                'sock_type' => SWOOLE_SOCK_TCP,
                'callbacks' => [
                    SwooleEvent::ON_RECEIVE => [TcpServer::class, 'onReceive'],
                ],
                'settings' => [
                    'open_length_check' => true,
                    'package_length_type' => 'N',
                    'package_length_offset' => 0,
                    'package_body_offset' => 4,
                    'package_max_length' => 1024 * 1024 * 2,
                ],
            ],
        ];

        if (env('PHASE') == 'rd') {
            $data[] = [
                'name' => 'http',
                'type' => Server::SERVER_HTTP,
                'host' => '0.0.0.0',
                'port' => (int) env('HTTP_POST', 4201),
                'sock_type' => SWOOLE_SOCK_TCP,
                'callbacks' => [
                    SwooleEvent::ON_REQUEST => [HttpServer::class, 'onRequest'],
                ],
            ];
        }
        return $data;
    }),
    'settings' => [
        'enable_coroutine' => true,
        'worker_num' => swoole_cpu_num(),
        'pid_file' => BASE_PATH . '/runtime/hyperf.pid',
        'open_tcp_nodelay' => true,
        'max_coroutine' => 100000,
        'open_http2_protocol' => true,
        'max_request' => 100000,
        'log_file' => $logFile,
        'backlog' => 1024,                       // listen backlog

        //https://wiki.swoole.com/wiki/page/612.html
        'socket_buffer_size' => 2 * 1024 * 1024, //单次最大发送长度，理论上不允许大于 1M

        'task_worker_num' => 2,
        // 因为 `Task` 主要处理无法协程化的方法，所以这里推荐设为 `false`，避免协程下出现数据混淆的情况
        'task_enable_coroutine' => false,
    ],
    'callbacks' => [
        SwooleEvent::ON_BEFORE_START => [Hyperf\Framework\Bootstrap\ServerStartCallback::class, 'beforeStart'],
        SwooleEvent::ON_WORKER_START => [Hyperf\Framework\Bootstrap\WorkerStartCallback::class, 'onWorkerStart'],
        SwooleEvent::ON_PIPE_MESSAGE => [Hyperf\Framework\Bootstrap\PipeMessageCallback::class, 'onPipeMessage'],

        // Task callbacks
        SwooleEvent::ON_TASK => [Hyperf\Framework\Bootstrap\TaskCallback::class, 'onTask'],
        SwooleEvent::ON_FINISH => [Hyperf\Framework\Bootstrap\FinishCallback::class, 'onFinish'],
    ],
];
