<?php

namespace App\Http\Controllers;

use App\Http\Forms\UserForm;
use App\Http\Helpers\SendHelper;
use Mix\Http\Message\Response;
use Mix\Http\Message\ServerRequest;

/**
 * Class UserController
 * @package App\Http\Controllers
 * @author liu,jian <coder.keda@gmail.com>
 */
class UserController
{

    /**
     * Create
     * @param ServerRequest $request
     * @param Response $response
     * @return Response
     */
    public function create(ServerRequest $request, Response $response)
    {
        // 使用模型
        $model             = new UserForm($request->getAttributes());
        $model->attributes = $request->getAttributes();
        $model->setScenario('create');
        if (!$model->validate()) {
            $content = ['code' => 1, 'message' => 'FAILED', 'data' => $model->getErrors()];
            return SendHelper::json($response, $content);
        }

        // 执行保存数据库
        // ...

        // 响应
        $content = ['code' => 0, 'message' => 'OK'];
        return SendHelper::json($response, $content);
    }

}