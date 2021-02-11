<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/3
 * Time: 下午10:22
 * Author: 叶阳
 */

namespace app\adminApi\controller;


use think\facade\Env;
use think\facade\Request;

class Config
{
    public function uploadServer()
    {
        $data = input('post.');
        if($data['id']){
            $keyname = time()."_key.pem";
            $certname = time()."_cert.pem";
            $this->createPem($data['sslkey'],$keyname,0);
            $this->createPem($data['sslcert'],$certname);
            $data['sslkey_path'] = '/weixin/'.$keyname;
            $data['sslcert_path'] = '/weixin/'.$certname;
            db("config")->where([
                'id' => $data['id']
            ])->update($data);
        }else{
            db("config")->insert($data);
        }
        ajax_success();
    }

    public function getInfo()
    {
        $info = "";
        if(Request::param("id")){
            $info = db("config")->where([
                'id'=>Request::param("id")
            ])->find();
        }
        ajax_success(json_encode($info));
    }

    public function createPem($str,$fileName,$status=1)
    {
        $filepath = Env::get('root_path') . '/public/weixin/';
        if($status == 0){
            deldir($filepath);
        }
        if (!is_dir($filepath)) {
            mkdir(iconv("UTF-8", "GBK", $filepath), 0777, true);
        }
        $filepath = $filepath.$fileName;
        $fopen = fopen($filepath,'w+')or die("文件不存在");
        fwrite($fopen,$str);
        fclose($fopen);
    }


}