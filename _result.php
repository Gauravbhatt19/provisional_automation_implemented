<?php
	include './php_set/conn.php';
	session_start();
	error_reporting(0);
	if ( (isset($_SESSION['full_name'])) and (isset($_SESSION['fathers_name'])) and (isset($_SESSION['roll_no'])) and (isset($_SESSION['email_id'])) and (isset($_SESSION['branch'])) and (isset($_SESSION['year'])) and (isset($_SESSION['p_type'])) and (isset($_SESSION['ref_no'])))
	{
		$ref_no=$_SESSION['ref_no'];
	}else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
	}
	?>

<html>
<head>
<meta charset="UTF-8">
	<title>Provisional | THDC-IHET</title>
	<link rel="icon" href="./extra_resources/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
    	body
    	{background-color: rgba(215,228,245,1); overflow-x:hidden;} 
    </style>
</head>
<body>
			<?php
	include "./php_set/header.php";
	?>	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style='margin-top:-8px;'>
  <a class="navbar-brand" href="#">Provisional Application Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#">Check Status</a>
      </li>
      </ul>
  </div>

</nav>
  <div class="container-fluid m-3 text-center py-5" style="background-color:white; width:96%;border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<form action="./insert.php" method="POST">
	<h1  style="color:rgba(15,31,145,1);font-size:3vw;">Your Reference/Acknowledgement No. is <span style="font-weight: bolder; text-decoration:underline;"><?php if(isset($ref_no)) echo $ref_no; else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
	}?></span>. Please copy this no. as it is required while application status tracking.</h1>
	<br>
	<br>
	<br>
	<a href="./status.php" class="btn btn-primary" >Check Status</a>
		<a href="./index.php" class="btn btn-primary">Go to Home</a>
	<br>
	&nbsp;
</div>
<?php
include './php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>