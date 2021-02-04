<?php /*a:2:{s:67:"/Users/xieyang/project/tp5/application/admin/view/article/view.html";i:1612454006;s:67:"/Users/xieyang/project/tp5/application/admin/view/Common/index.html";i:1612453693;}*/ ?>
<!DOCTYPE>

<html>

<head>

 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

 <title>后台管理中心</title>

 <meta name="Copyright" content="Douco Design." />
 <link rel="stylesheet" href="/css/bootstrap.css">
 <link href="/Admin/styles/public.css" rel="stylesheet" type="text/css">

 <script type="text/javascript" src="/Admin/js/jquery-1.8.2.min.js"></script>

 <script type="text/javascript" src="/Admin/js/jquery.form.js"></script>

 <script type="text/javascript" src="/Admin/js/global.js"></script>

 <link rel="stylesheet" href="/Admin/styles/jquery-ui.css">

 <script src="/Admin/js/jquery-ui.js"></script>

 <script src="/js/jquery.datetimepicker.js"></script>
 <link href="/js/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
 <script src="/Ueditor/ueditor.config.js"></script>
 <script src="/Ueditor/ueditor.all.js"></script>
 <link rel="stylesheet" href="/Admin/layui/css/layui.css">
 <script src="/Admin/layui/layui.js"></script>
 <script type="text/javascript" src="/Admin/js/ajaxfileupload.js"></script>
 <script type="text/javascript">

     window.UEDITOR_CONFIG.initialFrameHeight = 400;

     window.UEDITOR_CONFIG.initialFrameWidth = 800;

     window.UEDITOR_CONFIG.savePath='upload1';

 </script>

 <?php
      function myselect($value1,$value2){
      if($value1 == $value2){
            echo 'selected="selected"';
           }
      }


       function mychecked($value1,$value2){

       if($value1 == $value2){

             echo 'checked';

            }

       }

?>



 <style type="text/css">

  ::-webkit-scrollbar {

   width: 6px;

   height: 6px;

  }

  ::-webkit-scrollbar-thumb {

   border-radius: 3px;

   -moz-border-radius: 3px;

   -webkit-border-radius: 3px;

   background-color: #c3c3c3;

  }

  ::-webkit-scrollbar-track {

   background-color: transparent;

  }








.index_dl1{
   display:none;
}




  em{

   margin-top:5px

  }

  td{

   text-align: center;

   font-size:14px;

  }

  #search{

   border:1px solid #00a2d4;padding:5px;width:250px;

  }

  .layui-form-selected dl{

   z-index:9999;

  }

  #sousuo{

   margin-left:5px;padding:5px 15px;text-align:center;cursor:pointer;color:#fff;background: #0065B0;

  }

  input{

   float: left;

   padding:10px;

   margin-top:10px;

   border: 1px solid #ccc;

  }

  .div_radio{

   margin:0;display:none;

  }





.layui-btn-xs{

   height: 32px !important;

   line-height: 22px;

   padding: 5px 10px !important;

}

  table

  {

   border-collapse:separate !important;

  }

  .layui-form-checked{

      float:left;

  }

  .layui-form-checkbox[lay-skin=primary]{

   float:left;

  }

  .actionBtn{

    margin-right:20px;

  }

  .icon_class{

   padding:0 15px;float:left;margin-top:13px;font-size:18px;color:rgba(255, 255, 255, 0.7)

  }

  .icon_class:hover{

   padding:0 15px;float:left;margin-top:13px;font-size:18px;color:#FFC125;

  }



  #dcHead{

   position:fixed;

   top:0;

   left:0;

   background:#fff;

  }

 </style>





</head>

<body style="height:100%">

<div id="dcWrap"> <div id="dcHead">

 <div id="head">

  <div class="nav">

   <ul>

    <li><a href="<?php echo url('index'); ?>">控制面板</a></li>

   </ul>

   <ul class="navRight">

<!--    <li class=""><a href="JavaScript:void(0);">您好，<?php echo session('adminname'); ?></a>-->

     <div class="drop mUser">

     </div>

    </li>

    <li class="noRight" style="margin-right:30px;"><a href="<?php echo url('adminApi/index/loginOut'); ?>"><i class="layui-icon" style="

width: 30px; height: 30px; float: right; margin-top: 15px; background: url() no-repeat; background-size: 100%; "></i>&nbsp;退出</a></li>

   </ul>

  </div>

 </div>

</div>


  <div id="dcLeft" style="height:100%; overflow:hidden; position:fixed;overflow-y:auto;top:0;background: #24303c;left:0">

  <div id="menu">



  <ul class="top">

   <li style="height:30px; line-height:30px;"><em style="font-size:18px;">管理后台</em></li>

  </ul>

  <ul id="menudiv">

   <?php
    $adminid = session('userid');
    $user = db('admin')->where(array('id'=>$adminid))->find();
    $auth = db('author')->where(array('id'=>$user['authid']))->find();

    $menu = changeArr($auth['functioninfo']);

   if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

    <li id="<?php echo htmlentities($vo['funid']); ?>" show="<?php echo htmlentities($vo['funid']); ?>" class=""><i class="icon_class  layui-icon <?php echo htmlentities($vo['iconPicker']); ?>" ></i><a href="<?php echo htmlentities($vo['linkinfo']); ?>"><em><?php echo htmlentities($vo['title']); ?></em></a></li>

   <?php endforeach; endif; else: echo "" ;endif; ?>

  </ul>

 </div>

 </div>

 

<div id="dcMain">
    <div class="mainBox imgModule">
        <h3><span class="actionBtn" style="margin-left: 10px; cursor: pointer;" onclick="goback();">返回</span>编辑文章</h3>
        <form id="form"  class="layui-form" action="<?php echo url('admin/article/view'); ?>" method="post" >
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td class="label" align="right">文章名称：</td>
                    <td>
                        <input type="text" name="title"  size="50" class="title" value="<?php echo htmlentities((isset($info['title']) && ($info['title'] !== '')?$info['title']:'')); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="right">图片：</td>
                    <td>
                        <img id="thumbnail_img" src="<?php echo htmlentities((isset($pic) && ($pic !== '')?$pic:$moren)); ?>" name="pic" style="width:150px;height:130px;float:left;" >
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td>
                        <a class="btn" href="javascript:void(0);" style="position: relative; overflow: hidden; direction: ltr;float:left;">
                            上传图片<input id="thumbnail" type="file" name="thumbnail" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;" /></a>

                    </td>
                </tr>
                <tr>
                    <td class="label" align="right">文章内容：</td>
                    <td>
                        <textarea id="editor" name="info" style="width:700px;height:400px;"><?php echo htmlentities((isset($info['info']) && ($info['info'] !== '')?$info['info']:'')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="131"></td>
                    <td>
                        <input type="hidden" value="<?php echo htmlentities((isset($_GET['id']) && ($_GET['id'] !== '')?$_GET['id']:'')); ?>" name="id">
                        <input name="button" class="btn sub" type="submit" value="提交" onclick="submitForm()" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="clear"></div>
    <div id="footer">
        <div class="line"></div>
    </div>
    <div class="clear"></div>
</div>
<script>
    var ue = UE.getEditor('editor');
        $(function(){
        $("#thumbnail").live('change',function(){
            ajaxThumbnailUpload();
        });
    });

        function ajaxThumbnailUpload(){
        var path = '';
        $.ajaxFileUpload
        (
    {
        url: "<?php echo url('adminApi/common/upload_img'); ?>",
        fileElementId:'thumbnail',
        dataType: 'json',
        success: function (data)
        {
            if(data.code != 1)
        {
            alert(data.mag);
        }else
        {
            $("#thumbnail_img").attr("src", path + data.msg);
        }

        },
            error: function (data, status, e)
        {
            alert(e);
        }
    }
        )
        return false;
    }







</script>
<script>
    function goback(){
        history.go(-1);
    }
    var loading=0;
    function submitForm(){
        if(loading){
            return false;
        }
        $('#form').ajaxForm({
            beforeSubmit:  checkForm,// pre-submit callback
            success:       complete,// post-submit callback
            dataType: 'json'
        });
        loading=1;
        function checkForm(){
        }
        function complete(d){
            if (d.error == ""){
                myalert('更新成功','');
            }else{
                alert(d.error);
                loading=0;
            }
        }
    }
</script>
<!--上传主图-->
<!---->
</body>
</html>

</div>






<script>
 function goback(){
  history.go(-1);
 }

 //    layui.use('form', function(){

 //          var form = layui.form;

 //          form.render();

 //    });






 //layui日期组件

 layui.use('laydate', function(){

  var laydate = layui.laydate;







  laydate.render({

   elem: '#test66' //指定元素

   ,type: 'date'

  });
  laydate.render({

   elem: '#test5' //指定元素

   ,type: 'date'

  });
  laydate.render({

   elem: '#test3' //指定元素

   ,type: 'date'

  });
  laydate.render({

   elem: '#test15' //指定元素
   ,type: 'date'

  });
  laydate.render({

   elem: '#test6' //指定元素

   ,type: 'date'

  });

  laydate.render({

   elem: '#test7' //指定元素

   ,type: 'date'

  });

  laydate.render({

   elem: '#test4' //指定元素

  });

 });



 /*layui联动组件*/

 layui.use(['form','element','jquery','layer'],function(){

  var layer = layui.layer, $ = layui.jquery;

  var form = layui.form;

  form.on('select(pidshow)', function(data){


   showData(data.value);

  });

 });







</script>





<!--layer结束-->

<script>

 //FFC125 color:#878686

 var test = window.location.href;

 arr=test.split("/");

 len = arr.length;

 div_class = arr[len-2];

 if(div_class == 'id'){

  div_class = arr[len-4];

 }



 $('#'+ div_class + ' i').css("color","#FFC125");

 $('#'+ div_class + ' ').css("background","#1686ef");

 $('#'+div_class+' a').css("color","#fff");





 $('.con li').each(function() {

  $('.con li').attr("class","");

 });





 /*菜单颜色变化*/

 $(function(){

  $("#menudiv li").hover(function(){

   $(this).children('i').css("color","#FFC125");

  },function(){



   $(this).children('i').css("color", "rgba(255, 255, 255, 0.7)");

   $('#'+ div_class + ' i').css("color","#FFC125");

  })

 })







 //提示

 function myalert(info,link){

  layer.confirm(info, {

   btn: ['确定'] //按钮

  }, function(){

   if(link == ''){

    layer.msg({icon: 1});

    return false;

   }else if(link == '1'){

    location.href='';

   }else{

    location.href=link;

   }

  });

 }



 //删除



 function shanchu(id){

  layer.confirm('确定要删除吗？', {

   btn: ['确定','取消'] //按钮

  }, function(){

   params = {};

   params.id = id;

   var url = '__CONTROLLER__/del';

   $.post(url, params, function(d){

    if(d.error == ""){

     myalert("删除成功",1);

    }else{

     myalert("删除失败",'');

    }

   }, 'json');

  },function(){

   window.location.reload();

  });



 }

</script>




