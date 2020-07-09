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

use Monolog\Handler;
use Monolog\Formatter;
use Monolog\Logger;
use TheFairLib\Library\Logger\RotatingFileHandler;

//
$appEnv = env('PHASE', 'rd');
$appName = env('APP_NAME');
//关闭日志写入功能
$closeLogger = (bool)env('CLOSE_LOG', false);
$formatter = [
    'class' => Formatter\JsonFormatter::class,
    'constructor' => [
        'batchMode' => Formatter\JsonFormatter::BATCH_MODE_JSON,
        'appendNewline' => true,
        'allowInlineLineBreaks' => true,
    ],
];
$date = date('Y-m-d');
if ($appEnv == 'rd') {
    $path = BASE_PATH . sprintf('/runtime/logs/');
    $debugHandler = [
        'class' => RotatingFileHandler::class,
        'constructor' => [
            'filename' => $path . 'debug.log',
            'level' => Logger::DEBUG,
        ],
        'formatter' => $formatter,
    ];

    $infoHandler = [
        'class' => RotatingFileHandler::class,
        'constructor' => [
            'filename' => $path . 'info.log',
            'level' => Logger::INFO,
        ],
        'formatter' => $formatter,
    ];
    return [
        'default' => [
            'handlers' => [
                $debugHandler,
                $infoHandler,
            ],
        ],
    ];

} else {
    $path = env('LOG_DIR') . sprintf('%s/', $appName);
    $handler = $closeLogger ? Handler\NullHandler::class : RotatingFileHandler::class;
    $infoHandler = [
        'class' => $handler,
        'constructor' => [
            'filename' => $path . 'info.log',
            'level' => Logger::INFO,
        ],
        'formatter' => $formatter,
    ];
    return [
        'default' => [
            'handlers' => [
                $infoHandler,
            ],
        ],
    ];
}