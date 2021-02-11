<?php
/**
 * Created by PhpStorm.
 * user: xieyang
 * Date: 2021/2/3
 * Time: 下午10:10
 * Author: 叶阳
 */

namespace app\adminApi\controller;


use think\facade\Env;

class Common extends Base
{
    public function upload_img()
    {
        if (request()->isPost()) {
            if ($_FILES['thumbnail']['tmp_name']) {
                $image = $this->upload();
                return ajax_success($image);
            }
            return ajax_error('上传图片失败！');
        }
    }


    //上传图片函数
    public function upload()
    {
        // 获取表单上传的文件，例如上传了一张图片
        $file = request()->file('thumbnail');
        if ($file) {
            //将传入的图片移动到框架应用根目录/public/uploads/ 目录下，ROOT_PATH是根目录下，DS是代表斜杠 /
            $beginPath = '/upload/';
            $path = Env::get('root_path') . '/public' . $beginPath;
            if (!is_dir($path)) {
                mkdir(iconv("UTF-8", "GBK", $path), 0777, true);
            }
            $info = $file->move($path);
            if ($info) {
                return $beginPath . $info->getSaveName();
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
                die;
            }
        }
    }


//    public function uploadWxImage(){
//        $request = $this->request();
//        $img_file = $request->getUploadedFile('file');
//        print_r($img_file->getClientMediaType());
//        if( $img_file->getClientMediaType() == "application/x-pkcs12"){//pfx文件
//            $image = time() . '.pfx';
//        }elseif($img_file->getClientMediaType() == "application/x-iwork-keynote-sffkey"){//key文件
//            $image = time() . '.key';
//        }
//        $rootPath = '/file/'.date("Ymd").'/';
//        $path = EASYSWOOLE_ROOT . $rootPath;
//        if(!file_exists($path)){
//            mkdir($path,0777,true);
//        }
//        $name = $path . $image;
//        $img_file->moveTo($name);
//        $filePath = $rootPath.$image;
//        //$img = EASYSWOOLE_ROOT.$filePath;
//        return $this->success($filePath);
//
//    }


}