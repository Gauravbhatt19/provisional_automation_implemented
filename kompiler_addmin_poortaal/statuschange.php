<?php
session_start();

$conn=mysqli_connect('localhost','root','','provisional_db');
if (isset($_SESSION['login_id'])) {
$val=$_GET['val'];
date_default_timezone_set("Asia/Kolkata");
		$dt=date("Y-m-d H:i:s");
$qry="UPDATE general SET status='{$val}',last_modify='{$dt}' WHERE name='status'"; 
$result=mysqli_query($conn,$qry); 
header("location: ./home.php");
}
else
{
	header('location: ./index.php');
}
?>