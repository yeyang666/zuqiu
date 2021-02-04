<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/2
 * Time: 下午10:45
 * Author: 叶阳
 */

namespace app\admin\controller;


class Common extends Base
{
    public function index()
    {
        return $this->fetch();
    }
}