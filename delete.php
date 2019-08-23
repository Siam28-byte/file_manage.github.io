<?php
require('connection.php');
error_reporting(0);
session_start();
$uname=$_SESSION['uname'];
$query="SELECT * FROM  file_collection WHERE username='$uname'";
$data=mysqli_query($conn.$query);
while ($file=mysqli_fetch_assoc($data)) {
	unlink($file['fileloc']);
}
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
	