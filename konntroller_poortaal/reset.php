<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(isset($_SESSION['type']) and isset($_GET['id']))
{
    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y-m-d H:i:s");
    $id=$_GET['id'];
   $pass='Compiler@1234';
$pass=password_hash($pass,PASSWORD_DEFAULT);
$qry="UPDATE users SET pass='{$pass}' WHERE userid='{$id}'";
$result=mysqli_query($conn,$qry); 
if($result){
  echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Password Reset to Compiler@1234 Succesfully.!' );
    window.location = './cmplradmn.php';},0);
  </script>";
}
else
{
  echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Error in Reseting, Try Again...!' );
    window.location = './cmplradmn.php';},0);
  </script>";
}
}
else{
    header("location: ./index.php");
}
?>