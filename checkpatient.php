<?php
include 'database.php';
extract($_POST);
session_start();
$id = -1 ;
$listpatients = $conn->query('select * from patientinfo');
$found = false;
foreach($listpatients as $info){
	if($info[1] == $phonenumber ){
		$found = true;
		$id = $info[2];
		
	}
}
if($found == true){
	//$conn->query()
	$_SESSION['foundpat'] = 'true';
		$_SESSION['id'] = $id;
				$_SESSION['phonenumber'] = $phonenumber;


}
else{
	$_SESSION['foundpat'] = 'false';

}
	header("Location:patient.php");

?>