<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/3
 * Time: 下午10:22
 * Author: 叶阳
 */

namespace app\adminApi\controller;


use think\facade\Request;

class Lunbo
{
    public function uploadServer()
    {
        $data = input('post.');
        if($data['id']){
            db("lunbo")->where([
                'id' => $data['id']
            ])->update($data);
        }else{
            db("lunbo")->insert($data);
        }
        ajax_success();
    }

    public function getInfo()
    {
        $info = "";
        if(Request::param("id")){
            $info = db("lunbo")->where([
                'id'=>Request::param("id")
            ])->find();
        }
        ajax_success(json_encode($info));
    }
    public function deleteServer()
    {
        $id = input('id');
        db("lunbo")->where([
            'id' => $id
        ])->delete();
    }
}