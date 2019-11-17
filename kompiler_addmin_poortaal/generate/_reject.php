<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
		date_default_timezone_set("Asia/Kolkata");
		$dt=date("Y-m-d H:i:s");
if(!isset($_SESSION['login_id']))
{
	header("location: ../index.php");
}
if(isset($_POST['reason']) and isset($_POST['id']))
{
	$reason=mysqli_escape_string($conn,$_POST['reason']);
	$id=mysqli_escape_string($conn,$_POST['id']);
if(isset($_POST['reason1'])){
	$reason1=mysqli_escape_string($conn,$_POST['reason1']);
	$reason=$reason." , ".$reason1;}
	$reject='Reject';
	$qry1="DELETE FROM buffer2_subjects WHERE ref_no='{$id}'";
	$result1=mysqli_query($conn,$qry1);
	$qry2="UPDATE buffer SET msg='{$reason}' WHERE ref_no='{$id}'";
	$result2=mysqli_query($conn,$qry2);
	$qry3="UPDATE refer_table SET stat='{$reject}',compile_time='{$dt}' WHERE ref_no='{$id}'";
	$result3=mysqli_query($conn,$qry3);
	header("location: ../index.php");
}
else{
	header("location: ../index.php");
}

?>