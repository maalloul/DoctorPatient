<?php
include 'database.php';
$id = $_GET['id'];
$desc=$_GET['descid'];

$conn->query("update patientvisitsdoctor set paid='yes' where patientid='$id' and iddesc='$desc'");

?>