<?php
include_once './v.php';
include_once './header.php';
?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
        <div class="am-cf"><strong class="am-text-primary am-text-lg">管理模块</strong> / <small>修改管理密码</small></div>
      </div>
      <div class="am-g">
        <div class="am-u-md-12">

<?php 
if(isset($_GET['action'])){
  if($_GET['action']=='epass'){
      $user = $_COOKIE['user'];
      $jpass = $_POST['jpass'];
      $pass = $_POST['pass'];
      $spass = $_POST['spass'];
      //$token = md5($user.$pass.md5('blogle.cn'));
      if($pass !== $spass){
          $msg ='<div class="am-alert am-alert-warning am-text-center am-text-xl" data-am-alert>俩次输入新密码不一致,我怎么知道你改哪个？<br>给我重新修改一次！</div>';
          $spage = '<a href="javascript:history.go(-1)" class="am-btn am-btn-success am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回修改</a>';
      }else{
           $res = $DB->query("select * from aliyun_user where name='$user' and pass='$jpass' limit 1");
           $res = $DB->fetch($res);
           if($jpass !== $res['pass']){
              $msg ='<div class="am-alert am-alert-warning am-text-center am-text-xl" data-am-alert>旧密码不正确</div>';
              $spage = '<a href="javascript:history.go(-1)" class="am-btn am-btn-success am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回修改</a>';
            }else{
              $token = md5($user.$spass.'blogle.cn');
              $res = $DB->query("update aliyun_user set pass='$spass',token='$token' where name='$user'");
              if($res){
                  $msg ='<div class="am-alert am-alert-success am-text-center am-text-xl" data-am-alert>修改密码成功</div>';
                  $spage = '<a href="javascript:history.go(-2)" class="am-btn am-btn-success am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回页面</a>';
              }else{
                 $msg ='<div class="am-alert am-alert-danger am-text-center am-text-xl" data-am-alert>error:3306 修改密码失败</div>';
                 $spage = '<a href="javascript:history.go(-1)" class="am-btn am-btn-success am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回修改</a>';
              }
            }
      }
          echo $msg;
          echo $spage;
  }

}else{
?>
      <form class="am-form" method="post" action="./pass.php?action=epass">
         <input type="text" name="jpass" placeholder="输入旧密码"><br>
         <input type="text" name="pass" placeholder="输入新密码"><br>
         <input type="text" name="spass" placeholder="再次输入新密码"><br>
         <button type="submit" class="am-btn am-btn-success am-btn-block">确认修改</button>
     </form>
 <?php } ?>
        </div>
      </div>
    </div>
<?php include_once './footer.php'; ?>
</body>
</html>