<?php
require('connection.php');
error_reporting(0);
$uname=$_REQUEST['un'];
$query="DELETE FROM  members WHERE username='$uname'";
$data=mysqli_query($conn , $query);
if($data){
	header("location:Signup.php");
}else{
	echo "somthing wrong try again !!!";
}	
?>
	