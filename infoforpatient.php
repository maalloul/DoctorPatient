<?php
include 'database.php';
$str='';
$id = $_GET['id'];
$info=$conn->query("select * from patientvisitsdoctor where id='$id'");
foreach($info as $x){
	$str=$str.$x[1].' '.$x[2].' '.$x[3].' ';
}
echo $str;

?>