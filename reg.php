<?php
session_start();
include_once './php/connect.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <title>用户注册 | 阿里云管理平台 www.bdwml.cn</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="./css/amazeui.min.css"/>
  <style>
    .header {
      text-align: center;
      height:200px;
      margin-bottom:30px;
    }
    .header h1 {
      font-size: 200%;
      color: #FFF;
      margin-top: 70px;
    }
    .header p {
      font-size: 14px;
      color: #fff;
    }
    #header_a{
      height: 200px;
      background:#FFF url('./images/china.png') no-repeat 50%;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g" id="header_a">
    <h1>阿里云管理面板</h1>
    <p>注册账号开始使用吧</p>
  </div>
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
  <p style="text-align: center;">
<?php
if(isset($_POST['submit'])){
  $user =strim($_POST['user']);
  $pass =strim($_POST['pass']);
  $spass =strim($_POST['spass']);
  $code = strim($_POST['code']);
if(trim($code) !== $_SESSION["code"]){
   die('<strong class="am-text-danger">error - 验证码不正确！</strong><br><br>
          <a href="reg.php" class="am-btn am-btn-default am-btn-sm">重新注册</a>
      ');
}

$user = trim($user);
if(strlen($user)<5){
   die('<strong class="am-text-danger">error - 用户名太短,最少5位数！</strong><br><br>
          <a href="reg.php" class="am-btn am-btn-default am-btn-sm">重新注册</a>
      ');
}


if($pass != $spass){
     die('<strong class="am-text-danger">error - 输入的确认密码不一致！</strong><br><br>
          <a href="reg.php" class="am-btn am-btn-default am-btn-sm">重新注册</a>
      ');
  }else{
   if(strlen($spass)<5){
   die('<strong class="am-text-danger">error - 密码太短,最少5位数！</strong><br><br>
          <a href="reg.php" class="am-btn am-btn-default am-btn-sm">重新注册</a>
      ');
}

$res = $DB->query("select name from aliyun_user where name='$user'");
if($res->num_rows){
  echo '<strong class="am-text-danger">error - 用户名已存在！</strong>';
}else{
$token = md5($user.$spass.'blogle.cn');
$res = $DB->query("insert into aliyun_user (name,pass,token) values ('$user','$pass','$token')");
if($res){
  setcookie("user",$user,time()+8600);
  setcookie("token",$token,time()+8600);
  echo '
<strong class="am-text-success" id="tip"></strong>
<script language="javascript" type="text/javascript">
document.getElementById("tip").innerHTML = "注册成功 - 3秒后自动登录";
var i = 2; 
var intervalid; 
intervalid = setInterval("fun()", 1000); 
function fun() {
if (i < 1) { 
window.location.href = "./index.php"; 
clearInterval(intervalid);
} 
document.getElementById("tip").innerHTML = "注册成功 - "+i+"秒后自动登录"; 
i--; 
}
</script>';
  }else{
    die('<strong class="am-text-danger">error:3306 - 系统发生错误！</strong><br><br>
          <a href="reg.php" class="am-btn am-btn-default am-btn-sm">重新注册</a>
      ');
  }

}}}else{
    setcookie("user",'',time()-8600);
    setcookie("token",'',time()-8600);
}
 ?>
  </p>
    <form method="post" class="am-form">
      <label id="tip" for="username">账号:　</label><span id="ucheck"></span>
      <input type="text" name="user" id="user" placeholder="输入用户名">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="pass" id="pass" placeholder="输入密码">
      <br />
      <label for="password">确认密码:　</label><span id="pcheck"></span>
      <input type="password" name="spass" id="spass" placeholder="再次输入密码">
      <br />
<div id="ccheck" class="am-form-inline">
          <label for="code">验证码:</label>
          <img id="mcode" src="./php/code.php" alt="code" style="height:30px;margin:0 0 5px 10px" onclick="changcode()">
          <input type="text" class="am-form-field" name="code" id="code" placeholder="输入验证码">
</div><br>
      <div class="am-cf">
        <input id="regbtn" type="submit" name="submit" value="立即注册" class="am-btn am-btn-primary am-btn-sm am-fl" disabled>
        <a href="login.php" class="am-btn am-btn-success am-btn-sm am-fr">返回登录</a>
      </div>
    </form>
    <hr style="margin-top: 80px;">
    <p style="text-align: center;">© 2016 www.686u.cn - 闪电QQ:81362590</p>
  </div>
</div>
<script src="./js/jquery.min.js"></script>
<script>
var uc=false,pc=false;
$("#user").blur(function(){
  var user = $("#user").val();
  $.post('check.php?checkname',{
   user:user
  },function(data, status) {
    if(data.code !== '0'){
      uc=false;
      $("#regbtn").attr("disabled",true);
    }else{uc=true;if(pc){$("#regbtn").removeAttr("disabled");}}
   $("#ucheck").html(data.msg);
  },"json");
});
$("#spass,#pass").blur(function(){
  var pass = $("#pass").val();
  var spass = $("#spass").val();
  $.post('check.php?checkpass',{
    pass:pass,
   spass:spass
  },function(data, status) {
    if(data.code !== '0'){
      pc=false;
      $("#regbtn").attr("disabled",true);
    }else{pc=true;if(uc){$("#regbtn").removeAttr("disabled");}}
   $("#pcheck").html(data.msg);
  },"json");
});
$("#code").focus(function(){$("#regbtn").removeAttr("disabled");});
$("#code").blur(function(){
  var code = $("#code").val();
  $.post('check.php?checkcode',{
   code:code
  },function(data, status) {
    if(data.code !== '0'){
      $('#cicon').remove();
      $("#ccheck").removeClass("am-form-success").addClass("am-form-error am-form-icon");
      $("#ccheck").append('<span id="cicon" class="am-icon-times"></span>');
    }else{
      $('#cicon').remove();
      $("#ccheck").removeClass("am-form-error").addClass("am-form-success am-form-icon");
      $("#ccheck").append('<span id="cicon" class="am-icon-check"></span>');
      }
  },"json");
});
function changcode() {
  document.getElementById("mcode").src = "./php/code.php?" + Math.random();
}
//    if(data.code !== '0'){$("#regbtn").attr("disabled",true);}else{$("#regbtn").removeAttr("disabled");}
</script>
</body>
</html>
