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
    'project_list' => [
        1 => [
            'name' => 'xxx',
            'default_platform' => 'getui', //all
            'push_platform' => [
                'getui' => [
                    'app_id' => 'xxxx',
                    'app_secret' => 'xxxx',
                    'title' => 'xxx',
                    'logo' => 'logo.png',
                ],
            ],
        ],
    ],
];
