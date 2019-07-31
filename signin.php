<?php
require("connection.php");
error_reporting(0);
session_start();
if (isset($_POST['signin']))
	{
		$uname=$_POST['uname'];
		$pass=sha1($_POST['pass']);
		if($uname != "" && $_POST['pass'] != "") {
			$query="SELECT * FROM members WHERE username='$uname' AND passwoard='$pass'";
			$data=mysqli_query($conn,$query);
			$total=mysqli_num_rows($data);
			if($total==1)
			{
				$_SESSION['uname']=$uname;
				header('location:index.php');
			}
			else{
				$logfailed=1;
			}
		}
		else{
			$filform=1;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Sign in</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signup_in.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 log_css">
				<h2 class="text-center">Sign in</h2>
					<?php 
						if ($logfailed==1) {
							echo "Username or Password not match";
						}
						if ($filform==1) {
							echo "File the form first";
						}
					 ?>
				<form action="" method="POST">
					<div class="form-group">
						<label for="uname">Username:</label>
						<input type="name" name="uname" class="form-control" id="uname">
					</div>
					<div class="form-group">
						<label for="pass">Password:</label>
						<input type="password" name="pass" class="form-control" id="pass">
					</div>

					<input type="Submit" class="btn btn-outline-secondary" name="signin" value="Sign In">
					<a href="#">Forget password</a>
					<a class="btn btn-danger float-right" href="signup.php">Sign up</a>		
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

</body>
</html>