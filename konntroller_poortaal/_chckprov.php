<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if((isset($_SESSION['type']) and (isset($_POST['ref_no']) )))
{	
$ref=mysqli_escape_string($conn,$_POST['ref_no']);
$qry="SELECT * FROM refer_table WHERE ref_no='$ref'";	
$result=mysqli_query($conn,$qry);
$resultset = mysqli_fetch_assoc($result);
if(isset($resultset['name'])){
	$name=$resultset['name'];
	$roll_no=$resultset['roll_no'];
	$branch=$resultset['branch'];
	$stat=$resultset['stat'];
 	 $last=date("d-m-Y",strtotime($resultset['last_modify']));  
}
else{
	echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Invalid Reference No., Try Again...!' );
    window.location = './chckprov.php';},0);
	</script>";
}
}
else {
	session_destroy();
	header("location: ./index.php");
}

?>
<html>
<head>
	<title>Admin | Provisional | THDC-IHET</title>
	<link rel="icon" href="../extra_resources/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
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
	<div class="card px-5 pt-4" style="	border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<h2 class="text-center">Provisional Details</h2>
	<div class="row mt-4">
		<div class="col-md-4">
		<b>Reference Number:</b> <?php echo $ref;?>	
		</div>
		<div class="col-md-4">
			<b>Name:</b> <?php echo $name;?>
		</div>		<div class="col-md-4">
			<b>Roll No.:</b> <?php echo $roll_no;?>
		</div>
	</div>	<div class="row">
		<div class="col-md-4">
		<b>Branch:</b> <?php echo $branch;?>	
		</div>
		<div class="col-md-4">
			<b>Status:</b> <?php echo $stat;?>
		</div>		<div class="col-md-4">
			<b>Date:</b> <?php echo $last;?>
		</div>
	</div>
	<a href='./chckprov.php' class="btn btn-primary mt-4">Check More</a>
	<br>
	</div>
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