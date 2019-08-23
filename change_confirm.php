<?php
require('connection.php');
error_reporting(0);
session_start();
$uname=$_SESSION['uname'];
$fname=$_POST['fname'];
$email=$_POST['email'];
$pass=sha1($_POST['pass']);
if($fname != "" && $email != "" && $pass != ""){
	$query="UPDATE members SET name='$fname', email='$email', passwoard='$pass' WHERE username='$uname'";
	$data=mysqli_query($conn , $query);
	if($data){
		header("location:index.php");
	}else{
		header('location:change.php?er=2');
	}
}else{
	header('location:change.php?er=1');
}	
?>