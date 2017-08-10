<?php  
//DescribeInstances
include_once './aliyun-php-sdk-core/Config.php';
include_once './connect.php';
date_default_timezone_set("PRC");
use Ecs\Request\V20140526 as Ecs;
if(isset($_REQUEST['diqu'])){
 	$diqu = $_REQUEST['diqu'];
}else{
	die('{"code":"-2","msg":"No Diqu"}');
}
function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    //echo '左边:'.$left;
    $right = strpos($str, $rightStr,$left+1);
    //echo '<br>右边:'.$right;
    if($left < 0 or $right < $left) return false;
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
} // 取文本中间函数 结束


$iClientProfile = DefaultProfile::getProfile($diqu,AccessKeyID,AccessKeySecret);
$client = new DefaultAcsClient($iClientProfile);

if($_GET['action']=='eip'){ //查询流量
$stime = date("Y-m-d",strtotime("-1 day")).'T'.date("H",strtotime("-1 hour")).':00:00Z';
$etime = date("Y-m-d",strtotime("-1 day")).'T'.date("H").':00:00Z';
$eip = $_GET['eip'];
$request = new Ecs\DescribeEipMonitorDataRequest();
$request->setMethod("GET");
$request->setAllocationId($eip);
$request->setStartTime($stime);
$request->setEndTime($etime);
$response = $client->getAcsResponse($request);
echo json_encode($response->EipMonitorDatas);
}elseif($_GET['action']=='status'){ //查询状态
$request = new Ecs\DescribeInstanceStatusRequest();
$request->setMethod("GET");
$response = $client->getAcsResponse($request);
print_r($response);
}elseif($_GET['action']=='updata'){ //更新详情主机信息
$fid = $_POST['fid'];
$request = new Ecs\DescribeInstancesRequest();
$request->setMethod("GET");
$request->setInstanceIds("['$fid']");
$response = $client->getAcsResponse($request);
echo json_encode($response->Instances);
}
elseif($_GET['action']=='start'){ // 开机
$fid = $_POST['fid'];
$request = new Ecs\StartInstanceRequest();
$request->setMethod("GET");
$request->setInstanceId("$fid");
$response = $client->getAcsResponse($request);
echo json_encode($response);
}
elseif($_GET['action']=='stop'){ // 关机
$fid = $_POST['fid'];
$request = new Ecs\StopInstanceRequest();
$request->setMethod("GET");
$request->setInstanceId("$fid");
$response = $client->getAcsResponse($request);
echo json_encode($response);
}
elseif($_GET['action']=='restart'){ // 关机
$fid = $_POST['fid'];
$request = new Ecs\RebootInstanceRequest();
$request->setMethod("GET");
$request->setInstanceId("$fid");
$response = $client->getAcsResponse($request);
echo json_encode($response);
}
elseif($_GET['action']=='changeos'){ // 更换系统
$fid = $_POST['fid'];
$ImageId = $_POST['ImageId'];
$request = new Ecs\ReplaceSystemDiskRequest();
$request->setMethod("GET");
$request->setInstanceId("$fid");
$request->setImageId("$ImageId");
$response = $client->getAcsResponse($request);
echo json_encode($response);
}
elseif($_GET['action']=='upos'){ // 上传系统信息
$fid = $_POST['fid'];
$os = $_POST['os'];
$res = $DB->query("update aliyun_flist set os='$os' where fid='$fid'");
if($res){
  $response['code']='0';
  $response['msg']='ok';
}else{
  $response['code']='-3306';
  $response['msg']='error';
}
echo json_encode($response);
}
elseif($_GET['action']=='refpass'){ // 修改主机密码
$fid = $_POST['fid'];
$pass = $_POST['pass'];
$request = new Ecs\ModifyInstanceAttributeRequest();
$request->setMethod("GET");
$request->setInstanceId("$fid");
$request->setPassword("$pass");
$response = $client->getAcsResponse($request);
echo json_encode($response);
}
elseif($_GET['action']=='DescribeImages'){ // 查询可用的系统
$request = new Ecs\DescribeImagesRequest();
$request->setMethod("GET");
$request->setImageOwnerAlias("system");
$response = $client->getAcsResponse($request);
echo json_encode($response);
}

?>