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

namespace App\Controller;

use Hyperf\HttpServer\Annotation\AutoController;
use TheFairLib\Annotation\Doc;
use TheFairLib\Controller\AbstractController;

/**
 * @AutoController("/")
 *
 * @Doc(name="首页", desc="首页")
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
