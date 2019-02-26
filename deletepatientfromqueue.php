<?php
include 'database.php';
extract($_POST);
$id=$_GET['id'];
$conn->query("delete from patientstatus where id='$id'");


?>