
function goback(){
    history.go(-1);
}

/*菜单颜色变化*/
$(function(){
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
    $("#menudiv li").hover(function(){
        $(this).children('i').css("color","#FFC125");
    },function(){
        $(this).children('i').css("color", "rgba(255, 255, 255, 0.7)");
        $('#'+ div_class + ' i').css("color","#FFC125");
    })
})






