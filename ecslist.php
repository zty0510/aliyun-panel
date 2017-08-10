<?php
include_once './v.php';
include_once './header.php';
?>
<!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>主机详情信息</small></div>
      </div>

    <div class="am-g">
        <div class="am-u-sm-12">
<select id="js-selected" placeholder="请选择服务器" data-am-selected="{btnWidth: '100%', btnSize: 'lg', btnStyle: 'secondary'}">
  <option value="" selected></option>
<?php 
$ress = $DB->query("select * from aliyun_flist where user='$user'");
while ($res = $DB->fetch($ress)) {
	$sql = $DB->query("SELECT SUM(input)+SUM(output) as yll FROM eip WHERE ip_name ='{$res[ip]}' OR ip_name='{$res[fid]}'");
	$yll = $DB->fetch($sql);
	
switch($res['diqu']){
        case 'ap-southeast-1':
        $diqu = '新加坡';
        break;
        case 'cn-shenzhen':
        $diqu = '华南-深圳';
        break;
        case 'cn-qingdao':
        $diqu = '华北-青岛';
        break;
        case 'cn-beijing':
        $diqu = '华北-北京';
        break;
        case 'cn-shanghai':
        $diqu = '华东-上海';
        break;
        case 'us-east-1':
        $diqu = '美东-弗吉尼亚';
        break;
        case 'cn-hongkong':
        $diqu = '中国-香港';
        break;
        case 'cn-hangzhou':
        $diqu = '华东-杭州';
        break;
        case 'us-west-1':
        $diqu = '美西-硅谷';
        break;
        default:
        $diqu = '未知地区';
      }
  echo '<option data-yll="' . ceil($yll['yll'] / 1073741824) . '" data-zll="' . $res['zll'] . '" value="'.$res['fid'].'#'.$res['diqu'].'">'.$diqu.' - '.$res['ip'].'['.$res['dk'].'] - '.$res['os'].'</option>';
 
}
?>
</select>
<div id="loding" style="margin:50px 30%;display: none;">
<img src="./images/loding.gif" alt="loding">
</div>

<div id="flist" class="am-scrollable-horizontal" style="margin-top: 50px;display: none;">
  <table class="am-table am-table-bordered am-table-striped am-text-nowrap am-table-centered ">
            <thead>
            <tr>
              <th>实例名</th><th>地区</th><th>带宽</th><th>总流量</th><th>已使用</th><th>状态</th><th>操作系统</th><th>过期时间</th>
            </tr>
            </thead>
            <tbody>
            <tr><td id="fid"></td><td id="diqu"></td><td><span class="am-badge am-badge-success" id="dk"></span></td><td id="zll">---</td><td id="yll">---</td><td id="zt"></td><td id="os"></td><td id="endtime"></td>
            </tr>
<tr><td class="am-text-middle">操作命令</td><td><button id="updata" type="button" class="am-btn am-btn-default am-round am-text-success">更新状态</button></td><td><button id="start" type="button" class="am-btn am-btn-success am-radius">开机</button></td><td><button id="stop" type="button" class="am-btn am-btn-danger am-radius">关机</button></td>
<td><button id="restart" type="button" class="am-btn am-btn-primary am-radius">重启</button></td><td><button id="cxll" type="button" class="am-btn am-btn-secondary am-radius">签到领奖</button></td><td><button id="refpass" type="button" class="am-btn am-btn-warning am-radius">重置密码</button></td><td><button id="changeos" type="button" class="am-btn am-btn-danger am-radius">更换系统盘</button></td></tr>
            </tbody>
          </table>
         </div><!--表格结束-->
<div id="ok-alert" class="am-alert am-alert-success" data-am-alert style="display: none;">
  <p id="oktip"></p>
</div>
        </div>
      </div>
    </div>

<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd am-text-primary">操作提示</div>
    <div class="am-modal-bd am-text-danger">
      
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
<div class="am-modal am-modal-alert" tabindex="-1" id="pass-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd am-text-primary">修改服务器密码</div>
    <div class="am-modal-bd am-text-danger">
    <input class="am-form-field am-radius am-u-sm-12 am-u-md-6" type="text" id="pass" placeholder="请输入密码" value=""><br>
      <div class="am-alert am-alert-danger" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p>密码格式：8-30个字符，必须同时包含三项（大、小写字母，数字和特殊符号）。支持以下特殊字符：( ) ` ~ ! @ # $ % ^ & * - + = | { } [ ] : ; ' < > , . ? /<br>注：重启服务器后生效！</p>
      </div>
      <button id="yespass" class="am-btn am-btn-success am-radius">
      <i class="am-icon-check"></i>确认修改</button>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">取消</span>
    </div>
  </div>
</div>
<div class="am-modal am-modal-alert" tabindex="-1" id="os-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd am-text-primary">请选择更换系统</div>
    <div class="am-modal-bd am-text-primary">
      <select id="os-selected" data-am-selected="{btnWidth: '70%',maxHeight: 100, btnSize: 'md', btnStyle: 'secondary'}">
         <option value="centos7u2_64_40G_cloudinit_20160520.raw">CentOS  7.2 64位</option>
         <option value="centos7u0_64_40G_aliaegis_20160120.vhd">CentOS  7.0 64位</option>
         <option value="centos6u5_32_40G_cloudinit_20160427.raw">CentOS  6.5 32位</option>
         <option value="centos6u5_64_40G_cloudinit_20160427.raw">CentOS  6.5 64位</option>
         <option value="win2012_64_stand_cn_40G_alibase_20150429.vhd">Windows2012标准版 64位</option>
         <option value="win2008_64_ent_r2_cn_40G_alibase_20160630.vhd">Windows2008R2企业版 64位</option>
         <option value="win2008_64_stand_r2_cn_40G_alibase_20150429.vhd">Windows2008R2标准版 64位</option>
         <option value="win2003_64_ent_r2_cn_40G_alibase_20141223.vhd">Windows2003R2企业版 64位</option>
         <option value="win2003_32_stand_r2_cn_40G_alibase_20141114.vhd">Windows2003R2标准版 32位</option>
      </select>
      <div class="am-alert am-alert-warning" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p>注：更换会清空原有数据,请备份好你的数据哦。</p>
      </div>
      <button id="yesos" class="am-btn am-btn-success am-radius">
      <i class="am-icon-check"></i>确认更换</button>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">取消</span>
    </div>
  </div>
</div>
<?php include_once './footer.php'; ?>
<script src="./js/blogle.cn.js"></script>
</body>
</html>
