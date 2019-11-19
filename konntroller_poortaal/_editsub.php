<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(isset($_SESSION['type']) and isset($_POST['branch']) and isset($_POST['year']) and isset($_POST['sem']) and isset($_POST['subcode']) and isset($_POST['subname']) and isset($_POST['maxsem']) and isset($_POST['minsem']))
{	
$branch=mysqli_escape_string($conn,$_POST['branch']);
$year=mysqli_escape_string($conn,$_POST['year']);
$sem=mysqli_escape_string($conn,$_POST['sem']);
$subcode=mysqli_escape_string($conn,$_POST['subcode']);
$subname=mysqli_escape_string($conn,$_POST['subname']);
$maxsem=mysqli_escape_string($conn,$_POST['maxsem']);
$minsem=mysqli_escape_string($conn,$_POST['minsem']);
	$qry="UPDATE subjects SET name='{$subname}', branch='{$branch}', sem='{$sem}', batch='{$year}', credit1='{$maxsem}',credit2='{$minsem}' WHERE subcode='{$subcode}'";
  $result=mysqli_query($conn,$qry);
	if($result){
  echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Subject Modified Succesfully.!' );
    window.location = './subbank.php';},0);
  </script>";
}
else
{
  echo"<script type='text/javascript'>
  window.setTimeout(function() { alert( 'Error while modifying, Try Again...!' );
    window.location = './subbank.php';},0);
  </script>";
}
}
else{	
	header("location: ./index.php");
}
		
?>