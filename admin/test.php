<?php 

// $today=date("d");

// $lastday = date("d",strtotime("-1 day"));

// echo $today.'<br>';
// echo $today - $lastday;
$lastday = date("Y-m-d ",strtotime("-1 day")).'00:00:00';

$sastday = date("Y-m-d ").'00:00:00';

if($sastday>=$lastday){
	echo '1';
}else{
	echo '0';
}



 ?>