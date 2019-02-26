<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script src="secretary.js"></script>
<link rel="stylesheet" type="text/css" href="secretary.css">
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
									<h1 class="text-white text-uppercase mb-10">Hello Secretary, <br> Add patient here</h1>
									<input type='button' value='Add Patient' id='addpatient'class="primary-btn d-inline-flex align-items-center"></span>
</br></br>
<div id="divpatient" style="display:none;">
<form method="post" action="addpatient.php">
<label>FirstName</label>
<input type="text" name='firstname' required placeholder='FirstName'/></br></br>
<label>Phone Number</label>
<input type="text" name='phonenumber'  placeholder='Phone Number'/>
</br></br>
									<input type='submit'class="primary-btn d-inline-flex align-items-center"></span>

</form>
</div>
<div id="result"></div>

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
								<h2>Patients Waitings</h2>
							</div>
						</div>
					</div>
					<div id="listofpatients" class="total-work-process d-flex flex-wrap justify-content-around align-items-center">
						
						
						
					</div>
				</div>
			</div>
		</div>
		<?php
if(isset($_SESSION['found'])){
	if($_SESSION['found'] == 'true'){
	
	echo "<script type='text/javascript'>
		
		var movies = document.getElementById('result');
var opacity = 0.1;
    var apparence = function(){
				movies.innerHTML='Patient Found Already'

        if(opacity < 1.0) {
            movies.style.opacity =  opacity;
        } else { 
            clearInterval(timer);
			opacity = 0 ;
			  movies.style.opacity = opacity;
        }
        opacity += 0.5;
    }

    var timer = window.setInterval(apparence, 1000);
		
		 
		


		
		</script>"; 
	
	}
		else{
		echo "<script type='text/javascript'>
		
var movies = document.getElementById('result');
var opacity = 0.1;
movies.style.color  ='red';
    var apparence = function(){
				movies.innerHTML='Patient Registered';

        if(opacity < 1.0) {
            movies.style.opacity =  opacity;
        } else  { 
            clearInterval(timer);
			opacity = 0 ;
			  movies.style.opacity = opacity;
        }
        opacity += 0.5;
    }

    var timer = window.setInterval(apparence, 1000);
		
		
		
		</script>"; 
	
		}
	
unset($_SESSION['found']);	
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
