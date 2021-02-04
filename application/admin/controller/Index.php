<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/1/31
 * Time: 下午3:38
 * Author: 叶阳
 */

namespace app\admin\controller;


class Index extends Base
{
    public function index()
    {
        echo "欢迎！";
    }
    public function login()
    {
        return $this->fetch();
    }
}