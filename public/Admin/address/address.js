layui.define(["form","jquery"],function(exports){    console.log('111')    var  myurl = "CityList";    var form = layui.form,        $ = layui.jquery,        Address = function(){};    Address.prototype.provinces = function() {        //加载省数据        var proHtml = '',that = this;        $.post(myurl,{id:'',type:1}, function (pro) {            for (var i = 0; i < pro.length; i++) {                proHtml += '<option value="' + pro[i].id + '">' + pro[i].name + '</option>';            }            //初始化省数据            $("select[name=province]").append(proHtml);            form.render();            form.on('select(province)', function (proData) {                console.log('22')                $("select[name=area]").html('<option value="">请选择县/区</option>');                var value = proData.value;                if (value > 0) {                    $.post(myurl,{id:value,type:2},function (val) {                        //console.log(val.length) ;                        that.citys(val) ;                    },"json");                    //that.citys(pro[$(this).index() - 1].childs);                } else {                    $("select[name=city]").attr("disabled", "disabled");                }            });        },'json');    }    //加载市数据    Address.prototype.citys = function(citys) {        var cityHtml = '<option value="">请选择市</option>',that = this;        for (var i = 0; i < citys.length; i++) {            cityHtml += '<option value="' + citys[i].id + '">' + citys[i].name + '</option>';        }        console.log(cityHtml)        $("select[name=city]").html(cityHtml).removeAttr("disabled");        form.render();        form.on('select(city)', function (cityData) {            var value = cityData.value;            if (value > 0) {                $.post(myurl,{id:value,type:3},function (area) {                    that.areas(area) ;                },"json");                //that.areas(citys[$(this).index() - 1].childs);            } else {                $("select[name=area]").attr("disabled", "disabled");            }        });    }    //加载县/区数据    Address.prototype.areas = function(areas) {        var areaHtml = '<option value="">请选择县/区</option>';        for (var i = 0; i < areas.length; i++) {            areaHtml += '<option value="' + areas[i].id + '">' + areas[i].name + '</option>';        }        $("select[name=area]").html(areaHtml).removeAttr("disabled");        form.render();    }    var address = new Address();    exports("address",function(){        address.provinces();    });});