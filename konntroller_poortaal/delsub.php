<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(isset($_SESSION['type']) and isset($_GET['id']))
{	$id=$_GET['id'];
	$qry="DELETE FROM subjects WHERE subcode='{$id}'";
  $result=mysqli_query($conn,$qry);
	if($result){
  echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Subject Deleted Succesfully.!' );
    window.location = './subbank.php';},0);
  </script>";
}
else
{
  echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Error while deleting, Try Again...!' );
    window.location = './subbank.php';},0);
  </script>";
}
}
else{	
	header("location: ./index.php");
}
		
?>