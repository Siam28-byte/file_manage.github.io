<?php
require('connection.php');
session_start();
$uname=$_SESSION['uname'];
$query="select * from members where username='$uname'";
$data=mysqli_query($conn,$query);
$info=mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Joy2362 | About us</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Atomic+Age|Eagle+Lake|Fjalla+One|Merriweather|Orbitron&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/about.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 name_head" >
				<a href="index.php"><h2 class="float-left some">Joy2362</h2></a>
				<p class="float-right ">Keep your file safe</p>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top ">
		<a href="#" class="navbar-brand">
			<img src="img/img1.jpg" style="width: 50px; height: 25px;">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsenav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="index.php" class="nav-link active">Home</a>
				</li>
				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-dark dropdown-toggle" data-toggle="dropdown"><?php echo $info['name'];?></button>
						<div class="dropdown-menu">
							<a href="#" class="dropdown-item ">Edit profile</a>
							<a href="#" class="dropdown-item ">Delete profile</a>
							<a href="logout.php" class="dropdown-item ">log out</a>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a href="upload.php" class="nav-link ">upload</a>
				</li>
				<li class="nav-item">
					<a href="about.php" class="nav-link">About us</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="team text-center col-sm-8">
				<h2>Our Team</h2>
				<span class="line"></span>
				<div class="team_img">
					<a href="#siam"><img src="our_profile/siam.jpg" alt="Siam"></a>
					<a href="#joy"><img src="our_profile/joy.jpg" alt="Joy"></a>
					<a href="#ripon"><img src="our_profile/ripon.jpg" alt="Ripon"></a>
				</div>
				<div class="select" id="siam">
					<div class="name text-center text-uppercase">Siam Chowdhury</div>
					<div class="sub text-center text-uppercase">Web designer</div>
					<span class="line"></span>
					<p class="text-justify">
						In in. Labore sint dolore ad tempor dolore nulla incididunt amet mollit id ut sed deserunt aute sit cupidatat sint in quis nisi anim enim sit laborum voluptate do proident labore in est pariatur eiusmod ullamco in consectetur pariatur enim.
					</p>
					<a class="custombtn" href="https://www.facebook.com/abdullahzahidjoy" target="_blank">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a class="custombtn" href="https://twitter.com/Abdulla57096512" target="_blank">
						<i class="fab fa-twitter"></i>
					</a>
					<a class="custombtn" href="mailto:abdullahzahidjoy@gmail.com">
						<i class="fab fa-google"></i>
					</a>
					<a class="custombtn" href="#">
						<i class="fab fa-instagram"></i>
					</a>
					<a class="custombtn" href="#">
						<i class="fab fa-youtube"></i>
					</a>
				</div>
				<div class="select" id="joy">
					<div class="name text-center text-uppercase">Abdullah Zahid</div>
					<div class="sub text-center text-uppercase">Web developer</div>
					<span class="line"></span>
					<p class="text-justify">
						A Web developer is someone who designs and writes codes for web based applications and portals and websites. Their job is to maintain web-based applications, portals, and websites.
					</p>
					<a class="custombtn" href="https://www.facebook.com/abdullahzahidjoy" target="_blank">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a class="custombtn" href="https://twitter.com/Abdulla57096512" target="_blank">
						<i class="fab fa-twitter"></i>
					</a>
					<a class="custombtn" href="mailto:abdullahzahidjoy@gmail.com">
						<i class="fab fa-google"></i>
					</a>
					<a class="custombtn" href="#">
						<i class="fab fa-instagram"></i>
					</a>
					<a class="custombtn" href="#">
						<i class="fab fa-youtube"></i>
					</a>
				</div>
				<div class="select" id="ripon">
					<div class="name text-center text-uppercase">Md.Ataul osman goni</div>
					<div class="sub text-center text-uppercase">Web designer</div>
					<span class="line"></span>
					<p class="text-justify">
						Smart-cardboard tanto neon tattoo saturation point dome monofilament long-chain hydrocarbons skyscraper grenade urban. Sentient bomb franchise gang math-footage Shibuya into chrome katana BASE jump. 
					</p>
					<a class="custombtn" href="https://www.facebook.com/abdullahzahidjoy" target="_blank">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a class="custombtn" href="https://twitter.com/Abdulla57096512" target="_blank">
						<i class="fab fa-twitter"></i>
					</a>
					<a class="custombtn" href="mailto:abdullahzahidjoy@gmail.com">
						<i class="fab fa-google"></i>
					</a>
					<a class="custombtn" href="#">
						<i class="fab fa-instagram"></i>
					</a>
					<a class="custombtn" href="#">
						<i class="fab fa-youtube"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer" class="bg-dark fixed-bottom"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<p class="text-info">Copyright &copy;2019 All right reserved by joy2362</p>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</footer>
</body>
</html>