<?php
require('connection.php');
error_reporting(0);
$oldemail=$_POST['email'];
?>

<?php 
	
		$query="DELETE FROM  test1 WHERE email='$oldemail'";
		$data=mysqli_query($conn , $query);
		if($data)
			{
				header("location:Signup.php");
			}
			else
			{
				echo "somthing wrong try again !!!";
			}	
	?>
			<div class="col-sm-4"></div>
		</div>
	</div>
	</body>
</html>