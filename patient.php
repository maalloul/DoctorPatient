<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
<link rel="stylesheet" type="text/css" href="secretary.css">
<script src="patient.js"></script>
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
									<h1 class="text-white text-uppercase mb-10">Hello Patient, <br> type your phone number here</h1>
									<p class="text-white mb-30">Wait the acceptance from the secretary</p>
<form method="post" action="checkpatient.php">

<input type="text" name='phonenumber' id='phone' placeholder='Phone Number'/></br></br>
									<input type= 'submit'class="primary-btn d-inline-flex align-items-center">

</form>
<div id="result" style="color:red;"></div>
<input type="hidden" id="id" value=""/>
<input type="hidden" id="status" value=""/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
if(isset($_SESSION['foundpat'])){
	if($_SESSION['foundpat'] == 'true'){
	$id = $_SESSION['id'].'';
	$phonenumber=$_SESSION['phonenumber'].'';
	echo "<script type='text/javascript'>
		var id = '$id';
		var phonenum='$phonenumber';
			document.getElementById('id').value=id;
						document.getElementById('phone').value=phonenum;


		var movies = document.getElementById('result');
var opacity = 0.1;
    var apparence = function(){
		setInterval(function(){
		if(document.getElementById('status').value=='admit'){
									movies.innerHTML='Admitted';

		}
		else if (document.getElementById('status').value=='closed'){
									document.getElementById('phone').value='';

												movies.innerHTML='';
												location.reload();


		}
		
		
		else{
						movies.innerHTML='Wait For acceptance';
												
		}
		},1000);
	
		
				

        if(opacity < 1.0) {
            movies.style.opacity =  opacity;
        } else { 
            clearInterval(timer);
			
        }
        opacity += 0.5;
    }
	
    var timer = window.setInterval(apparence, 1000);
	
	var xhttp1 = new XMLHttpRequest();
	
  

  xhttp1.open('GET', 'patientstatus.php?id='+id, true);
  xhttp1.send();

		 
		


		
		</script>"; 
	
	}
		else{
		echo "<script type='text/javascript'>
		
var movies = document.getElementById('result');
var opacity = 0.1;
    var apparence = function(){
				movies.innerHTML='No patient with this number'

        if(opacity < 1.0) {
            movies.style.opacity =  opacity;
        } else  { 
            clearInterval(timer);
			
        }
        opacity += 0.5;
    }

    var timer = window.setInterval(apparence, 1000);
		
		
		
		</script>"; 
	
		}
	
unset($_SESSION['foundpat']);	
}


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
