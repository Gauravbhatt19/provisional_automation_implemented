<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(isset($_SESSION['type']) and  isset($_GET['id']))
{	$id=$_GET['id'];
$qry="SELECT * FROM subjects WHERE subcode='{$id}'";
$result=mysqli_query($conn,$qry);
$resultset=mysqli_fetch_assoc($result);
$branch=$resultset['branch'];
$year=$resultset['batch'];
$sem=$resultset['sem'];
$subcode=$resultset['subcode'];
$subname=$resultset['name'];
$maxsem=$resultset['credit1'];
$maxses=$resultset['credit2'];}
else{
	header('location: ./index.php');
}
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
	<form action="./_editsub.php" method="POST" class="card px-5 pt-4" style="	border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<h2 class="text-center">Edit Subject</h2>
	<label for="subcode" class="mb-0 pt-3">Subject Code</label>
		<div class="form-control"  id="subcode" ><?php echo $subcode; ?> </div>
		<input type="hidden" name='subcode' <?php echo "value='".$subname."'";?>  required>
		 <label for="branch" class="mb-0 pt-3">Branch</label>
		<select name="branch" id='branch' class="form-control" required>
			<?php
			echo "<option value='".$branch."'>".$branch."</option>";
			if($branch!='CSE'){
			echo "<option value='CSE'>CSE</option>";	
			}
			if($branch!='CE'){
			echo "<option value='CE'>CE</option>";	
			}
			if($branch!='EE'){
			echo "<option value='EE'>EE</option>";	
			}
			if($branch!='ECE'){
			echo "<option value='ECE'>ECE</option>";	
			}
			if($branch!='ME'){
			echo "<option value='ME'>ME</option>";	
			}
			?>
			</select>
				<label for="year" class="mb-0 pt-3">Batch</label>
		<select name="year" id='year' class="form-control" required>
			<?php
			echo "<option value='".$year."'>".$year."</option>";
			if($year!='17'){
			echo "<option value='17'>Before 2018</option>";	
			}
			if($year!='CE'){
			echo "<option value='18'>2018</option>";	
			}
			if($year!='EE'){
			echo "<option value='19'>After 2018</option>";	
			}
			?>
		</select>
							<label for="sem" class="mb-0 pt-3">Semester</label>
		<select name="sem" id='sem' class="form-control" required>
			<?php
			echo "<option value='".$sem."'>0".$sem."</option>";
			if($sem!='1'){
			echo "<option value='1'>01</option>";
		}			if($sem!='2'){
			echo "<option value='2'>02</option>";
		}			if($sem!='3'){
			echo "<option value='3'>03</option>";
		}			if($sem!='4'){
			echo "<option value='4'>04</option>";
		}			if($sem!='5'){
			echo "<option value='5'>05</option>";
		}			if($sem!='6'){
			echo "<option value='6'>06</option>";
		}			if($sem!='7'){
			echo "<option value='7'>07</option>";
		}			if($sem!='8'){
			echo "<option value='8'>08</option>";
		}
			?></select>
		<label for="subname" class="mb-0 pt-3">Subject Name</label>
		<input type="text" name='subname' class="form-control" <?php echo "value='".$subname."'";?> id="subname" required>
	<label for="maxsem" class="mb-0 pt-3">Max Marks Semester</label>
		<input type="number" name='maxsem' min='0' max='301' class="form-control" <?php echo "value='".$maxsem."'";?> id="maxsem" required>	<label for="minsem" class="mb-0 pt-3">Max Marks Sessional</label>
		<input type="number" name='minsem' min='0' max='100' class="form-control" <?php echo "value='".$maxses."'";?> id="minsem" required>
		<div class="mt-2"><input class='btn btn-primary' type="submit" value="Save">
	<a class='btn btn-primary' href='./subbank.php'> Go Back</a>
	</div>
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