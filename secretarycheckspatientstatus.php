<?php
include 'database.php';
$values=$conn->query("select * from patientstatus where status='entered' or status='admit'");
$stringids='';
foreach($values as $ids){
	$i = $ids[0];
	$info = $conn->query("select firstname,phonenumber from patientinfo where id='$i'");
	$name = '';
	$phonenumber = '';
	$stat='';
	foreach($info as $sel){
		$name = $sel[0];
		$phonenumber=$sel[1];
		
		$stat=$ids[1];
		break;
		
	}
	
	$stringids = $stringids.$i.','.$name.','.$phonenumber.','.$stat.'/';
	
}
echo $stringids;


?>