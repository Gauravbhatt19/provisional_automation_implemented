<?php
session_start();
	error_reporting(0);
$conn=mysqli_connect('localhost','root','','provisional_db');
		date_default_timezone_set("Asia/Kolkata");
		$dt=date("Y-m-d H:i:s");
if(!isset($_SESSION['login_id']))
{
 header("location: ../index.php");
}
if(isset($_POST['subname_1']) and isset($_POST['id']))
{	$i=1;
	$sbid='subname_'.$i;
	$id=mysqli_escape_string($conn,$_POST['id']);
	$_SESSION['ref_id']=$id;
	while(isset($_POST[$sbid])){
		$cr1id='cr1_'.$i;
		$cr2id='cr2_'.$i;
	$subname=mysqli_escape_string($conn,$_POST[$sbid]);
	$cr1=mysqli_escape_string($conn,$_POST[$cr1id]);
	$cr2=mysqli_escape_string($conn,$_POST[$cr2id]);
	$i++;
	$sbid='subname_'.$i;
	$qry="UPDATE buffer2_subjects SET credit1='{$cr1}', credit2='{$cr2}' WHERE subjects='{$subname}' and ref_no='{$id}'";
	$results=mysqli_query($conn,$qry);
}
 $qry="SELECT * FROM buffer WHERE ref_no='{$id}'";
    $results=mysqli_query($conn,$qry);
    $resultset=mysqli_fetch_assoc($results);
    $p_type=$resultset['type'];
if($p_type=='BACK')
	header("location: ./genrtcpy.php");
else
	header("location: ./genrtcpy1.php");

}
else
{
		header("location: ../index.php");
}


?>