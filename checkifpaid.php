<?php
include 'database.php';
$id = $_GET['id'];
$st='';
$res=$conn->query("select paid from patientvisitsdoctor where patientid='$id'");
foreach($res as $x){
	$res=$x[0];
	break;
}
echo $res;

?>