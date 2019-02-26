<?php
include 'database.php';

$id = $_GET['id'];

$ids = $conn->query("select * from patientstatus where id='$id'");
$counts=0;
foreach($ids as $x){
	
	$counts++;
}
if($counts==0){
$conn->query("insert into patientstatus values ('$id','entered')");
}


?>