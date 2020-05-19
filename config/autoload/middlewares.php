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

use Hyperf\Validation\Middleware\ValidationMiddleware;
use HyperfLib\Middleware\Auth\ServiceAuthMiddleware;
use HyperfLib\Middleware\RequestMiddleware;

$list = [
    RequestMiddleware::class,
    ServiceAuthMiddleware::class,
    ValidationMiddleware::class,
];

return [
    'http' => $list,
    'json-rpc' => $list,
];

