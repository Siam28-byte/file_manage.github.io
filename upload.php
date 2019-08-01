<?php
	require("connection.php");
	error_reporting(0);
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
	<title>upload</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Atomic+Age|Eagle+Lake|Fjalla+One|Merriweather|Orbitron&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/signup_in.css">
</head>
<body>
	<div class="container-fluid">
		<a href="#">Brand logo</a>
	</div>
	
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top ">
		<a href="#" class="navbar-brand">
			<img src="img/img1.jpg" style="width: 50px; height: 25px;">
		</a>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a href="index.php" class="nav-link ">home</a>
			</li>
			<li class="nav-item">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><?php echo $info['name']; ?></button>
					<div class="dropdown-menu">
						<a href="#" class="dropdown-item ">Edit profile</a>
						<a href="#" class="dropdown-item ">Delete profile</a>
						<a href="logout.php" class="dropdown-item ">log out</a>
					</div>
				</div>
			</li>
			<li class="nav-item">
				<a href="upload.php" class="nav-link active">upload</a>
			</li>
			<li class="nav-item">
				<a href="about.php" class="nav-link">About us</a>
			</li>
		</ul>
	</nav>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 signup_css">
				<h2 class="text-center">Upload</h2>
				<form action="" method="POST" enctype="multipart/form-data">
					<div>
						<label for="category">Category:</label>
					<select name="category" class="custom-select" id="category">
						<option disabled selected>Choose category</option>
						<option value="image">Image</option>
						<option value="pdf">Pdf</option>
						<option value="video">video</option>
						<option value="other">Other</option>
					</select>
					</div>
					<div class="custom-file mb-3">
     	 				<input type="file" class="custom-file-input" id="customFile" name="fileup">
     					 <label class="custom-file-label" for="customFile">Choose file</label>
   					 </div>

					<input type="Submit" class="btn btn-outline-secondary" name="upload" value="Upload">
				<?php 
					if(isset($_POST['upload'])){
						$category=$_POST['category'];
						if ($category) {
							$name= $_FILES["fileup"]["name"];
							$temp_name= $_FILES["fileup"]["tmp_name"];
							$folder="file/".$name;
							move_uploaded_file($temp_name, $folder);
							$query="INSERT INTO file_collection VALUES (NULL, '$name','$folder','$uname','$category')";
							$data=mysqli_query($conn , $query);
							if($data){
								header('location:index.php');
							}else{
								echo "somthing wrong";
							}
						}else{
							echo "select category first";
						}
					}
				?>
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
	<footer id="footer" class="bg-dark fixed-bottom"> 
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<p class="text-primary">Copyright &copy;2019 All right reserved by abdullah zahid</p>
				</div>
				<div class="col-sm-4">
				</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>