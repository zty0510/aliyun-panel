<!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>阿里云管理平台 - Aliyun Admin panle www.bdwml.cn</title>
  <meta name="description" content="一个方便操作阿里云Ecs服务器的控制面板">
  <meta name="keywords" content="国际阿里云,服务器控制面板,阿里云控制面板,闪电云服务器控制面板,Meteor,QQ872125493">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
<!--   <link rel="icon" type="image/png" href="/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/i/app-icon72x72@2x.png"> -->
  <meta name="apple-mobile-web-app-title" content="阿里云管理平台" />
  <link rel="stylesheet" href="./css/amazeui.min.css"/>
  <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>阿里云管理面板</strong>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php 
echo $user;
?>
 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="./pass.php"><span class="am-icon-user"></span> 修改密码</a></li>
          <!-- <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li> -->
          <li><a href="?out"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
    </ul>
  </div>
</header>
<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="#"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 页面模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li id="index"><a href="./" class="am-cf"><span class="am-icon-edit"></span> 操作说明</a></li>
            <li id="ecslist"><a href="ecslist.php"><span class="am-icon-tasks"></span> 主机管理</a></li>
            <li id="my"><a href="my.php"><span class="am-icon-bug"></span> 关于</a></li>
          </ul>
        </li>
        <li><a href="?out"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bullhorn"></span> 续费购买</p>
          <p>QQ：872125493<br>点击联系<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=872125493&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:872125493:51" alt="点击购买续费" title="点击购买续费"/></a></p>
        </div>
      </div>
    </div>
  </div><!-- sidebar end -->