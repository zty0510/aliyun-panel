<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>请先登陆 - blogle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:#555555">
<div style="text-align: center;margin-top: 100px;color:#fff">
   <h1 id="tip"></h1>
<?php
echo '
<script language="javascript" type="text/javascript">
document.getElementById("tip").innerHTML = "请先登陆 - 3秒后进入登陆页面";
var i = 2; 
var intervalid; 
intervalid = setInterval("fun()", 1000); 
function fun() {
if (i < 1) { 
window.location.href = "./login.php"; 
clearInterval(intervalid);
} 
document.getElementById("tip").innerHTML = "请先登陆 - "+i+"秒后进入登陆页面"; 
i--; 
}
</script>';
?>
        <pre>
          .----.
       _.'__    `.
   .--($)($$)---/#\
 .' @          /###\
 :         ,   #####
  `-..__.-' _.-\###/
        `;_:    `"'
      .'"""""`.
     /,  Ls ,\\
    // METEOR \\
    `-._______.-'
    ___`. | .'___
   (______|______)
        </pre>
   <h1>© 2016  - Meteor</h1>
</div>
</body>
</html>