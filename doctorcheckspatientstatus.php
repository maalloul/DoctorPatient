<?php	
include 'database.php';
$info = $conn->query("select id from patientstatus where status='admit'");
$id='';
$stringinfo = '';
$total  = '' ;

foreach($info as $x){
	$id = $x[0];
}
if($id!=''){
$allinfo = $conn->query("select * from patientinfo where id='$id'");
$name='';
$phonenum='';
$doctorvisit = $conn->query("select * from patientvisitsdoctor where patientid='$id'");
$count = 0 ;

foreach($allinfo as $all){
	$name = $all[0];
	$phonenum = $all[1];
	break;
}
foreach($doctorvisit as $q){

	$count++;
}


if($count == 0){
	$stringinfo = $stringinfo.'new:'.$id.'	'.$name. '	' . $phonenum.'	'.$count;
}
else{
		$total=0;
		$stringinfo = $stringinfo.'old:'.$id.'	'.$name. '	' . $phonenum ;
		$doctorvisit2 = $conn->query("select * from patientvisitsdoctor where patientid='$id'");
		foreach($doctorvisit2 as $y){
		$stringinfo = $stringinfo.'	'.$y[1]. '	' . $y[3].'	'.$y[4].':'.$y[2].':'.$y[5].'	';
		if($y[4]=='no'){
		$total = $total + (int)$y[3];
		}
		}
		

}
}
echo $stringinfo.''.$total;

?>