<?php
if(isset($_COOKIE['token']) && isset($_COOKIE['user'])){
include_once './php/connect.php';
  $user = strim($_COOKIE['user']);
  $token = strim($_COOKIE['token']);
  $res = $DB->query("select * from aliyun_user where name='$user' and token='$token' limit 1");
 $res = $DB->fetch($res);
 if($user !== $res['name']){
    setcookie("user",'',time()-8600);
    setcookie("token",'',time()-8600);
    echo '
<script language="javascript" type="text/javascript">
alert("你的账号可能更改了密码,请重新登陆！");
window.location.href = "./login.php"; 
</script>';
 }else{
    setcookie("user",$_COOKIE['user'],time()+8600);
    setcookie("token",$_COOKIE['token'],time()+8600);
    if(isset($_GET['out'])){
       setcookie("user",'',time()-8600);
       setcookie("token",'',time()-8600);
       echo '
      <script language="javascript" type="text/javascript">
      window.location.href = "./login.php"; 
      </script>';
    }

  }
}else{
  echo '
<script>
window.location.href = "./logintip.php"; 
</script>';
}
?>