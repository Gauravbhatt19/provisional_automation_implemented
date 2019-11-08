<?php
$query1="SELECT * FROM general WHERE name='status'";
$result=mysqli_query($conn,$query1);
$resultset1	=mysqli_fetch_assoc($result);
if($resultset1['status']=='0'){
	header("location: ./down.php");
}
?>