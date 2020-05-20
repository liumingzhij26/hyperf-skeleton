<?php

declare(strict_types=1);

namespace App\Request\V1\Test;

use HyperfLib\Request\BaseRequest;

class GetTest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

        ];
    }

    /**
     * 获取已定义验证规则的错误消息
     */
    public function messages(): array
    {
        return [

        ];
    }
}
