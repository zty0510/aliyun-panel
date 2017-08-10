<?php
include_once './v.php';include_once './header.php';?>
<!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
<!-- <select id="js-selected" placeholder="请选择服务器" data-am-selected="{btnWidth: '100%', btnSize: 'lg', btnStyle: 'secondary'}">
  <option value="" selected></option>
  <option value="1" selected>上海</option>
  <option value="2" selected>杭州</option>
  <option value="3" selected>深圳</option>
</select> -->
<!-- <div id="loding" style="margin:50px 30%;display: none;">
<img src="./images/loding.gif" alt="loding">
</div> -->
<?php
$my=isset($_GET['my'])?$_GET['my']:null;$cron='';if($my=='peizhi'){$name =$_GET['name'];echo '
<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><a href="./ulist.php">用户配置</a></strong> / <small>'.$name.'</small></div>
      </div>

    <div class="am-g">
        <div class="am-u-sm-12">
<a href="javascript:history.go(-1)" class="am-btn am-btn-danger am-btn-xs am-btn-block">
<i class="am-icon-reply"></i>
返回用户列表
</a>
<div class="am-cf"></div>
<hr >
<form class="am-form" action="./ulist.php?my=upzok" method="post">
<input type="hidden" id="name" name="name" value="'.$name.'">
  <div class="am-form-group">
    <label for="diqu-selected">所属地区</label>
      <select name="diqu" id="diqu-selected" data-am-selected="{btnWidth: \'100%\',maxHeight: 100, btnSize: \'md\', btnStyle: \'secondary\'}">
         <option value="cn-hangzhou">华东-杭州</option>
         <option value="cn-shanghai">华东-上海</option>
         <option value="cn-shenzhen">华南-深圳</option>
         <option value="cn-beijing">华北-北京</option>
         <option value="cn-qingdao">华北-青岛</option>
         <option value="cn-hongkong">中国-香港</option>
         <option value="ap-southeast-1">新加坡</option>
         <option value="us-east-1">美东-弗吉尼亚</option>
         <option value="us-west-1">美西-硅谷</option>
      </select>
  </div>

  <div class="am-form-group">
    <label for="fid">实例ID</label>
      <input type="text" id="fid" name="fid" placeholder="如：i-56dpeyw8n">
  </div>

  <div class="am-form-group">
    <label for="os-selected">镜像系统</label>
        <select name="os" id="os-selected" data-am-selected="{btnWidth: \'100%\',maxHeight: 100, btnSize: \'md\', btnStyle: \'secondary\'}">
         <option value="CentOS  7.2 64位">CentOS  7.2 64位</option>
         <option value="CentOS  7.0 64位">CentOS  7.0 64位</option>
         <option value="CentOS  6.5 32位">CentOS  6.5 32位</option>
         <option value="CentOS  6.5 64位">CentOS  6.5 64位</option>
         <option value="Windows2012标准版 64位">Windows2012标准版 64位</option>
         <option value="Windows2008R2企业版 64位">Windows2008R2企业版 64位</option>
         <option value="Windows2008R2标准版 64位">Windows2008R2标准版 64位</option>
         <option value="Windows2003R2企业版 64位">Windows2003R2企业版 64位</option>
         <option value="Windows2003R2标准版 32位">Windows2003R2标准版 32位</option>
      </select>
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-pwd-2">IP</label>
      <input type="text" name="ip" placeholder="输入服务器IP">
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-pwd-2">Eip[用于流量监控]</label>
      <input type="text" name="eip" placeholder="如：eip-uf6hflppmvk59ssu">
  </div>

  <div class="am-form-group">
    <label for="doc-ipt-pwd-2">带宽</label>
      <input type="text" name="dk" placeholder="如：30M">
  </div>

  <div class="am-form-group">
      <button type="submit" class="am-btn am-btn-md am-btn-success am-btn-block">
  <i class="am-icon-check-circle"></i>
      提交保存</button>
  </div>
</form>
    </div>
  </div>
 ';}elseif($my=='upzok'){$name =trim($_POST['name']);$diqu =trim($_POST['diqu']);$fid =trim($_POST['fid']);$os =trim($_POST['os']);$ip =trim($_POST['ip']);$eip =trim($_POST['eip']);$dk =trim($_POST['dk']);echo '
<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><a href="./ulist.php">用户配置</a></strong> / <small>'.$name.'</small></div>
      </div>

    <div class="am-g">
        <div class="am-u-sm-12">';if($name=='' || $diqu =='' || $fid=='' || $os=='' || $eip=='' || $ip=='' || $dk==''){echo '<div class="am-alert am-alert-danger am-text-center am-text-xxxl" data-am-alert>
                    请检查配置内容，每项都不能为空哦！
                </div>';echo '<a href="javascript:history.go(-1)" class="am-btn am-btn-success am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回用户配置</a>';}else{$res =$DB->insert("insert into aliyun_flist (user,fid,diqu,ip,dk,os,eip,zll,addtime) values ('$name','$fid','$diqu','$ip','$dk','$os','$eip','无限',now())");if($res){$lastday =date("Y-m-d ",strtotime("-1 day")).'00:00:00';$res =$DB->insert("insert into aliyun_yll (user,eip,zll,addtime) values ('$name','$eip','无限','$lastday')");$cron ='流量监控地址：http://安装路径/php/cron.php?user='.$name.'&eip='.$eip.'&diqu='.$diqu;$msg ='<div class="am-alert am-alert-success am-text-center am-text-lg" data-am-alert>
                    恭喜您为用户名:['.$name.']<br>配置服务器['.$ip.']成功！
                    <br>'.$cron.'</div>';}else{$msg ='<div class="am-alert am-alert-warning am-text-center am-text-xl" data-am-alert>
                    error:3306 抱歉您为用户名:['.$name.']<br>配置服务器['.$ip.']失败！
                </div>';}echo $msg;echo '<a href="javascript:history.go(-1)" class="am-btn am-btn-success am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回用户配置</a>';}}else if($my=='query'){$name =$_GET['name'];echo '<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><a href="./ulist.php">用户详情配置</a></strong> / <small>'.$name.'</small></div>
      </div>
    <div class="am-g">
        <div class="am-u-sm-12">
<a href="javascript:history.go(-1)" class="am-btn am-btn-danger am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回用户列表</a>
<div id="flist" class="am-scrollable-horizontal" style="margin-top: 50px;margin-bottom: 145px;">
  <table class="am-table am-table-bordered am-table-striped am-text-nowrap am-table-centered ">
          <thead><tr><th>实例ID</th><th>所属地区</th><th>IP</th><th>带宽</th><th>系统</th><th>操作</th></tr></thead>
          <tbody>
        ';$numrows =$DB->count("SELECT count(*) from aliyun_flist WHERE user='$name'");$pagesize=5;$pages=intval($numrows/$pagesize);if ($numrows%$pagesize){$pages++;}if (isset($_GET['page'])){$page=intval($_GET['page']);}else{$page=1;}$offset=$pagesize*($page - 1);$rs=$DB->query("SELECT * FROM aliyun_flist WHERE user='$name' order by id ASC limit $offset,$pagesize");while($res =$DB->fetch($rs)){echo '<tr><td><b>'.$res['fid'].'</b></td><td>'.$res['diqu'].'</td><td>'.$res['ip'].'</td><td>'.$res['dk'].'</td><td>'.$res['os'].'</td><td><a href="./ulist.php?my=fdel&fid='.$res['fid'].'" class="am-btn am-btn-danger am-btn-sm">删除</a></td></tr>';}echo '</tbody></table>';echo'<ul class="am-pagination">';$first=1;$prev=$page-1;$next=$page+1;$last=$pages;if ($page>1){echo '<li class="am-pagination-first"><a href="ulist.php?my=query&name='.$name.'&page='.$first.'">首页</a></li>';echo '<li><a href="ulist.php?my=query&name='.$name.'&page='.$prev.'">&laquo;</a></li>';}else {echo '<li class="am-pagination-first"><a class="am-btn am-btn-primary am-disabled">首页</a></li>';echo '<li><a class="am-btn am-btn-primary am-disabled">&laquo;</a></li>';}for ($i=1;$i<$page;$i++)echo '<li><a href="ulist.php?my=query&name='.$name.'&page='.$i.'">'.$i .'</a></li>';echo '<li><a class="am-btn am-btn-primary am-disabled">'.$page.'</a></li>';for ($i=$page+1;$i<=$pages;$i++)echo '<li><a href="ulist.php?my=query&name='.$name.'&page='.$i.'">'.$i .'</a></li>';echo '';if ($page<$pages){echo '<li><a href="ulist.php?my=query&name='.$name.'&page='.$next.'">&raquo;</a></li>';echo '<li class="am-pagination-last"><a href="ulist.php?my=query&name='.$name.'&page='.$last.'">尾页</a></li>';}else {echo '<li><a class="am-btn am-btn-primary am-disabled">&raquo;</a></li>';echo '<li class="am-pagination-last"><a class="am-btn am-btn-primary am-disabled">尾页</a></li>';}echo'</ul></div></div></div>';}else if($my=='fdel'){$fid =$_GET['fid'];echo '
  <a href="javascript:history.go(-1)" class="am-btn am-btn-danger am-btn-md am-btn-block"><i class="am-icon-reply"></i> 取消返回</a>
<div class="am-alert am-alert-warning am-text-center am-text-xl" data-am-alert>您确定要删除实例ID:['.$fid.'] 这台服务器吗？<br>注：只是从后台管理面板移除,不是真正的从阿里云删除！</div><br>
  <a href="./ulist.php?my=yesfdel&fid='.$fid.'" class="am-btn am-btn-success am-btn-md am-btn-block"><i class="am-icon-trash"></i> 确定删除</a>';}else if($my=='yesfdel'){$fid =$_GET['fid'];$res =$DB->query("delete from aliyun_flist where fid='$fid'");if($res){$msg ='<div class="am-alert am-alert-success am-text-center am-text-xl" data-am-alert>服务器['.$fid.'] 成功从后台删除！</div>';}else{$msg ='<div class="am-alert am-alert-warning am-text-center am-text-xl" data-am-alert>error:3306 服务器['.$fid.'] 从后台删除失败！</div>';}echo $msg;echo '<a href="javascript:history.go(-3)" class="am-btn am-btn-success am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回用户列表</a>';}else if($my=='yesudel'){$name =$_GET['name'];$res =$DB->query("delete from aliyun_user where name='$name'");if($res){$res =$DB->query("delete from aliyun_flist where user='$name'");$msg ='<div class="am-alert am-alert-success am-text-center am-text-xl" data-am-alert>用户名：['.$name.'] 成功从后台删除！</div>';}else{$msg ='<div class="am-alert am-alert-warning am-text-center am-text-xl" data-am-alert>error:3306 用户名['.$name.'] 从后台删除失败！</div>';}echo $msg;echo '<a href="./ulist.php" class="am-btn am-btn-success am-btn-xs am-btn-block"><i class="am-icon-reply"></i> 返回用户列表</a>';}else{?>
 <div class="am-cf"><strong class="am-text-primary am-text-lg"><a href="./ulist.php">用户配置</a></strong> / <small>用户列表</small></div>
      </div>
    <div class="am-g">
        <div class="am-u-sm-12">
<div id="flist" class="am-scrollable-horizontal" style="margin-top: 50px;">
  <table class="am-table am-table-bordered am-table-striped am-text-nowrap am-table-centered ">
          <thead><tr><th>ID</th><th>账号</th><th>密码</th><th>注册时间</th><th>操作</th></tr></thead>
          <tbody>
<?php
$numrows =$DB->count("SELECT count(*) from aliyun_user WHERE 1");$pagesize=5;$pages=intval($numrows/$pagesize);if ($numrows%$pagesize){$pages++;}if (isset($_GET['page'])){$page=intval($_GET['page']);}else{$page=1;}$offset=$pagesize*($page - 1);$rs=$DB->query("SELECT * FROM aliyun_user WHERE 1 order by id ASC limit $offset,$pagesize");while($res =$DB->fetch($rs)){echo '<tr><td><b>'.$res['id'].'</b></td><td>'.$res['name'].'</td><td>'.$res['pass'].'</td><td>'.$res['regtime'].'</td><td><a href="./ulist.php?my=query&name='.$res['name'].'" class="am-btn am-btn-success am-btn-sm">配置详情</a> <a href="./ulist.php?my=peizhi&name='.$res['name'].'" class="am-btn am-btn-primary am-btn-sm">添加配置</a> <a href="./ulist.php?my=yesudel&name='.$res['name'].'" class="am-btn am-btn-danger am-btn-sm" onclick="return confirm(\'删除用户,同时将删除该用户所有的服务器配置,确定删除吗？\');">删除</a></td></tr>';}?>
          </tbody>
        </table>
<?php
echo'<ul class="am-pagination">';$first=1;$prev=$page-1;$next=$page+1;$last=$pages;if ($page>1){echo '<li class="am-pagination-first"><a href="ulist.php?page='.$first.'">首页</a></li>';echo '<li><a href="ulist.php?page='.$prev.'">&laquo;</a></li>';}else {echo '<li class="am-pagination-first"><a class="am-btn am-btn-primary am-disabled">首页</a></li>';echo '<li><a class="am-btn am-btn-primary am-disabled">&laquo;</a></li>';}for ($i=1;$i<$page;$i++)echo '<li><a href="ulist.php?page='.$i.'">'.$i .'</a></li>';echo '<li><a class="am-btn am-btn-primary am-disabled">'.$page.'</a></li>';for ($i=$page+1;$i<=$pages;$i++)echo '<li><a href="ulist.php?page='.$i.'">'.$i .'</a></li>';echo '';if ($page<$pages){echo '<li><a href="ulist.php?page='.$next.'">&raquo;</a></li>';echo '<li class="am-pagination-last"><a href="ulist.php?page='.$last.'">尾页</a></li>';}else {echo '<li><a class="am-btn am-btn-primary am-disabled">&raquo;</a></li>';echo '<li class="am-pagination-last"><a class="am-btn am-btn-primary am-disabled">尾页</a></li>';}echo'</ul>';?>
         </div><!--表格结束-->
        </div>
      </div>
    </div>
<?php }?> 
<?php include_once './footer.php';?>
</body>
</html>