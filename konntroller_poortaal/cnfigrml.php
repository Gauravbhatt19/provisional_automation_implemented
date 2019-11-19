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
		<script type="text/javascript">
			function chckpass(){
				var npass=document.getElementById('npass').value;
				var cnfmpass=document.getElementById('cnfmpass').value;
				if(npass!=cnfmpass){
					alert( 'Confirm Password and password entered is not same ...!');
    				return false;
				}
			}
		</script>
	<form action="./_chngepass.php" method="POST"  onsubmit="return chckpass()"  class="card px-5 pt-4" style="	border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<h2 class="text-center">Mailing Details</h2>
		<label for="email" class="mb-0 pt-3">Email</label>
		<input type="email_id" name='email' class="form-control" placeholder="provisional.thdcihet@gmail.com" id="email" required>
		<!-- <label for="npass" class="mb-0 pt-3">Password</label>
		 -->
		 <!-- <input type="password" name='npass' id="npass" class="form-control" placeholder="Password" required> -->
					<?php
		if (isset($_SESSION['err1']))
		{
			echo $_SESSION['err1'];
		}
		?>		
					<?php
		if (isset($_SESSION['err2']))
		{
			echo $_SESSION['err2'];
		}
		?>
	<!-- <input class='cus_but p-1 my-3' type="submit" value="Login"> -->
	<br>	<br>	<br>	<br>
	</form>
</div>

</div>
</div>
<br>	<br>
<?php
include '../php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>