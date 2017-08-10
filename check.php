<?php
session_start();
include_once './php/connect.php';

function checkname($user,$DB){
  $res = $DB->query("select name from aliyun_user where name='$user'");
  return $res->num_rows;
}
if(isset($_GET['checkname'])){
$user = strim($_POST['user']);
$user = trim($user);
if(strlen($user)<5){
  $arr['code'] = '2';
  $arr['msg'] = '<span class="am-text-danger">用户名太短,最少5位数！</span>';
   echo json_encode($arr);
  }else{
if(checkname($user,$DB)){
  $arr['code'] = '1';
  $arr['msg'] = '<span class="am-text-danger">该用户名已存在！</span>';
   echo json_encode($arr);
 }else{
  $arr['code'] = '0';
  $arr['msg'] = '<span class="am-text-success">用户名可用</span>';
   echo json_encode($arr);
 	}
  }
}elseif(isset($_GET['checkpass'])){
$pass = strim($_POST['pass']);
$spass = strim($_POST['spass']);
$pass = trim($pass);
$spass = trim($spass);
if(strlen($spass)<5){
  $arr['code'] = '1';
  $arr['msg'] = '<span class="am-text-danger">密码太短,最少5位数！</span>';
   echo json_encode($arr);
  }else{
    if($pass !== $spass){
        $arr['code'] = '2';
        $arr['msg'] = '<span class="am-text-danger">输入的确认密码不一致！</span>';
        echo json_encode($arr);
    }else{
        $arr['code'] = '0';
        $arr['msg'] = '<span class="am-text-success">密码可用</span>';
        echo json_encode($arr);
      }
  }
}elseif(isset($_GET['checkcode'])){
$code = strim($_POST['code']);
if(trim($code) !== $_SESSION["code"]){
  $arr['code'] = '1';
  $arr['msg'] = '<span class="am-text-danger">验证码不正确！</span>';
   echo json_encode($arr);
  }else{
    $arr['code'] = '0';
    $arr['msg'] = '<span class="am-text-success">验证码正确</span>';
    echo json_encode($arr);
  }
}


 ?>