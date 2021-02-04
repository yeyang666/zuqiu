<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/2
 * Time: 下午10:25
 * Author: 叶阳
 */

namespace app\admin\controller;


class User extends Base
{
    public function index()
    {
        $list = db('user')->order('id')->paginate(config('app.pagesize'));
        $show = $list->render();
        $this->assign('page',$show);
        $this->assign('list',$list);
        return $this->fetch();
    }

}