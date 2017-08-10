var vw = $(window).width()*1; //浏览器宽度小于568px提示框
var phone;
  if(vw < 568){
    phone = true;
    $("#my-alert .am-modal-bd").html('您好像是用手机浏览,宽度有点小哦,可使用横屏浏览部分无法看到的内容哦！');
    $("#my-alert").modal();
  }

function status(fid,diqu){
    $("#zt").html('<img src="./images/loading1.gif" alt="ing" style="width:20px;height:20px">');
    $("#os").html('<img src="./images/loading1.gif" alt="ing" style="width:20px;height:20px">');
  $.ajax({
    type:"post",
    url:"./php/api.php?action=updata",
    dataType:'json',
    data:{
      'fid':fid,
      'diqu':diqu
    },
    async:true,
    success:function(data){
      var data = data['Instance'][0];
      if(!data){
            $("#zt").html('Null');
            $("#os").html('Null');
            $("#my-alert .am-modal-bd").html('获取服务器信息失败,该服务器可能被删除或者更改！');
            $("#my-alert").modal();
         return false;
      }
      //var ip= data['EipAddress'].IpAddress;
      var ImageId = data['ImageId'];
      var os;
      switch(ImageId){
        case 'centos7u2_64_40G_cloudinit_20160520.raw':
        os = 'CentOS  7.2 64位';
        break;
        case 'centos7u0_64_40G_aliaegis_20160120.vhd':
        os = 'CentOS  7.0 64位';
        break;
        case 'centos6u5_32_40G_cloudinit_20160427.raw':
        os = 'CentOS  6.5 32位';
        break;
        case 'centos6u5_64_40G_cloudinit_20160427.raw':
        os = 'CentOS  6.5 64位';
        break;
        case 'centos5u10_64_40G_cloudinit_20160427.raw':
        os = 'CentOS  5.10 64位';
        break;
        case 'win2012_64_stand_cn_40G_alibase_20150429.vhd':
        os = 'Windows2012标准版 64位中文版';
        break;
        case 'win2008_64_ent_r2_cn_40G_alibase_20160630.vhd':
        os = 'Windows2008R2企业版 64位中文版';
        break;
        case 'win2008_64_stand_r2_cn_40G_alibase_20150429.vhd':
        os = 'Windows2008R2标准版 64位中文版';
        break;
        case 'win2003_64_ent_r2_cn_40G_alibase_20141223.vhd':
        os = 'Windows2003R2企业版 64位中文版';
        break;
        case 'win2003_32_stand_r2_cn_40G_alibase_20141114.vhd':
        os = ' Windows2003R2标准版 32位中文版';
        break;
        default:
        os = '非官方系统无法查询';
      }
      var zt = data['Status'];
if(zt == "Starting"){zt = "启动中";}else if(zt == "Running"){zt = "运行中";}else if(zt == "Stopped"){zt = "已停止";}else if(zt == "Stopping"){zt = "停止中";}
    $("#zt").html(zt);
    $("#os").html(os);
    },
    error:function(){
    $("#zt").html('1004出错了');
    $("#os").html('1004出错了');
    $("#flist").css("display","none");
    $("#my-alert .am-modal-bd").html('1004出错了,请向站长汇报情况！');
    $("#my-alert").modal();
    }
  }); //ajax 结束
}

var $selected = $('#js-selected');
var fid,diqu,int;
$selected.on('change', function() {
      var selectedOption = $(this).find('option').eq(this.selectedIndex);
      var select = selectedOption.val();
      if(select.indexOf("#") > 0 ){
      var fmsg = new Array();
      fmsg=select.split("#");
      fid = fmsg[0];
      diqu = fmsg[1];
  $("#loding").css('display','block');
  $("#flist").css("display","none");
  $.ajax({
    type:"post",
    url:"./php/api.php?action=updata",
    dataType:'json',
    data:{
      'fid':fid,
      'diqu':diqu
    },
    async:true,
    success:function(data){
      var data = data['Instance'][0];
      if(!data){
         $("#loding").css('display','none');
    $("#my-alert .am-modal-bd").html('获取服务器信息失败,该服务器可能被删除或者更改！');
    $("#my-alert").modal();
         return false;
      }
      //var ip= data['EipAddress'].IpAddress;
      var ImageId = data['ImageId'];
      var os='';
      switch(ImageId){
        case 'centos7u2_64_40G_cloudinit_20160520.raw':
        os = 'CentOS  7.2 64位';
        break;
        case 'centos7u0_64_40G_aliaegis_20160120.vhd':
        os = 'CentOS  7.0 64位';
        break;
        case 'centos6u5_32_40G_cloudinit_20160427.raw':
        os = 'CentOS  6.5 32位';
        break;
        case 'centos6u5_64_40G_cloudinit_20160427.raw':
        os = 'CentOS  6.5 64位';
        break;
        case 'centos5u10_64_40G_cloudinit_20160427.raw':
        os = 'CentOS  5.10 64位';
        break;
        case 'win2012_64_stand_cn_40G_alibase_20150429.vhd':
        os = 'Windows2012标准版 64位中文版';
        break;
        case 'win2008_64_ent_r2_cn_40G_alibase_20160630.vhd':
        os = 'Windows2008R2企业版 64位中文版';
        break;
        case 'win2008_64_stand_r2_cn_40G_alibase_20150429.vhd':
        os = 'Windows2008R2标准版 64位中文版';
        break;
        case 'win2003_64_ent_r2_cn_40G_alibase_20141223.vhd':
        os = 'Windows2003R2企业版 64位中文版';
        break;
        case 'win2003_32_stand_r2_cn_40G_alibase_20141114.vhd':
        os = ' Windows2003R2标准版 32位中文版';
        break;
        default:
        os = '非官方系统无法查询';
      }
      var endtime = data['ExpiredTime'];
      var dk = data['EipAddress'].Bandwidth ? data['EipAddress'].Bandwidth :data['InternetMaxBandwidthOut'];
      var zt= data['Status'];
if(zt == "Starting"){zt = "启动中";}else if(zt == "Running"){zt = "运行中";}else if(zt == "Stopped"){zt = "已停止";}else if(zt == "Stopping"){zt = "停止中";}
      switch(diqu){
        case 'ap-southeast-1':
        dq = '新加坡';
        break;
        case 'cn-shenzhen':
        dq = '华南-深圳';
        break;
        case 'cn-qingdao':
        dq = '华北-青岛';
        break;
        case 'cn-beijing':
        dq = '华北-北京';
        break;
        case 'cn-shanghai':
        dq = '华东-上海';
        break;
        case 'us-east-1':
        dq = '美东-弗吉尼亚';
        break;
        case 'cn-hongkong':
        dq = '中国-香港';
        break;
        case 'cn-hangzhou':
        dq = '华东-杭州';
        break;
        case 'us-west-1':
        dq = '美西-硅谷';
        break;
        default:
        dq = '未知地区';
      }
    $("#fid").html(fid);
    $("#diqu").html(dq);
    $("#dk").html(dk+'M');
    $("#zt").html(zt);
    $("#os").html(os);
    $("#zll").html(selectedOption.attr('data-zll'));
    $("#yll").html(selectedOption.attr('data-yll'));
    $("#endtime").html(endtime);
    $("#loding").css('display','none');
    $("#flist").css("display","block");
    $("#oktip").html("获取服务器信息成功...");
    $('#ok-alert').fadeIn("show");
    $('#ok-alert').hide(2000);
    },
    error:function(){
      $("#loding").css('display','none');
    $("#my-alert .am-modal-bd").html('1004出错了,请向站长汇报情况！');
    $("#my-alert").modal();
    }
  }); //ajax 结束
   window.clearInterval(int);
   int=self.setInterval("autodata()",5000);
}
});// 选择框更改事件结束
function autodata(){
  status(fid,diqu);
}
$("#updata").on("click",function(){
  status(fid,diqu);
});
$("#start").on("click",function(){
   var zt = $("#zt").html();
   if(zt != '已停止'){
    $("#my-alert .am-modal-bd").html('注意：只有服务器状态是已停止，才能执行开机命令<br>这个功能一般用于重装系统之后的开机。');
    $("#my-alert").modal();
    return false;
   }
  // 需 判断当前状态，再执行 
  $.ajax({
    type:"post",
    url:"./php/api.php?action=start",
    dataType:'json',
    data:{
      'fid':fid,
      'diqu':diqu
    },
    async:true,
    success:function(data){
      var RequestId = data['RequestId'];
      if(!RequestId){
        $("#my-alert .am-modal-bd").html('1003出错了,请向站长汇报情况！');
        $("#my-alert").modal();
        return false;
      }
      status(fid,diqu);
      $("#oktip").html("ok,发送开机命令成功！");
      $('#ok-alert').fadeIn("show");
      $('#ok-alert').hide(2000);
    },
    error:function(){
    $("#zt").html('1002出错了');
    $("#os").html('1002出错了');
    $("#my-alert .am-modal-bd").html('1002出错了,请向站长汇报情况！');
    $("#my-alert").modal();
    }
    });

});
 
$("#stop").on("click",function(){
  var zt = $("#zt").html();
   if(zt != '运行中'){
    $("#my-alert .am-modal-bd").html('注意：只有服务器状态是运行中，才能执行关机命令。');
    $("#my-alert").modal();
    return false;
   }
  $.ajax({
    type:"post",
    url:"./php/api.php?action=stop",
    dataType:'json',
    data:{
      'fid':fid,
      'diqu':diqu
    },
    async:true,
    success:function(data){
      var RequestId = data['RequestId'];
      if(!RequestId){
        $("#my-alert .am-modal-bd").html('1003出错了,请向站长汇报情况！');
        $("#my-alert").modal();
        return false;
      }
      status(fid,diqu);
      $("#oktip").html("ok,发送关机命令成功！");
      $('#ok-alert').fadeIn("show");
      $('#ok-alert').hide(2000);
    },
    error:function(){
    $("#zt").html('1002出错了');
    $("#os").html('1002出错了');
    $("#my-alert .am-modal-bd").html('1002出错了,请向站长汇报情况！');
    $("#my-alert").modal();
    }
    });
});

$("#restart").on('click',function(){
var zt = $("#zt").html();
   if(zt != '运行中'){
    $("#my-alert .am-modal-bd").html('注意：只有服务器状态是运行中，才能执行重启命令。');
    $("#my-alert").modal();
    return false;
   }
$.ajax({
    type:"post",
    url:"./php/api.php?action=restart",
    dataType:'json',
    data:{
      'fid':fid,
      'diqu':diqu
    },
    async:true,
    success:function(data){
      var RequestId = data['RequestId'];
      if(!RequestId){
        $("#my-alert .am-modal-bd").html('1003出错了,请向站长汇报情况！');
        $("#my-alert").modal();
        return false;}
      status(fid,diqu);
      $("#oktip").html("ok,发送重启命令成功！");
      $('#ok-alert').fadeIn("show");
      $('#ok-alert').hide(2000);
    },
    error:function(){
    $("#zt").html('1002出错了');
    $("#os").html('1002出错了');
    $("#my-alert .am-modal-bd").html('1002出错了,请向站长汇报情况！');
    $("#my-alert").modal();
    }
    });
});

$("#refpass").on('click',function(){
var zt = $("#zt").html();
   if(zt == '启动中'){
    $("#my-alert .am-modal-bd").html('注意：只有服务器状态是运行中或者停止，才能修改密码。');
    $("#my-alert").modal();
    return false;
   }
   // if(phone){
   // $("#pass-alert").modal({dimmer:false});
   // }else{
    $("#pass-alert").modal();
   // }
});

$("#yespass").on('click',function(){
  var pass = $("#pass").val();
$.ajax({
    type:"post",
    url:"./php/api.php?action=refpass",
    dataType:'json',
    data:{
      'fid':fid,
      'pass':pass,
      'diqu':diqu
    },
    async:true,
    success:function(data){
      $("#pass").val('');
      $("#pass-alert").modal('close');
      var RequestId = data['RequestId'];
      if(!RequestId){
        $("#my-alert .am-modal-bd").html('1003出错了,请向站长汇报情况！');
        $("#my-alert").modal();
        return false;}
      status(fid,diqu);
      $("#oktip").html("ok,修改密码成功！密码为："+pass);
      $('#ok-alert').fadeIn("show");
      $('#ok-alert').hide(2000);
    },
    error:function(){
    $("#pass").val('');
    $("#pass-alert").modal('close');
    $("#my-alert .am-modal-bd").html('密码不符合要求格式，请按照格式修改！');
    $("#my-alert").modal();
    status(fid,diqu);
    }
    });
});

$("#cxll").on('click',function(){
  $("#my-alert .am-modal-bd").html('功能未上线,敬请期待！');
  $("#my-alert").modal();
});

$("#changeos").on('click',function(){
  var zt = $("#zt").html();
   if(zt != '已停止'){
    $("#os-alert").modal('close');
    $("#my-alert .am-modal-bd").html('注意：只有服务器状态是已停止，才能执行更换系统命令。');
    $("#my-alert").modal();
    return false;
   }
   // if(phone){
   // $("#os-alert").modal({dimmer:false});
   // }else{
    $("#os-alert").modal();
   // }
});
var ImageId,uos;
$("#os-selected").on('change', function() {
   ImageId = $(this).find('option').eq(this.selectedIndex).val();
   uos = $(this).find('option').eq(this.selectedIndex).text();
});
$("#yesos").on('click',function(){
$("#yesos i").removeClass("am-icon-check").addClass("am-icon-spinner am-icon-spin");
$("#yesos").addClass("am-disabled");
$.ajax({
    type:"post",
    url:"./php/api.php?action=changeos",
    dataType:'json',
    data:{
      'fid':fid,
      'ImageId':ImageId,
      'diqu':diqu
    },
    async:true,
    success:function(data){
    $("#yesos i").addClass("am-icon-check").removeClass("am-icon-spinner am-icon-spin");
    $("#yesos").removeClass("am-disabled");
      $("#os-alert").modal('close');
      var DiskId = data['DiskId'];
      if(!DiskId){
        $("#my-alert .am-modal-bd").html('1003出错了,请向站长汇报情况！');
        $("#my-alert").modal();
        return false;
      }
      status(fid,diqu);
      upos(diqu,fid,uos);
      $("#oktip").html("ok,发送更换系统命令成功，请稍后更新状态查看！");
      $('#ok-alert').fadeIn("show");
      $('#ok-alert').hide(2000);
    },
    error:function(){
    $("#yesos i").addClass("am-icon-check").removeClass("am-icon-spinner am-icon-spin");
    $("#yesos").removeClass("am-disabled");
    $("#os-alert").modal('close');
    $("#zt").html('1002出错了');
    $("#os").html('1002出错了');
    $("#my-alert .am-modal-bd").html('1002出错了,请向站长汇报情况！');
    $("#my-alert").modal();
    }
    });
});

function upos(diqu,fid,os){
  $.ajax({
    type:"post",
    url:"./php/api.php?action=upos",
    dataType:'json',
    data:{
      'fid':fid,
      'diqu':diqu,
      'os':os
    },
    async:true,
    success:function(data){
      if(data.code !=='0'){
        $("#my-alert .am-modal-bd").html('error: 3306,upos出错了!');
        $("#my-alert").modal();
        return false;
      }
    },
    error:function(){
    $("#os").html('出错了！');
    $("#my-alert .am-modal-bd").html('error: upos,出错了!');
    $("#my-alert").modal();
    }
  }); //ajax 结束
}
