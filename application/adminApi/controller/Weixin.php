<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/11
 * Time: 下午10:32
 * Author: 叶阳
 */

namespace app\adminApi\controller;

define("TOKEN","token");//定义识别码 需要跟微信公众平台上保持一致
class Weixin
{
    public function index(){
        $this->valid();
    }

    //微信验证
    public function valid(){
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    //检查微信签名
    private function checkSignature(){
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}