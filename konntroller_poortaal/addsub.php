<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(!isset($_SESSION['type']))
{
	header("location: ./index.php");
}
		date_default_timezone_set("Asia/Kolkata");
		$dt=date("Y-m-d H:i:s");
?>
<html>
<head>
	<title>Admin | Provisional | THDC-IHET</title>
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
	</style></head>
<body>
	<?php
	include "../php_set/header.php";
	?>

	<?php
	include "./header.php";
	?>
<div class="container-fluid row">
<div class="container-fluid col-lg-3 py-4">
<br>
		<?php
include './sidebar.php';
?>
	</div>
<div class="container-fluid  col-lg-9 py-3">
	<div class="mt-2">
	<form action="./_addsub.php" method="POST" class="card px-5 pt-4" style="	border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<h2 class="text-center">Add Subject</h2>
		<label for="branch" class="mb-0 pt-3">Branch</label>
		<select name="branch" id='branch' class="form-control" required>
			<option value="CSE">CSE</option>
			<option value="CE">CE</option>
			<option value="ECE">ECE</option>
			<option value="EE">EE</option>
			<option value="ME">ME</option>
		</select>
		<label for="year" class="mb-0 pt-3">Batch</label>
	<select name="year" id='year' class="form-control" required>
			<option value="17">Before 2017</option>
			<option value="18">2018</option>
			<option value="19">After 2018</option>
	</select>
<label for="sem1" class="mb-0 pt-3">Semester</label>	
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
		<label for="subcode" class="mb-0 pt-3">Subject Code</label>
		<input type="text" name='subcode' class="form-control" placeholder="Subject Code" id="subcode" required>
		<label for="subname" class="mb-0 pt-3">Subject Name</label>
		<input type="text" name='subname' class="form-control" placeholder="Subject Name" id="subname" required>
	<label for="maxsem" class="mb-0 pt-3">Max Marks Semester</label>
		<input type="number" name='maxsem' min='0' max='301' class="form-control" placeholder="Maximum Marks Semester" id="maxsem" required>	<label for="minsem" class="mb-0 pt-3">Max Marks Sessional</label>
		<input type="number" name='minsem' min='0' max='100' class="form-control" placeholder="Maximum Marks Sessional" id="minsem" required>
	<input class='cus_but p-1 my-3' type="submit" value="Add Subject">
	<br>
	</form>
</div>	
</div>
</div>
<?php
include '../php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>