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
use HyperfLib\Exception\Handler\AppExceptionHandler;
use HyperfLib\Exception\Handler\QueryExceptionHandler;
use HyperfLib\Exception\Handler\RateLimitExceptionHandler;
use HyperfLib\Exception\Handler\Rpc\RpcAppExceptionHandler;
use HyperfLib\Exception\Handler\Rpc\RpcServiceExceptionHandler;
use HyperfLib\Exception\Handler\Rpc\RpcValidationExceptionHandler;
use HyperfLib\Exception\Handler\ServiceExceptionHandler;
use HyperfLib\Exception\Handler\ValidationExceptionHandler;

return [
    'handler' => [
        'http' => [
            AppExceptionHandler::class,
            ServiceExceptionHandler::class,
            QueryExceptionHandler::class,
            ValidationExceptionHandler::class,
            RateLimitExceptionHandler::class,
        ],

        'json-rpc' => [
            RpcAppExceptionHandler::class,
            RpcServiceExceptionHandler::class,
            RpcValidationExceptionHandler::class,
        ],
    ],
];
