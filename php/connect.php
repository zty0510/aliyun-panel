<?php
/*数据库 + 阿里云Key 配置*/
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
define('AccessKeyID','此处填写您的ID'); //阿里云后台申请获取
define('AccessKeySecret','此处填写您的KEY');//阿里云后台申请获取
include_once ROOT.'php/db.class.php';
$dbconfig=array(
	'host' => 'localhost', //数据库地址
	'port' => 3306, //数据库端口
	'user' => '填写您的数据库名', //数据库用户名
	'pwd' => '填写您的数据库密码', //数据库密码
	'dbname' => '填写您的数据库名' //数据库名
);
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
function strim($str)
{
    //trim() 函数移除字符串两侧的空白字符或其他预定义字符。
    //htmlspecialchars() 函数把预定义的字符转换为 HTML 实体(防xss攻击)。
    //预定义的字符是：
    //& （和号）成为 &amp;
    //" （双引号）成为 &quot;
    //' （单引号）成为 '
    //< （小于）成为 &lt;
    //> （大于）成为 &gt;
    return quotes(htmlspecialchars(trim($str)));
}
//防sql注入
function quotes($content)
{
    //if $content is an array
    if (is_array($content))
    {
        foreach ($content as $key=>$value)
        {
            //$content[$key] = mysql_real_escape_string($value);
            /*addslashes() 函数返回在预定义字符之前添加反斜杠的字符串。
            预定义字符是：
            单引号（'）
            双引号（"）
            反斜杠（\）
            NULL */
            $content[$key] = addslashes($value);
        }
    } else
    {
        //if $content is not an array
        //$content=mysql_real_escape_string($content);
        $content=addslashes($content);
    }
    return $content;
}
//stripslashes()能把addslashes()自动加上去的反斜杠\去掉
?>