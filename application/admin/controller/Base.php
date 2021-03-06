<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/1/31
 * Time: 下午4:00
 * Author: 叶阳
 */

namespace app\admin\controller;

use think\Controller;
use think\facade\Request;
use think\facade\Env;
class Base extends  Controller
{
    public $method = ["login"];
    public $morenPic;
    public function __construct() {
        parent::__construct();
        if(!session("userid") && !in_array(Request::action(),$this->method)){
            $this->redirect("admin/Index/login");
        }
        $this->morenPic ='/Admin/images/moren.png';
        $this->menu();
    }

    public function menu()
    {
        $adminid = session('userid');
        $user = db('admin')->where(array('id'=>$adminid))->find();
        $auth = db('author')->where(array('id'=>$user['authid']))->find();
        $menu = changeArr($auth['functioninfo']);
        $this->assign('menu',$menu);
    }
}