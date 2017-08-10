<footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2016 www.bdwml.cn - 版权所有 - MeteorQQ:872125493</p>
    </footer>
  </div>
  <!-- content end -->
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="./js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="../js/jquery.min.js"></script>
<!--<![endif]-->
<script src="../js/amazeui.min.js"></script>
<script src="../js/app.js"></script>
<script>
var str = window.location.href; 
str = str.substring(str.lastIndexOf("/") + 1) 
var url = str.split(".php");
if(url[0] == '' ){
     $("#index").addClass('active');
     $("#index a").append('<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>');
  }else{
  	$("#"+url[0]).addClass('active');
  	$("#"+url[0]+" a").append('<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>');
  }
</script>