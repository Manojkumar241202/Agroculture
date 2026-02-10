<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>DirectHarvest</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="/bootstrap/js/bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="/css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/login.css"/>
		<script src="/js/jquery.min.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-layers.min.js"></script>
		<script src="/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="/css/skel.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-xlarge.css" />
		</noscript>
		<link rel="stylesheet" href="/indexfooter.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="/css/ie/v8.css" /><![endif]-->
	</head>

	<?php
		require 'menu.php';
	?>

		<!-- Banner -->
			<section id="banner" class="wrapper">
				<div class="container">
				<h2>DirectHarvest</h2>
				<p>Your Product Our Market</p>
				<br><br>
				<center>
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<button class="button fit" onclick="document.getElementById('id01').style.display='block'" style="width:auto">LOGIN</button>
						</div>

						<div class="6u 12u$(xsmall)">
							<button class="button fit" onclick="document.getElementById('id02').style.display='block'" style="width:auto">REGISTER</button>
						</div>
					</div>
				</center>


			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 align-center">
				<div class="container">
					<header>
						<h2>DirectHarvest</h2>
						<p>Explore the new way of trading...</p>
					</header>
					<div class="row 200%">
						<section class="4u 12u$(small)">
							<i class="icon big rounded fa-clock-o"></i>
							<p>Digital Market</p>
						</section>
						<section class="4u 12u$(small)">
							<i class="icon big rounded fa-comments"></i>
							<p>DirectHarvest-Blog</p>
						</section>
						<section class="4u$ 12u$(small)">
							<i class="icon big rounded fa-user"></i>
							<p>Register with us</p>
						</section>
					</div>
				</div>
			</section>


		<!-- Footer -->
		<footer class="footer-distributed" style="background-color:black" id="aboutUs">
		<center>
			<h1 style="font: 35px calibri;">About Us</h1>
		</center>
		<div class="footer-left">
			<h3 style="font-family: 'Times New Roman', cursive;">DirectHarvest &copy; </h3>
		<!--	<div class="logo">
				<a href="/index.php"><img src="/images/logo.png" width="200px"></a>
			</div>-->
			<br />
			<p style="font-size:20px;color:white">Your product Our market !!!</p>
			<br />
		</div>

		<div class="footer-center">
			<div>
				
				<a href="https://www.google.com/maps/place/10%C2%B058'55.7%22N+77%C2%B011'12.0%22E/@10.9821548,77.1868427,19.42z/data=!4m5!3m4!1s0x0:0xd75128a13396796f!8m2!3d10.9821482!4d77.1866605?hl=en"><i class="fa fa-map-marker"></i><p style="font-size:20px">DirectHarvest<span>Paruvai</span></p></a>
			</div>
				
				<p style="font-size:20px"><a href="mailto:manojkumar.p24cse@gmail.com" style="color:white"><i class="fa fa-envelope"></i>manojkumar.p24cse@gmail.com</a></p>
			</div>
		</div>

		<div class="footer-right">
			<p class="footer-company-about" style="color:white">
				<span style="font-size:20px"><b>About DirectHarvest</b></span>
				DirectHarvest is e-commerce trading platform for electrical & poultry items ,product used for functions like pakumattai,(tea ,water ,payasam)paper tambler
			</p>
			<div class="footer-icons">
				<a  href="https://www.linkedin.com/in/manojkumar-p24/"><i style="margin-left: 0;margin-top:5px;"class="fa fa-linkedin"></i></a>
			</div>
		</div>

	</footer>


			<div id="id01" class="modal">

  <form class="modal-content animate" action="Login/login.php" method='POST'>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
    <h3>Login</h3>
								<div class="row uniform 50%">
									<div class="7u$">
										<input type="text" name="uname" id="uname" value="" placeholder="UserName" style="width:80%" required/>
									</div>
									<div class="7u$">
										<input type="password" name="pass" id="pass" value="" placeholder="Password" style="width:80%" required/>
									</div>
								</div>
								<div class="row uniform">
										<p>
				                            <b>Category : </b>
				                        </p>
				                        <div class="3u 12u$(small)">
				                            <input type="radio" id="farmer" name="category" value="1">
				                            <label for="farmer">Farmer</label>
				                        </div>
				                        <div class="3u 12u$(small)">
				                            <input type="radio" id="buyer" name="category" value="0" checked>
				                            <label for="buyer">Buyer</label>
				                        </div>
									</div>
									<center>
									<div class="row uniform">
										<div class="7u 12u$(small)">
											<input type="submit" value="Login" />
										</div>
									</div>
									</center>
    </div>
  </form>
</div>


<div id="id02" class="modal">

  <form class="modal-content animate" action="Login/signUp.php" method='POST'>
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">


	<h3>SignUp</h3>
							
								<div class="row uniformw">
									<div class="3u 12u$(xsmall)">
										<input type="text" name="name" id="name" value="" placeholder="Name" required/>
									</div>
									<div class="3u 12u$(xsmall)">
										<input type="text" name="uname" id="uname" value="" placeholder="UserName" required/>
									</div>
								</div>
								<div class="row uniform">
									<div class="3u 12u$(xsmall)">
										<input type="text" name="mobile" id="mobile" value="" placeholder="Mobile Number" required/>
									</div>

									<div class="3u 12u$(xsmall)">
										<input type="email" name="email" id="email" value="" placeholder="Email" required/>
									</div>
								</div>
								<div class="row uniform">
									<div class="3u 12u$(xsmall)">
			                            <input type="password" name="password" id="password" value="" placeholder="Password" required/>
			                        </div>
			                        <div class="3u 12u$(xsmall)">
			                            <input type="password" name="pass" id="pass" value="" placeholder="Retype Password" required/>
			                        </div>
								</div>
								<div class="row uniform">
									<div class="6u 12u$(xsmall)">
										<input type="text" name="addr" id="addr" value="" placeholder="Address" style="width:80%" required/>
									</div>
								</div>
								<div class="row uniform">
										<p>
				                            <b>Category : </b>
				                        </p>
				                        <div class="3u 12u$(small)">
				                            <input type="radio" id="rfarmer" name="category" value="1" onchange="document.getElementById('user_type_input').value='farmer'">
				                            <label for="rfarmer">Farmer</label>
				                        </div>
				                        <div class="3u 12u$(small)">
				                            <input type="radio" id="rbuyer" name="category" value="0" checked onchange="document.getElementById('user_type_input').value='buyer'">
				                            <label for="rbuyer">Buyer</label>
				                        </div>
				                        <input type="hidden" name="user_type" id="user_type_input" value="buyer">
									</div>
								<div class="row uniform">
									<div class="3u 12u$(small)">
										<input type="submit" value="Submit" name="submit" class="special" /></li>
									</div>
									<div class="3u 12u$(small)">
										<input type="reset" value="Reset" name="reset"/></li>
									</div>
								</div>
							
							
					

    </div>
    
  </form>
</div>



<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal1= document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

</script>


	</body>
</html>
