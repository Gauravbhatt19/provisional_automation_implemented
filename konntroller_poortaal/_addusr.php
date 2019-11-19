<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(isset($_SESSION['type']) and isset($_POST['usr_id']))
{	$id=mysqli_escape_string($conn,$_POST['usr_id']);
$type='compiler';
$pass='Compiler@1234';
$pass=password_hash($pass,PASSWORD_DEFAULT);
	$qry="INSERT INTO users(type,userid,pass) VALUE ('{$type}','{$id}','{$pass}')";
$result=mysqli_query($conn,$qry);
	if($result){
  echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'User Added Succesfully.!' );
    window.location = './cmplradmn.php';},0);
  </script>";
}
else
{
  echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Error while adding, Try Again...!' );
    window.location = './cmplradmn.php';},0);
  </script>";
}
}
else{	
	header("location: ./index.php");
}
		
?>