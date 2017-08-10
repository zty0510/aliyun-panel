<?php
include_once './v.php';
include_once './header.php';
?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
        <div class="am-cf"><strong class="am-text-primary am-text-lg">管理模块</strong> / <small>后台说明</small></div>
      </div>
      <div class="am-g">
        <div class="am-u-md-12">
          <div class="am-panel am-panel-default">
            <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-4'}">请按照以下说明操作<span class="am-icon-chevron-down am-fr" ></span></div>
            <div id="collapse-panel-4" class="am-panel-bd am-collapse am-in">
              <ul class="am-list admin-content-task">
                <li>
                  <div class="admin-task-bd">
                   <span class="am-text-danger">流量查询：主机的网络类型为：【经典网络】不可用，流量统计为当天的前一天，每天更新一次数据。</span><br><br>
                   <span class="am-text-primary">流量监控：监控周期为1小时内一次即可，开通主机的第二天开始监控即可！</span><br><br>
<span class="am-text-warning">
监控地址：http://安装路径/php/cron.php?user=用户名&eip=主机的eip&diqu=所属地区</span><br><br>
<span>
注：主机的网络类型为：【经典网络】不可用！！！</span>
                </div>
             <div class="admin-task-meta">&nbsp&nbsp&nbsp&nbsp&nbsp2016-12-7 by Meteor</div>
                </li>
              </ul>
            </div>
           </div> <!--说明面板结束 -->
        </div>
      </div>
    </div>
<?php include_once './footer.php'; ?>
</body>
</html>