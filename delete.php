<?php
require('connection.php');
error_reporting(0);
$uname=$_REQUEST['un'];
$query="SELECT fileloc FROM  file_collection WHERE username='$uname'";
$data=mysqli_query($conn.$query);
$file=mysqli_fetch_assoc($data);
unlink($file);
$query="DELETE FROM file_collection WHERE username='$uname'";
$data=mysqli_query($conn,$query);
$query="DELETE FROM  members WHERE username='$uname'";
$data=mysqli_query($conn , $query);
if($data){
	header("location:Signup.php");
}else{
	echo "somthing wrong try again !!!";
}	
?>
	