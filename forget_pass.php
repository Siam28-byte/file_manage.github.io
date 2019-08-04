<?php
require("connection.php");
error_reporting(0);
$value1=mt_rand(1, 2);
$num1=mt_rand(1, 100);
$num2=mt_rand(1, 100);
if ($value1==1) {
	$operation="+";
	
}else{
	$operation="-";
}
if (isset($_POST['change_pass'])){
	$uname=$_POST['uname'];
	$email=$_POST['email'];
	$pass=sha1($_POST['pass']);
	$rpass=sha1($_POST['rpass']);
	$user_ans=$_POST['security'];
	if ($operation=="+") {
		$ans=$num1+$num2;
	}else{
		$ans=$num1-$num2;
	}
	
	echo "<p class=\"text-primary\">".$user_ans."</p>"."</br>";
	echo "<p class=\"text-primary\">".$ans."</p>";
	if($uname != "" && $_POST['pass'] != "" && $rpass!='' && $user_ans != '') {
		if ($user_ans == $ans) {
			$query="SELECT * FROM members WHERE username='$uname' AND email='$email'";
			$data=mysqli_query($conn,$query);
			$total=mysqli_num_rows($data);
			if($total==1){
				$conf=1;
			}
				else{
					$logfailed=1;
				}
			}else{
				$wrong_ans=1;
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
	<title>Joy2362 | Reset Password</title>
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
				<h2 class="text-center">Change Password</h2>
					<?php 
						if ($logfailed==1) {
							echo "Username or Password not match";
						}
						if ($conf==1) {
							echo "temp";
						}
						if ($filform==1) {
							echo "File the form first";
						}
						if ($wrong_ans==1) {
							echo "Security ans is wrong";
						}
					 ?>
				<form action="" method="POST">
					<div class="form-group">
						<label for="uname">Username:</label>
						<input type="name" name="uname" class="form-control" id="uname">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" class="form-control" id="email">
					</div>

					<div class="form-group">
						<label for="pass">New Password:</label>
						<input type="password" name="pass" class="form-control" id="pass">
					</div>

					<div class="form-group">
						<label for="rpass">Repeat Password:</label>
						<input type="password" name="rpass" class="form-control" id="rpass">
					</div>
					<div class="form-group">
						<label> Security Question</label>
						<?php
							if ($operation=="+") {
								echo "<label>".$num1 . "+".$num2."</label>";		
							}else{
								echo "<label>".$num1 . "-".$num2."</label>";
							}
						?>
					</div>
					<div class="form-group">
						<label for="security"> Ans</label>
						<input type="text" name="security" class=" form-control" id="security">
					</div>
					<input type="Submit" class="btn btn-outline-secondary" name="change_pass" value="Change">	
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

</body>
</html>