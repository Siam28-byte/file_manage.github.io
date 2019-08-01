<?php
include('connection.php');
if (isset($_REQUEST['un'])) {
$oldemail=$_REQUEST['un'];
}
error_reporting(0);
?>
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Change</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 signup_css">
				<h2 class="text-center">Change</h2>
				<form action="" method="POST">
					<div class="form-group">
						<label for="fname">Full name:</label>
						<input type="name" name="fname" class="form-control" id="fname">
					</div>
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input type="email" name="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="pass">Password:</label>
						<input type="password" name="pass" class="form-control" id="pass">
					</div>
					<input type="Submit" class="btn btn-outline-secondary" name="change" value="Change">
				</form>
			</div>
			<?php 
	
	if($_POST['change'])
	{
		$fname=$_POST['fname'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		if($fname != "" && $email != "" && $pass != "")
		{
			
			$query="UPDATE members SET fname='$fname', email='$email', pass='$pass' WHERE username='$oldemail'";
			$data=mysqli_query($conn , $query);
			if($data)
			{
				header("location:index.php");
			}
			else
			{
					echo "somthing wrong try again !!!";
			}
		}
		else
		{
			echo "Fill the form first !!!";
		}	
	}
	?>
			<div class="col-sm-4"></div>
		</div>
	</div>
	</body>
</html>