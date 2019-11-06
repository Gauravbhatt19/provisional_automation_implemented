<?php
include "./php_set/conn.php";
session_start();
if(isset($_SESSION['full_name'])){
	session_unset();
}
if(isset($_POST['full_name']))
{
	if(!isset($_POST['fathers_name']))
	{
		$_SESSION['err1']='Please Enter Valid fathers\' name';
	}
	if(!isset($_POST['roll_no']))
	{
		$_SESSION['err2']='Please Enter Valid Roll no.';
	}
	if(!isset($_POST['email_id']))
	{
		$_SESSION['err3']='Please Enter Valid Email ID';
	}
	if ( (isset($_POST['full_name'])) and (isset($_POST['fathers_name'])) and (isset($_POST['roll_no'])) and (isset($_POST['email_id'])) )
	{
		$_SESSION['full_name']=mysqli_escape_string($conn,$_POST['full_name']);
		$_SESSION['fathers_name']=mysqli_escape_string($conn,$_POST['fathers_name']);
		$_SESSION['roll_no']=mysqli_escape_string($conn,$_POST['roll_no']);
		$_SESSION['email_id']=mysqli_escape_string($conn,$_POST['email_id']);
		$_SESSION['branch']=mysqli_escape_string($conn,$_POST['branch']);
		$_SESSION['year']=mysqli_escape_string($conn,$_POST['year']);
		$_SESSION['p_type']=mysqli_escape_string($conn,$_POST['p_type']);
		if($_SESSION['p_type']=='REG'){
			$_SESSION['sem']=mysqli_escape_string($conn,$_POST['sem']);
		}
		header("location: ./_fill1.php");
	}
}
?>
<?php
function fetch_instruction($conn){
	$ins='instructions';
	$qry="SELECT * FROM general WHERE name='".$ins."'";
	$result=mysqli_query($conn,$qry);
	$resultset=mysqli_fetch_assoc($result);
	$list=explode('<br>', $resultset['val']);
	$i=1;
	foreach ($list as $l) {
		echo "<li class='list-group-item font-weight-bolder' style='background-color:rgba(0,0,0,0.7);color:white;'>".$i.". ".$l." </li>";
		$i++;
		}
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Provisional | THDC-IHET</title>
	<link rel="icon" href="./extra_resources/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script type="text/javascript">
		function creat(th){
			if(th.value=='REG'){
				document.getElementById('sem').style.display='block';
			}
			else{
				document.getElementById('sem').style.display='none';
			}
		}
	</script>
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
<body style="font-family:Verdana,Arial;">
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



	<div class="container-fluid pt-1" style="background-color:rgba(215,228,245,1);
	color:rgba(40,40,40,0.7);  ">

  <div class="row">
  	<div class=" col-md-6 mt-2">
<div class="card">
  <div class="card-header text-center font-weight-bolder" style="
	background-color:rgba(215,228,245,0.3);color: rgba(40,40,40,0.7); font-size:2rem;">
Instructions
  </div>
  <ol class="list-group list-group-flush" >
    		<?php
		fetch_instruction($conn);
		?>
  </ol>
</div>
</div>
<div class="col-md-6 mt-2">
	<form action="./" method="POST" class="card px-5 pt-4" style="	border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
		<label for="full_name" class="mb-0 pt-3">Student Name</label>
		<input type="text" name='full_name' class="form-control" placeholder="Student Name" id="full_name" required>
		<label for="fathers_name" class="mb-0 pt-3">Father's Name</label>
		<input type="text" name='fathers_name' id="fathers_name" class="form-control" placeholder="Father's Name" required>
		<?php
		if (isset($_SESSION['err1']))
		{
			echo $_SESSION['err1'];
		}
		?>
		<label for="roll_no" class="mb-0 pt-3">Roll No.</label>
		<input type="number" name='roll_no' id="roll_no" class="form-control" placeholder="Roll No." min='100000000000' max='999999999999'required>
				<?php
		if (isset($_SESSION['err2']))
		{
			echo $_SESSION['err2'];
		}
		?>
		<label for="branch" class="mb-0 pt-3">Branch</label>
		<select name="branch" id='branch' class="form-control" required>
			<option value="CSE">CSE</option>
			<option value="CE">CE</option>
			<option value="ECE">ECE</option>
			<option value="EE">EE</option>
			<option value="ME">ME</option>
		</select>
		<label for="email_id" class="mb-0 pt-3">Email</label>
		<input type="email" name='email_id' id="email_id" class="form-control" placeholder="Where Provisional to be receive" required>
				<?php
		if (isset($_SESSION['err3']))
		{
			echo $_SESSION['err3'];
		}
		?>
		<label for="year" class="mb-0 pt-3">Year of Admission</label>
	<select name="year" id='year' class="form-control" required>
			<option value="17">Before or 2017</option>
			<option value="18">After 2017</option>
	</select>
		<label for="p_type" class="mb-0 pt-3">Provisional Type</label>
	<select name="p_type" class="form-control" id='p_type' required onchange="creat(this)">
			<option value="REG">Regular</option>
			<option value="BACK">Back Paper</option>
	</select>
	<div id='sem' style='display: none;'>
	<label for="sem1" class="mb-0 pt-3">Provisional Semester</label>	
	<select name="sem" id='sem1' class="form-control" >
			<option value="1">First Semester</option>
			<option value="2">Second Semester</option>
			<option value="3">Third Semester</option>
			<option value="4">Forth Semester</option>
			<option value="5">Fifth Semester</option>
			<option value="6">Sixth Semester</option>
			<option value="7">Seventh Semester</option>
			<option value="8">Eighth emester</option>
	</select>
	</div>
	<input class='cus_but p-1 my-3' type="submit" value="Save & Next">
	</form>
</div>
</div>
</div>
<?php
include './php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>