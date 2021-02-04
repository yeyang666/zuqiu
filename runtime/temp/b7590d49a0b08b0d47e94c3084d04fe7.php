<?php /*a:2:{s:65:"/Users/xieyang/project/tp5/application/admin/view/user/index.html";i:1612452589;s:67:"/Users/xieyang/project/tp5/application/admin/view/Common/index.html";i:1612453693;}*/ ?>
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

 
<div id="dcMain"> <!-- 当前位置 -->

    <div class="mainBox imgModule">

        <h3>用户列表</h3>

        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="tableBasic">

            <tr>
                <th>id</th>

                <th>昵称</th>

                <th>头像</th>

                <th>性别</th>

                <th>区域</th>
                <th>手机号码</th>
                <th>openid</th>

                <th>创建时间</th>

            </tr>

            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="tron">
                    <td style="text-align: center;">
                        <?php echo htmlentities($vo['id']); ?>
                    </td>
                    <td style="text-align: center;">
                        <?php echo htmlentities($vo['nickname']); ?>
                    </td>
                    <td style="text-align: center;">

                        <img src="<?php echo htmlentities($vo['headimgurl']); ?>" style="width:50px;">

                    </td>



                    <td style="text-align: center;">

                        <?php

					if($vo['sex'] == 1){

						echo '男';

					}else{

						echo '女';

					}

				?>

                    </td>



                    <td style="text-align: center;">

                        <?php echo htmlentities($vo['country']); ?>-<?php echo htmlentities($vo['province']); ?>-<?php echo htmlentities($vo['city']); ?>

                    </td>

                    <td style="text-align: center;">

                        <?php echo htmlentities($vo['tel']); ?>

                    </td>


                    <td style="text-align: center;">

                        <?php echo htmlentities($vo['openid']); ?>

                    </td>



                    <td style="text-align: center;">

                        <?php echo htmlentities($vo['createtime']); ?>

                    </td>

                </tr>

            <?php endforeach; endif; else: echo "" ;endif; ?>

        </table>
        <div class="pager" style="float:right"><?php echo $page; ?></div>



    </div>

</div>

<div class="clear"></div>

<div id="footer">

    <div class="line"></div>

</div>

</div>

<div class="clear"></div> </div>

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




