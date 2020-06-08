<?php
/***************************************************************************
 *
 * Copyright (c) 2020 liumingzhi, Inc. All Rights Reserved
 *
 **************************************************************************
 *
 * @file Index.php
 * @author liumingzhi(liumingzhij26@gmail.com)
 * @date 2020-05-14 18:03:00
 *
 **/

namespace App\Controller;

use Hyperf\HttpServer\Annotation\AutoController;
use TheFairLib\Annotation\Doc;
use TheFairLib\Controller\AbstractController;

/**
 * @AutoController("/")
 *
 * @Doc(name="首页", desc="首页")
 * @package App\Controller
 */
class Index extends AbstractController
{

    /**
     * @Doc(name="首页", desc="首页")
     *
     * @return array|mixed
     */
    public function index()
    {
        return $this->showSuccess();
    }
}
