<?php 
require("connection.php");
error_reporting(0);
session_start();
$uname=$_SESSION['uname'];
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
		header('location:upload.php?er=1');
	}
}else{
	header('location:upload.php?er=2');
}
?>