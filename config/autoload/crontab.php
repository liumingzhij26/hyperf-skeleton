<?php
/***************************************************************************
 *
 * Copyright (c) 2020 liumingzhi, Inc. All Rights Reserved
 *
 **************************************************************************
 *
 * @file crontab.php
 * @author liumingzhi(liumingzhij26@gmail.com)
 * @date 2020-03-04 18:48:00
 *
 **/

$enable = env('CRONTAB_ENABLE', false);

return [
    // 是否开启定时任务
    'enable' => $enable,


    'crontab' => [

    ],

    'task' => [

//        TestProcess::class => [
//            'nums' => 1,//进程数量
//            'enable_coroutine' => true,
//            'enable' => $enable,//是否启用
//        ],
    ],
];
