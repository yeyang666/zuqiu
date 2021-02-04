<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/3
 * Time: 下午10:05
 * Author: 叶阳
 */

namespace app\admin\controller;


class Article extends Base
{
    public function index()
    {
        $list = db('article')->order('id')->paginate(config('app.pagesize'));
        $show = $list->render();
        $this->assign('page',$show);
        $this->assign('list',$list);

        return $this->fetch();
    }

    public function view()
    {
        if(input("id")){
            $info = db("article")->where([
                'id'=>input("id")
            ])->find();
            $this->assign('info',$info);
        }
        $moren = $this->morenPic;
        $this->assign('moren',$moren);
        return $this->fetch();
    }


}