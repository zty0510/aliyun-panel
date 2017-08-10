<?php
include_once '../php/connect.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Admin | 阿里云管理平台</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="../css/amazeui.min.css"/>
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
      background:#FFF url('../images/china.png') no-repeat 50%;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g" id="header_a">
    <h1>阿里云管理面板</h1>
    <p>登录后台管理用户</p>
  </div>
</div>

<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
  <p style="text-align: center;">
  <?php 
  if(isset($_POST['submit'])){
  $user =strim($_POST['user']);
  $pass =strim($_POST['pass']);
 $res = $DB->query("select * from aliyun_admin where name='$user' and pass='$pass' limit 1");
 $res = $DB->fetch($res);
 if($user !== $res['name']){
    setcookie("user",'',time()-8600);
    setcookie("token",'',time()-8600);
    echo '<strong class="am-text-danger">error - 账号或密码错误！</strong>';
 }else{
    $token = md5($user.$pass.md5('blogle.cn'));
    setcookie("user",$user,time()+8600);
    setcookie("token",$token,time()+8600);
    echo '
<strong class="am-text-success" id="tip"></strong>
<script language="javascript" type="text/javascript">
document.getElementById("tip").innerHTML = "登陆成功 - 3秒后进入管理页面";
var i = 2; 
var intervalid; 
intervalid = setInterval("fun()", 1000); 
function fun() {
if (i < 1) { 
window.location.href = "./index.php"; 
clearInterval(intervalid);
} 
document.getElementById("tip").innerHTML = "登陆成功 - "+i+"秒后进入管理页面"; 
i--; 
}
</script>';
 }}else{
    setcookie("user",'',time()-8600);
    setcookie("token",'',time()-8600);
 }
 ?>
  </p>
    <form method="post" class="am-form">
      <label for="username">账号:</label>
      <input type="text" name="user" id="user">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="pass" id="pass">
      <br />
      <div class="am-cf">
        <input type="submit" name="submit" value="立即登录" class="am-btn am-btn-success am-btn-sm am-center">
      </div>
    </form>
    <hr style="margin-top: 80px;">
    <p style="text-align: center;">© 2016 www.bdwml.cn - MeteorQQ：872125493</p>
  </div>
</div>
</body>
</html>