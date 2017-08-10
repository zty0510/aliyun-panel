<!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>阿里云管理平台 - Aliyun Admin panle 不倒翁免流 不倒翁流量 www.bdwml.cn</title>
  <meta name="description" content="一个方便操作阿里云Ecs服务器的控制面板">
  <meta name="keywords" content="国际阿里云,服务器控制面板,阿里云控制面板,服务器控制面板">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
<!--   <link rel="icon" type="image/png" href="/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/i/app-icon72x72@2x.png"> -->
  <meta name="apple-mobile-web-app-title" content="阿里云管理平台" />
  <link rel="stylesheet" href="../css/amazeui.min.css"/>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>阿里云面板后台管理</strong>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php echo $user; ?> <span class="am-icon-caret-down"></span>
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
<!--   | Copyright (c) 2016  All rights reserved.
  +----------------------------------------------------------------------
  | Author: 闪电 <81362590@qq.com>
  +----------------------------------------------------------------------
  | QQ: 81362590       www.686u.cn  +----------------------------------------------------------------------
  | 如需修改和引用，请保留此信息！
  +----------------------------------------------------------------------
  | 我们要保留对人最基本的尊重！    OK!
  +----------------------------------------------------------------------
 -->
<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="./"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 管理模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li id="index"><a href="./" class="am-cf"><span class="am-icon-edit"></span>　 后台说明</a></li>
            <li id="ulist"><a href="ulist.php"><span class="am-icon-users"></span>　用户配置</a></li>
            <li id="my"><a href="my.php"><span class="am-icon-bug"></span> 　关于</a></li>
          </ul>
        </li>
        <li><a href="?out"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bullhorn"></span> 作者名言 - 2016-12-7</p>
          <p>不倒翁免流交流群，不倒翁云端APP分享群 70355331！<br>　　—— Meteor出品</p>
        </div>
      </div>
    </div>
  </div><!-- sidebar end -->