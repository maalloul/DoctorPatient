<?php
include 'database.php';
extract($_POST);
$id = $_GET['id'];
$conn->query("update patientstatus set status='admit' where id='$id'");

?>