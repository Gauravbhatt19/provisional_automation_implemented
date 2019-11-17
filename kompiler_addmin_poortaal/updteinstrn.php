<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(!isset($_SESSION['login_id']))
{
	header("location: ./index.php");
}
date_default_timezone_set("Asia/Kolkata");
		$dt=date("Y-m-d H:i:s");
$instrn=mysqli_escape_string($conn,$_POST['instrn']);
$qry="UPDATE general SET val='{$instrn}',last_modify='{$dt}' WHERE name='instructions'";
$result=mysqli_query($conn,$qry);
if($result){
echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Instructions Successfully Updated !' );
    window.location = './instrn.php';},0);
	</script>";
}
else
{
	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Error, Try Again..!' );
    window.location = './instrn.php';},0);
	</script>";
}

?>