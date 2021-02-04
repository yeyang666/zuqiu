<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/3
 * Time: 下午10:22
 * Author: 叶阳
 */

namespace app\adminApi\controller;


class Article
{
    public function addServer()
    {
        $data = input('post.');
        db("news")->insert($data);
    }

    public function uploadServer()
    {
        $data = input('post.');
        db("news")->where([
            'id' => $data['id']
        ])->update($data);
    }

    public function deleteServer()
    {
        $id = input('id');
        db("news")->where([
            'id' => $id
        ])->delete();
    }
}