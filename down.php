<?php
$conn=mysqli_connect('localhost','root','','provisional_db');
$query1="SELECT * FROM general WHERE name='status'";
$result=mysqli_query($conn,$query1);
$resultset1	=mysqli_fetch_assoc($result);
if($resultset1['status']=='1'){
	header("location: ./index.php");
}
else{
	$list=explode('<br>', $resultset1['val']);
	$status=$list[0];
	$msg=$list[1];
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Provisional Portal Down| THDC-IHET</title>
<link rel="icon" href="./extra_resources/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
	include "./php_set/header.php";
?>
<br>
  <div class="container-fluid m-3" style="background-color:white; width:96%;border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<h1  style="color:rgba(15,31,145,1);font-size:3vw;" class="text-center">Provisonal Portal is Down.</h1>
		<div class="alert alert-success" role="alert" id='status'>
  <h4 class="alert-heading"><?php 
			echo $status;
			?>
			</h4>
  <hr>
  <p class="mb-0"><?php 
			echo $msg;
			?></p>
</div>

<br>	
	<div class="text-center"><a class='btn btn-primary p-2 my-3' href='./index.php' >Try Again</a>
	</div>
	<br>
	<br>
</div>
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