<?php
include 'database.php';
$id=(int)$_GET['id'];
$desc=$_GET['desc'];
$price=$_GET['price'];
$date=$_GET['time'];

$conn->query("insert into patientvisitsdoctor (patientid,date,medicaldescription,price,paid) values('$id','$date','$desc','$price','no')");



?>