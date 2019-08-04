<?php
	require("connection.php");
	error_reporting(0);
	if(isset($_POST['signup'])){
		$fname=$_POST['fname'];
		$uname=$_POST['uname'];
		$email=$_POST['email'];
		$pass=sha1($_POST['pass']);
		$gender=$_POST['gender'];
		$name= $_FILES["upic"]["name"];
		if($fname != "" && $uname != "" && $email != "" && $pass != "" && sha1($_POST['rpass'])!="" && $gender!=""){
			if ($pass == sha1($_POST['rpass'])) {		
				$name= $_FILES["upic"]["name"];
				if ($name != "") {
					$temp_name= $_FILES["upic"]["tmp_name"];
					$folder="propic/".$name;
					move_uploaded_file($temp_name, $folder);
				}else{
					if ($gender == "male") {
						$folder="propic/default_pic_male.png";
					}else{
						$folder="propic/default_pic_female.png";
					}
				}											
				$query="INSERT INTO members VALUES ('$uname', '$fname', '$email', '$pass','$folder','$gender')";
				$data=mysqli_query($conn , $query);
				if($data){
					header('location:signin.php');
				}else{
					$failed_signup=1;
				}
										
			}else{
				$wrong_pass=1;
			}
		}else{
			$fil_form=1;
		}	
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Joy2362 | Sign up</title>
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
			<div class="col-sm-4 signup_css">
				<h2 class="text-center">Sign up</h2>
				<?php
					if ($fil_form==1) {
						echo "<h2>"."fill the form first"."</h2>";
					}
					if ($wrong_pass==1) {
						echo "<h2>"."password not match"."</h2>";
					}
					if ($failed_signup==1) {
						echo "<h2>"."somthing wrong "."</h2>";
					}
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="fname">Full name:</label>
						<input type="name" name="fname" class="form-control" id="fname">
					</div>
					<div class="form-group">
						<label for="uname">User name:</label>
						<input type="name" name="uname" class="form-control" id="uname">
					</div>
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input type="email" name="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label >Gender:</label>
						<div class="custom-control custom-radio custom-control-inline ">
							<input type="radio" name="gender" value="male" id="male" class="custom-control-input">
							<label class="custom-control-label" for="male">Male</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" name="gender" value="Female" id="Female" class="custom-control-input">
							<label class="custom-control-label" for="Female">Female</label>
						</div>
					</div>
					<div class="form-group">
						<label for="pass">Password:</label>
						<input type="password" name="pass" class="form-control" id="pass">
					</div>
					<div class="form-group">
						<label for="rpass"> Repeat Password:</label>
						<input type="password" name="rpass" class="form-control" id="rpass">
					</div>
					<label>Profile Picture</label>
					<div class="custom-file mb-3">
     	 				<input type="file" class="custom-file-input" id="customFile" name="upic" accept="image/*">
     					 <label class="custom-file-label" for="customFile">Choose file</label>
   					 </div>
					<input type="Submit" class="btn btn-outline-secondary" name="signup" value="Sign Up">
					<a class="btn btn-danger float-right" href="signin.php">Sign in</a>
					<p class="float-right">Already member?</p>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<script>
		$(".custom-file-input").on("change", function() {
  		var fileName = $(this).val().split("\\").pop();
  		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>
</body>
</html>