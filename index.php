<?php
include_once './v.php';
include_once './header.php';
?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>面板操作说明</small></div>
      </div>
      <div class="am-g">
        <div class="am-u-md-12">
          <div class="am-panel am-panel-default">
            <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-4'}">请按照以下说明操作<span class="am-icon-chevron-down am-fr" ></span></div>
            <div id="collapse-panel-4" class="am-panel-bd am-collapse am-in">
              <ul class="am-list admin-content-task">
                <li>
                  <div class="admin-task-bd">
                   <span class="am-text-success">1、更新：点击之后会更新出当前服务器的运行状态和操作系统，如果操作系统为空可能是因为当前使用非官方的镜像导致镜像ID不对造成的，这个不会影响服务器。</span><br><br><span class="am-text-secondary">
2、开机：只有服务器状态是已停止，才能执行开机命令，这个功能一般用于重装系统之后的开机。</span><br><br>
<span class="am-text-primary">
3、停止：只有服务器状态是运行中，才能执行停止命令。</span><br><br>
<span class="am-text-danger">
4、重启：只有服务器状态是运行中，才能执行重启命令。</span><br><br>
<span class="am-text-warning">
5、重装：也就是更换系统盘的功能，先把服务器停机，然后等20秒再操作更换系统盘，如果提示失败的话，就等3-5分钟再操作，按照流程来保证不出错，更换成功之后等10秒点击开机就可以了。</span><br><br>
注意：禁止更换为windows系统，因为如果是你使用的是window系统，那么我将会产生一笔未付款的订单，次月结算。
注意：更换系统，只能更换跟原系统不一样的系统才行，例如果我是7.2的系统，那么只能先更换成7.0的，然后再更换7.2的才成功。
                  </div>
             <div class="admin-task-meta">&nbsp&nbsp&nbsp&nbsp&nbsp2016-12-7 www.bdwml.cn 版权所有  By Meteor</div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include_once './footer.php'; ?>
</body>
</html>