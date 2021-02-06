var layer
layui.use(['form', 'layedit','element','jquery','layer'], function(){
    layer = layui.layer
});
function goback(){
    history.go(-1);
}


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