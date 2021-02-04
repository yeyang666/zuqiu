<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------


// 应用公共文件
function ajax_success($msg="操作成功")
{
    echo json_encode([
        'code'=>1,
        'msg'=>$msg
    ]);
}

function ajax_error($msg)
{
    echo json_encode([
        'code'=>2,
        'msg'=>$msg
    ]);
}


function  changeArr($str){
    $list = explode(',',$str);
    sort($list);
    $arr = [];
    foreach($list as $value){
        $info = db('function')->where(array('id'=>$value))->find();
        $arr[] = $info;
    }
    foreach($arr as $key=>$value){
        $sort[]=$value["sort"];
    }
    array_multisort($sort,SORT_ASC,$arr);
    return $arr;
}