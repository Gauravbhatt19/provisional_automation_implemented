<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(!isset($_SESSION['login_id']))
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
	<div class="card">
 <div class="card-body"  style="margin-bottom:-30px;">
    <h5 class="card-title text-center">Reference Table</h5>
    <form action="./reftb.php" method="POST">
    <label for="frm">From(Exclusive)</label>
    <input type="date" id='frm' class="form-control" name='frm'  min="2019-01-01" <?php echo "max='".$dt."'"; ?>>
    <label for="frm">Till(Exclusive)</label>
    <input type="date" id='till' class="form-control" name='till'  min="2019-01-01" <?php echo "max='".$dt."'"; ?> >    <br>
     <input type="submit"  value="Search" class="btn btn-primary mb-3">
    </form>

   <div <?php if(isset($_POST['frm']) and isset($_POST['till'])) {
  	echo "style='display:block;'"; 
  	$min=date("Y-m-d",strtotime($_POST['frm']));
    	$max=date("Y-m-d",strtotime($_POST['till']));
    	$qry="SELECT * FROM refer_table WHERE last_modify >'{$min}' and last_modify <'{$max}' and stat='Success' ORDER BY last_modify DESC";
  	$result=mysqli_query($conn,$qry);
 }
    else {
    	echo " style='display:none;'";    } ?>
    	>
   <table class="table table-hover text-center" >
   	<form action='./printref.php' method="POST">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Ref.No.</th>
      <th scope="col">Name</th>
      <th scope="col">Roll No.</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
    </tr>
   	</thead>
  <tbody>
  	<?php
  	$i=1;
  	 	while( $result_set=mysqli_fetch_assoc($result)){ 
 	 $ref_no=$result_set['ref_no']; 
 	 $name=$result_set['name']; 
 	 $status=$result_set['stat']; 
 	 $rollno=$result_set['roll_no']; 
 	 $last=date("d-m-Y",strtotime($result_set['last_modify']));   	
 	 $qry1="SELECT * FROM buffer WHERE ref_no='{$ref_no}'";
 	 $result1=mysqli_query($conn,$qry1);
  	 $result_set1=mysqli_fetch_assoc($result1);
  	 $type=$result_set1['type'];
   	echo "<tr><th>".$ref_no."</th><th class='text-left'>".$name."</th><th>".$rollno."</th><th>".$status."</th><th>".$last."</th>";
   	echo "</tr>";
   	echo "<input type='hidden' name='".$i."' value='".$ref_no."'>";
   	$i++;
   	}
    ?>
          </tbody>
</table>   
<input type='submit' class="btn btn-primary mb-3 mr-3 float-right" value='Print'>
</div>
</div>
</div>
</div>
</div>	<br>
	<br>
	<br>



<?php
include '../php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>