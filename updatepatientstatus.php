<?php
include 'database.php';
$status='closed';
$ids = $_GET['id'];
$info = $conn->query("select * from patientstatus where id='$ids'");
foreach($info as $st){
	$status = $st[1];
}
echo $status;

?>