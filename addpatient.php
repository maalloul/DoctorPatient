<?php
include 'database.php';
extract($_POST);
session_start();
$listpatients = $conn->query('select * from patientinfo');
$found = false;
foreach($listpatients as $info){
	if($info[1] == $phonenumber ){
		$found = true;
		
	}
}
if($found == true){
	$_SESSION['found'] = 'true';
}
else{
	$max = $conn->query("select max(id) from patientinfo");
	$ids=-1;
	foreach($max as $mx){
		$ids = $mx[0]+1;
		break;
	}
	$conn->query("insert into patientinfo values ('$firstname','$phonenumber','$ids')");
	$_SESSION['found'] = 'false';

}
	header("Location:secretary.php");

?>