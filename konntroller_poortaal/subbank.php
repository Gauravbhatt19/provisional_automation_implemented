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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      <script type="text/javascript">
          function delusr(id){
            var test= window.confirm("Are you sure, You want delete this subject !");
            if(test == true){
              var url='./delsub.php?id='+id;
              window.location=url;
          }
        }
        </script>
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
    <h5 class="card-title text-center">Subject List</h5>
    <form action="./subbank.php" method="POST">
    <label for="year">Batch</label>
  <select name="year" id='year' class="form-control" required>
      <option value="17">Before 2017</option>
      <option value="18">2018</option>
      <option value="19">After 2018</option>
  </select>
    <label for="sem1" class="mb-0 pt-3">Semester</label>  
  <select name="sem" id='sem' class="form-control" >
      <option value="1">First Semester</option>
      <option value="2">Second Semester</option>
      <option value="3">Third Semester</option>
      <option value="4">Forth Semester</option>
      <option value="5">Fifth Semester</option>
      <option value="6">Sixth Semester</option>
      <option value="7">Seventh Semester</option>
      <option value="8">Eighth emester</option>
  </select> 
      <label for="branch" class="mb-0 pt-3">Branch</label>  
  <select name="branch" id='branch' class="form-control" >
      <option value="CSE">Computer Science & Engineering</option>
      <option value="CE">Civil Engineering</option>
      <option value="ECE">Electronics & Communication Engineering</option>
      <option value="EE">Electrical Engineering</option>
      <option value="ME">Mechanical Engineering</option>
     </select> <br>
     <input type="submit"  value="Search" class="btn btn-primary mb-3"><a href="./addsub.php" class="btn btn-primary mb-3 ml-4">Add Subject</a>
    </form>

   <div <?php if(isset($_POST['year']) and isset($_POST['sem']) and isset($_POST['branch'])) {
  	echo "style='display:block;'"; 
  	$year=$_POST['year'];
    $sem=$_POST['sem'];
    $branch=$_POST['branch'];
    $qry="SELECT * FROM subjects WHERE batch ='{$year}' and sem='{$sem}' and branch='{$branch}' ORDER BY id";
  	$result=mysqli_query($conn,$qry);
 }
    else {
    	echo " style='display:none;'";    } ?>
    	>
   <table class="table table-hover text-center" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No.</th>
      <th scope="col">Subject</th>
      <th scope="col">Max Sem</th>
      <th scope="col">Max Ses</th>
      <th scope="col">Action1</th>
      <th scope="col">Action2</th>
    </tr>
   	</thead>
  <tbody>
  	<?php
  	$i=1;
  	 	while( $result_set=mysqli_fetch_assoc($result)){ 
 	    $subject=$result_set['subcode']." ".$result_set['name'];
      $credit1=$result_set['credit1'];
     $credit2=$result_set['credit2'];
     $id=$result_set['subcode'];
    echo "<tr><th>".$i."</th><th class='text-left'>".$subject."</th><th>".$credit1."</th><th>".$credit2."</th><th><a href='./editsub.php?id=".$id."' class='btn btn-warning'>Edit</a></th><th><a href='javascript:void(0)' onclick=\"  delusr('".$id."')\" class='btn btn-danger'>Delete</a></th>";
   	echo "</tr>";
   $i++;
   	}
    ?>
          </tbody>
</table> 
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