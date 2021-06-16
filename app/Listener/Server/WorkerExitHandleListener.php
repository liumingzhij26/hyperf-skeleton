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

namespace App\Listener\Server;

use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\OnShutdown;
use Hyperf\Framework\Event\OnWorkerExit;
use Swoole\Timer;
use TheFairLib\Library\Logger\Logger;

class WorkerExitHandleListener implements ListenerInterface
{
    /**
     * {@inheritdoc}
     */
    public function listen(): array
    {
        return [
            OnWorkerExit::class,
            onShutdown::class,
        ];
    }

    public function process(object $event)
    {
        Timer::clearAll();
        Logger::get()->warning('on_work_exit', [
            'client' => $event->server->getWorkerPid(),
            'class' => get_class($event),
        ]);
    }
}
