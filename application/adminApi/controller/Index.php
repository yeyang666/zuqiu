<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/2
 * Time: 下午10:03
 * Author: 叶阳
 */

namespace app\adminApi\controller;


class Index extends Base
{
    /**
     * 登陆
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @author 叶阳
     */
    public function login()
    {
        $username = input("username");
        $password = input("password");
        $userinfo = db("admin") -> where(array(
            "username" => $username,
        )) -> find();
        if($userinfo){
            $pwd = md5(md5($password));
            $user = db("admin") -> where(array(
                "username" => $username,
                "password" => $pwd,
            )) -> find();
            if($user){
                session("userid",$user['id']);
                return ajax_success();
            }else{
                return ajax_error("用户名或密码错误");
            }
        }else{
            return ajax_error("用户名不存在");
        }
    }

    //退出登陆
    public function loginOut()
    {
        session("userid",null);
        $this -> redirect('/admin/login');
    }
}