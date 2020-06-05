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

//
$appEnv = env('PHASE', 'rd');
$appName = env('APP_NAME');


if ($appEnv == 'rd') {
    $path = BASE_PATH . sprintf('/runtime/logs/%s', $appName);
    $debugFormatter = [
        'class' => Formatter\LineFormatter::class,
        'constructor' => [
            'batchMode' => null,
            'appendNewline' => null,
            'allowInlineLineBreaks' => true,
        ],
    ];
    $errorFormatter = [
        'class' => Formatter\LineFormatter::class,
        'constructor' => [
            'allowInlineLineBreaks' => true,
            'includeStacktraces' => true,
        ],
    ];
    $infoFormatter = [
        'class' => Formatter\LineFormatter::class,
        'constructor' => [
            'allowInlineLineBreaks' => true,
            'includeStacktraces' => false,
        ],
    ];
    $debugHandler = [
        'class' => Handler\StreamHandler::class,
        'constructor' => [
            'stream' => $path . '-debug-' . date('Y-m-d') . '.log',
            'level' => Logger::DEBUG,
        ],
        'formatter' => $debugFormatter,
    ];

    $infoHandler = [
        'class' => Handler\StreamHandler::class,
        'constructor' => [
            'stream' => $path . '-info-' . date('Y-m-d') . '.log',
            'level' => Logger::INFO,
        ],
        'formatter' => $infoFormatter,
    ];
    $errorHandler = [
        'class' => Handler\StreamHandler::class,
        'constructor' => [
            'stream' => $path . '-error-' . date('Y-m-d') . '.log',
            'level' => Logger::ERROR,
        ],
        'formatter' => $errorFormatter,
    ];
    return [
        'default' => [
            'handlers' => [
                $debugHandler,
                $infoHandler,
                $errorHandler,
            ],
        ],
    ];

} else {
    $path = env('LOG_DIR') . sprintf('%s/', $appName);
    $formatter = [
        'class' => Formatter\LineFormatter::class,
        'constructor' => [
            'allowInlineLineBreaks' => true,
            'includeStacktraces' => true,
        ],
    ];
    $infoHandler = [
        'class' => Handler\StreamHandler::class,
        'constructor' => [
            'stream' => $path . 'info' . date('Y-m-d') . '.log',
            'level' => Logger::INFO,
        ],
        'formatter' => $formatter,
    ];
    $errorHandler = [
        'class' => Handler\StreamHandler::class,
        'constructor' => [
            'stream' => $path . 'error' . date('Y-m-d') . '.log',
            'level' => Logger::ERROR,
        ],
        'formatter' => $formatter,
    ];
    $warningHandler = [
        'class' => Handler\StreamHandler::class,
        'constructor' => [
            'stream' => $path . 'warning' . date('Y-m-d') . '.log',
            'level' => Logger::WARNING,
        ],
        'formatter' => $formatter,
    ];
    return [
        'default' => [
            'handlers' => [
                $infoHandler,
                $errorHandler,
                $warningHandler,
            ],
        ],
    ];
}