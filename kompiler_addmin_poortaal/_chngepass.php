<?php
session_start();
if(!(isset($_SESSION['login_id'])))
{	
	header("location: ./index.php");
	session_destroy();
}
$conn=mysqli_connect('localhost','root','','provisional_db');
$id=$_SESSION['login_id'];
$cpass=mysqli_escape_string($conn,$_POST['cpass']);
$npass=mysqli_escape_string($conn,$_POST['npass']);
$pass=mysqli_escape_string($conn,$_POST['cnfmpass']);
if($pass!=$npass)
{	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Confirm Password and password entered is not same ...!' );
    window.location = './chngepss.php';},0);
	</script>";}
else
{
$qry="SELECT * FROM users WHERE userid='$id'";	
$result=mysqli_query($conn,$qry);
 $result_id = mysqli_fetch_assoc($result);
if(password_verify($cpass,$result_id['pass']))
{     $pass=password_hash($pass,PASSWORD_DEFAULT);
 $qry="UPDATE users SET pass='$pass' WHERE userid='$id'";	
$result=mysqli_query($conn,$qry); 
	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Password Succesfully Changed.!' );
    window.location = './chngepss.php';},0);
	</script>";}
  else {
   echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Invalid Password...! Try again.!' );
    window.location = './chngepss.php';},0);
	</script>";
	 }
}
?>