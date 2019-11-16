<?php
$conn=mysqli_connect('localhost','root','','provisional_db');
$type='compiler';
$id='Compiler1';
$pass='Compiler@1234';
$pass=password_hash($pass,PASSWORD_DEFAULT);
$qry="INSERT INTO users(type,userid,pass) VALUE ('{$type}','{$id}','{$pass}')";
$result=mysqli_query($conn,$qry);	
if($result){
	echo "Success...!";
}
else
{
	echo "Fail...!";
}
?>
