<?php
include "./php_set/conn.php";
session_start();
if(isset($_POST['email_id']) and isset($_POST['ref_no'])){
$email_id=mysqli_escape_string($conn,$_POST['email_id']);
$ref_no=mysqli_escape_string($conn,$_POST['ref_no']);
$query2="SELECT * FROM buffer WHERE ref_no='".$ref_no."' and email_id='".$email_id."'";
$result1=mysqli_query($conn,$query2);
$resultset1	=mysqli_fetch_assoc($result1);
if(isset($resultset1['msg'])){
$msg=$resultset1['msg'];
$query1="SELECT * FROM refer_table WHERE ref_no='".$ref_no."'";
$result=mysqli_query($conn,$query1);
$resultset=mysqli_fetch_assoc($result);
if(isset($resultset['stat'])){
$status=$resultset['stat'];
}
else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Invalid Email id or Reference No., Try Again.!' );
    window.location = './status.php';},0);
	</script>";
	}
}
else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Invalid Email id or Reference No., Try Again.!' );
    window.location = './status.php';},0);
	</script>";
	}
}
else
{
	header("location: ./index.php");
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Status | Provisional Portal | THDC-IHET</title>
<link rel="icon" href="./extra_resources/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
	<h1  style="color:rgba(15,31,145,1);font-size:3vw;" class="text-center">Your Reference No. is <?php echo $ref_no; ?></h1>
		<div class="alert alert-success" role="alert" id='status'>
  <h4 class="alert-heading"><?php 
			if($status='Apply')
			echo "Application Phase.";
		elseif($status='Success')
			echo "Successfully Compiled, Check Your Email Inbox !";
		else
			echo "Rejected";
			?></h4>
  <hr>
  <p class="mb-0"><?php 
			echo $msg;
			?></p>
</div>

<br>	
	<div class="text-center"><a class='btn btn-primary p-2 my-3' href='./status.php' >Check Another Status</a>
	<a class='btn btn-primary p-2 my-3' href='./index.php' >Exit</a>
	</div>
	<br>
</div>
<br>
<?php
include './php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>