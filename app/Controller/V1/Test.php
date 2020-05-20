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

namespace App\Controller\V1;

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\RpcServer\Annotation\RpcService;
use HyperfLib\Annotation\Doc;
use HyperfLib\Controller\AbstractController;

/**
 * @Doc(name="测试", desc="主要用于文档测试")
 *
 * @author liumingzhi#thefair.net.cn
 *
 * @AutoController
 * @RpcService(name="v1/test", protocol="jsonrpc", server="json-rpc")
 */
class Test extends AbstractController
{
    /**
     * @Doc(name="测试方法", tag={"user", "api"})
     *
     * @return array
     */
    public function getTest()
    {
        return $this->showSuccess();
    }
}
