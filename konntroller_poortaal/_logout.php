<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(isset($_SESSION['type'])){
$type=$_SESSION['type'];
$qry="SELECT * FROM users WHERE type='{$type}'";
$result=mysqli_query($conn,$qry);	
if($result)
{
	$row=mysqli_fetch_assoc($result);
		date_default_timezone_set("Asia/Kolkata");
		$dt=date("Y-m-d H:i:s");
		$nos=$row['no_of_systems'];
		$nos--;
$qry="UPDATE users SET last_logout= '{$dt}',no_of_systems='{$nos}' WHERE type='{$type}'";
$result=mysqli_query($conn,$qry);
if($result){
	session_destroy();
      		  header("location: ./index.php");
}
}
else
{
	header('location: ./index.php');
}
}
else
{
	header('location: ./index.php');
}
?>