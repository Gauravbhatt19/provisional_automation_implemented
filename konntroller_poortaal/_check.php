<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
$type=$_SESSION['type'];
$pass=$_SESSION['password'];
$qry="SELECT * FROM users WHERE type='{$type}'";
$result=mysqli_query($conn,$qry);	
if($result)
{$row=mysqli_fetch_assoc($result);
$ftype=$row['type'];
$fpass=$row['pass'];
if($ftype==$type and password_verify($pass,$fpass))
{        $_SESSION['type'] = $ftype;
		unset($_SESSION['attempt']);
		date_default_timezone_set("Asia/Kolkata");
		$dt=date("Y-m-d H:i:s");
		$nos=$row['no_of_systems'];
		$nos++;
$qry="UPDATE users SET last_login= '{$dt}',no_of_systems='{$nos}' WHERE type='{$type}'";
$result=mysqli_query($conn,$qry);
      		  header("location: ./home.php");
    	}
    	else
    	{
    		$_SESSION['attempt']+='1';
  			unset($_SESSION['type']);
			unset($_SESSION['password']);
    	echo"<script type='text/javascript'>window.setTimeout(function() { alert( 'Invalid Password or ID , Try again !' );  window.location = './index.php';},0);</script>"; 
    	}
  }
  else {
    		$_SESSION['attempt']+='1';
  			unset($_SESSION['type']);
			unset($_SESSION['password']);
  			echo"<script type='text/javascript'>window.setTimeout(function() { alert( 'Invalid Password or ID , Try again !' );  window.location = './index.php';},0);</script>"; 
    	
  }
?>