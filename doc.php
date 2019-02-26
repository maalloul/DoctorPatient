<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Bobsled</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
	<?php

include 'database.php';
extract($_POST);

session_start();

?>
		<div class="main-wrapper-first">
			<div class="hero-area relative">
				<header>
					<div class="container">
						<div class="header-wrap">
							<div class="header-top d-flex justify-content-between align-items-center">
								<div class="logo">
									<a href="index.html"><img src="img/logo.png" alt=""></a>
								</div>
								
							</div>
						</div>
					</div>
				</header>
				<div class="banner-area">
					<div class="container">
						<div class="row height align-items-center">
							<div class="col-lg-7" style="text-align:center;margin-left:20%;">
								<div class="banner-content">
									<h1 class="text-white text-uppercase mb-10">Hello Doctor, <br> Check the status of patients</h1>
									<div id="patientin" style="color:red;"></div></br>
<input type="button" id='showfill' value="Add Subscription" style='display:none;margin-left:40%;'>
<div id="fill" style='display:none;'></br>
Description </br><textarea placeholder='Add description' required rows='5' cols='30' id="des"></textarea></br></br>
Price</br> <input type='text' placeholder='Enter the price' required id='price'></br></br>
<input type="button" id='Addfill' value="Submit Subscription">
<input type="hidden" value='' id='id'>


</div>

</br></br>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-wrapper">
			<div class="working-process-area">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="section-title text-center">
								<h2>Patient Information</h2>
							</div>
						</div>
					</div>
					<table id='table' style='display:none;margin-left:35%;' >
<caption id='caption'></caption>
<tr>
<th>Date</th>
<th>Medical Description</th>
<th>Price</th>
<th>Paid?</th>

</tr>

</table>
<div id='totals' style='margin-left:35%;'></div>

				</div>
			</div>
		</div>
	<?php

	echo "<script type='text/javascript'>
	var t ='';
	document.getElementById('showfill').onclick=function(){
	if(document.getElementById('fill').style.display=='none'){
		document.getElementById('fill').style.display='block';
	}
	else{
		document.getElementById('fill').style.display='none';
	}
}

setInterval(ajaxCall, 1000); //300000 MS == 5 minutes
		function ajaxCall(){
		 var x = 0 ;


			var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
							 		 document.getElementById('patientin').innerHTML='';

		 var info = this.responseText;
		 
		 if(info!=''){
			 document.getElementById('totals').style.display='block';

			 					document.getElementById('showfill').style.display='block';

	 
		
	 var split = info.split('	');
	 
	 var type = split[0].split(':');
	 if(type[0] == 'new'){
		 document.getElementById('id').value=type[1];
		 		 document.getElementById('patientin').innerHTML='';

		 var desc = document.createTextNode('A new patient is in ');
		 var text = document.createTextNode('Description');
		 var name = split[1];
		 var phone = split[2];
		 var text2 = document.createTextNode('Name: '+name+' Phone Number: '+phone);
		 document.getElementById('patientin').appendChild(desc);
		 document.getElementById('patientin').appendChild(text2); 
	 }
	 else{
		 
		 		 document.getElementById('id').value=type[1];
var rowCount = document.getElementById('table').rows.length;
var tableHeaderRowCount = 1;

		 var tds=document.getElementsByTagName('tr');
		 for(var j = tableHeaderRowCount ; j < rowCount;j++){
			 document.getElementById('table').deleteRow(tableHeaderRowCount);
		 }
		 				 document.getElementsByTagName('caption')[0].remove();

				 		 document.getElementById('patientin').innerHTML='';


		 		 var desc2 = document.createTextNode('A patient visits you again ');

		 document.getElementById('patientin').appendChild(desc2);
		var old=info.split('	');
		var id=(old[0].split(':'))[1];
		var name=old[1];
		var phone=old[2];
		var cp = document.createElement('caption');
		cp.appendChild(document.createTextNode('Subscriptions of '+name));
				 document.getElementById('table').appendChild(cp);
						 		 		 var desc3 = document.createTextNode('Name: '+name+' Phone Number: '+phone);

					 					document.getElementById('table').style.display='block';
		 document.getElementById('patientin').appendChild(desc3);

			  var tblBody = document.createElement('body');
			x = 0 ;

		for(var i = 3 ; i < old.length-1;i++){
			if(old[i]!='' && old[i+1]!='' && old[i+2]!=''){
				var date=old[i];
				var desc = old[i+1];
				var y =old[i+2].split(':');
				var price = y[0];
				var descid=y[1];
								
				var text = document.createTextNode(date);
				var text2 = document.createTextNode(desc);
				var text3 = document.createTextNode(price);
				var btnpatient = document.createElement('button');
				btnpatient.setAttribute('id',descid);
				btnpatient.style.display='none';

					
		if(y[2]=='yes'){
		btnpatient.style.display='block';
		btnpatient.innerText='';
		var text4 = document.createTextNode('Paid');
		btnpatient.appendChild(text4);
		btnpatient.onclick=function(){
			var b = this.id;
			t='no';
			btnpatient.innerText='';
			btnpatient.style.display='block';

		var text4 = document.createTextNode('Not Paid');
		btnpatient.appendChild(text4);
		var xhttp8 = new XMLHttpRequest();
		xhttp8.open('GET', 'getpaidno.php?id='+id+'&descid='+b, true);
		xhttp8.send();

		};	
			
		}
		else{

		btnpatient.style.display='block';
		btnpatient.innerText='';
		var text4 = document.createTextNode('Not Paid');
		btnpatient.appendChild(text4);
		btnpatient.onclick=function(){
						var b = this.id;

			var xhttp8 = new XMLHttpRequest();
			xhttp8.open('GET', 'getpaid.php?id='+id+'&descid='+b, true);
			xhttp8.send();
						};
}
		
		if(y[2]=='no'){
		x = x + parseInt(price);
		}
				var tr = document.createElement('tr');
				var td1	= document.createElement('td');
								var td2	= document.createElement('td');
				var td3	= document.createElement('td');
								var td4	= document.createElement('td4');

				td1.appendChild(text);
				td2.appendChild(text2);
				td3.appendChild(text3);
				td4.appendChild(btnpatient);
				tr.appendChild(td1);
				tr.appendChild(td2);
				tr.appendChild(td3);
								tr.appendChild(td4);
								

    tblBody.appendChild(tr);
	  document.getElementById('table').appendChild(tr);

i+=2;	
					document.getElementById('totals').innerHTML = '';
document.getElementById('totals').innerHTML = 'Total Price: ' + x;


			}
		}
		
		

		
	 } 
	 			 					


		 		 var text = document.createTextNode('Description');

			 
	 
	  document.getElementById('Addfill').onclick=function(){
	   	  var id =  document.getElementById('id').value;

	  var desc =  document.getElementById('des').value;
		var price =  document.getElementById('price').value;
		var today = new Date();
		var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
document.getElementById('des').value='';
document.getElementById('price').value='';

var xhttp2 = new XMLHttpRequest();
  
  	
xhttp2.open('GET', 'addinfoforpatient.php?id='+id+'&desc='+desc+'&price='+price+'&time='+dd+'/'+mm+'/'+yyyy, true);
  xhttp2.send();

	   
	  }
				 
		 }
		 else{
			 document.getElementById('fill').style.display='none';
document.getElementById('showfill').style.display='none';
document.getElementById('table').style.display='none';
document.getElementById('totals').innerHTML='';
 x = 0 ;

		 }
		 
	}
  }
  
  xhttp.open('GET', 'doctorcheckspatientstatus.php', true);
  xhttp.send();
  }
  
  

	  	
	
	
	</script>";


	




?>



		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
