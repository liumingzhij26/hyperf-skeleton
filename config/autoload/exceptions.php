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
use TheFairLib\Exception\Handler\AppExceptionHandler;
use TheFairLib\Exception\Handler\QueryExceptionHandler;
use TheFairLib\Exception\Handler\RateLimitExceptionHandler;
use TheFairLib\Exception\Handler\Rpc\RpcAppExceptionHandler;
use TheFairLib\Exception\Handler\Rpc\RpcServiceExceptionHandler;
use TheFairLib\Exception\Handler\Rpc\RpcValidationExceptionHandler;
use TheFairLib\Exception\Handler\ServiceExceptionHandler;
use TheFairLib\Exception\Handler\ValidationExceptionHandler;

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
