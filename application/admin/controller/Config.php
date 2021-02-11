<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/11
 * Time: 下午10:04
 * Author: 叶阳
 */

namespace app\admin\controller;


use think\facade\Request;

class Config extends Base
{
    public function view()
    {
        return $this->fetch();
    }
}