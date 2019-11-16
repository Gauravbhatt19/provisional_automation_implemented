<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(!isset($_SESSION['attempt']))
	$_SESSION['attempt']='1';
else {
	if ($_SESSION['attempt']>='5') {
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Too Many Attempt. ! Try Again After 30 minutes.!' );
    window.location = '../index.php';},0);
	</script>";
	}
}
if(isset($_SESSION['login_id']))
{
	header("location: ./home.php");
}
if(isset($_POST['login_id']))
{
	if(!isset($_POST['password']))
	{
		$_SESSION['err1']='Please Enter Password !';
	}
	if ( (isset($_POST['login_id'])) and (isset($_POST['password'])))
	{
		$_SESSION['login_id']=mysqli_escape_string($conn,$_POST['login_id']);
		$_SESSION['password']=mysqli_escape_string($conn,$_POST['password']);
		header("location: ./_check.php");
	}
}
?>
<html>
<head>
	<title>Compiler | Provisional | THDC-IHET</title>
	<link rel="icon" href="../extra_resources/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    	<style>
		.cus_but
{
	background-color:rgba(0,162,232,1); 
	border:0px;
	color:#fff;
	font-weight:bolder; 
	transition:0.5s; 
	border-radius:2px; 
}
.cus_but:hover
{
	background-color:rgba(0,62,132,1); 
	transition:0.5s; 
}
	</style>
</head>
<body>
	<?php
	include "../php_set/header.php";
	?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style='margin-top:-8px;'>
  <a class="navbar-brand" href="../index.php">Provisional Application Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Home</a>
      </li>
      </ul>
  </div>
</nav>
<div class="container-fluid pt-1" style="background-color:rgba(215,228,245,1);
	color:rgba(40,40,40,0.7);  ">
<br>
  <div class="row">
  	<div class=" col-md-6 mt-2">
<div class="card">
  <div class="card-header text-center font-weight-bolder" style="
	background-color:rgba(215,228,245,0.3);color: rgba(40,40,40,0.7); font-size:2rem;">
Instructions
  </div>
  <ul class="list-group list-group-flush font-weight-bolder" >
    <li class='list-group-item'>Never Share the User ID and Password to anyone.</li>
    <li class='list-group-item'>In case you are on leave for more than two days, please shut this portal down.</li>
    <li class='list-group-item'>It is recommended to use Google Chrome Desktop Browser for this portal.</li>
    <li class='list-group-item'>In case you forget your id/password,Kindly Ask SuperAdmin to reset your credentials.</li>
  </ul>
</div>
</div> <div class="col-md-6 mt-2">
	<form action="./" method="POST" class="card px-5 pt-4" style="	border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<h2 class="text-center">Login Form</h2>
		<label for="login_id" class="mb-0 pt-3">Login ID</label>
		<input type="text" name='login_id' class="form-control" placeholder="Login ID" id="login_id" required>
		<label for="password" class="mb-0 pt-3">Password</label>
		<input type="password" name='password' id="password" class="form-control" placeholder="Password" required>
					<?php
		if (isset($_SESSION['err1']))
		{
			echo $_SESSION['err1'];
		}
		?>
	<input class='cus_but p-1 my-3' type="submit" value="Login">
	<br>
	</form>
</div>
</div>
<br>
</div>

<?php
include '../php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>