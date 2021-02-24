<?php
/***************************************************************************
 *
 * Copyright (c) 2021 liumingzhi, Inc. All Rights Reserved
 *
 **************************************************************************
 *
 * @file docs.php
 * @author liumingzhi(liumingzhij26@gmail.com)
 * @date 2021-02-22 13:48:00
 *
 **/

return [
    // 是否开启
    'enable' => env('DOCS_ENABLE', false),

    'force' => env('DOCS_FORCE', false),

    'force_update' => [
        'v1/test'//只到 controller
    ],

    'url_prefix' => env('URL_PREFIX', ''), //如 /v2/user/push/save_push_info

    // 返回结果采集
    'response_result_gather_sharding' => 1000, //(time() % 1000 === 0),

    'yapi' => [
        'project_id' => 0,
    ],
];