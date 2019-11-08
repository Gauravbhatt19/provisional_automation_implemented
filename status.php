<?php
include "./php_set/conn.php";
session_start();
if(isset($_SESSION['full_name'])){
	session_unset();
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Status | Provisional Portal | THDC-IHET</title>
<link rel="icon" href="./extra_resources/img/logo.png">
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
	include "./php_set/header.php";
	?>		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style='margin-top:-8px;'>
  <a class="navbar-brand" href="#">Provisional Application Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Exit</a>
      </li>
      </ul>
  </div>
</nav>
<br>
  <div class="container-fluid m-3" style="background-color:white; width:96%;border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<form action="./_check.php" method="POST"> 
	<h1  style="color:rgba(15,31,145,1);font-size:3vw;" class="text-center">You can Check your Provisional Application status Here.</h1>
	<div  class="row"><div class="col-md-6">
		<label for="email_id" class="mb-0 pt-3">Email Id</label>
		<input type="email" name='email_id' id="email_id" class="form-control" placeholder="Where Provisional to be received" required>
		</div>
	<div class="col-md-6">
		<label for="ref_no" class="mb-0 pt-3">Reference No.</label>
	<input type="number" name='ref_no' id="ref_no" class="form-control" placeholder="Reference No." required>
	</div>
	</div>
<br>	
	<div class="text-center"><input class='cus_but p-2 my-3' type="submit" value="Check Status">
	</div>
	<br>
</form>
</div>
<br>
<br>
<br>
<?php
include './php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>