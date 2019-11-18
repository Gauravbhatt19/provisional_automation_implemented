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
	<br>

<?php 
 $qry="SELECT * FROM general WHERE name = 'status' "; 
 $result=mysqli_query($conn,$qry);
?>
<div class="card" style="margin:10px;">
 <div class="card-body"  style="margin-bottom:-30px;">
    <h5 class="card-title text-center">Portal Dashboard</h5>
   <table class="table table-hover">
  <tbody>
  	<?php
  	while( $result_set=mysqli_fetch_assoc($result)){ 
  $status=$result_set['status'];
  echo " <tr><th>Portal Status</th><th  class='text-center'>";
   if($status=='1') 
   	echo "<a style='color:green;' href='javascript:void(0)' onclick='status_chnge(0)'>Active</a>";
   	 else echo "<a style='color:red;' href='javascript:void(0)' onclick='status_chnge(1)'>Down</a>";
   	 echo "</th></tr>";}
    ?>
        <script type="text/javascript">function status_chnge(x){
  if(x==1){  
  	var st= "statuschange.php?val=1";
  	window.location= st;
  }
  else
  { var st= "./statuschange.php?val=0";
     window.location= st;
  }
}
</script>
<tr><th>No. of Pending Provisionals</th><th  class='text-center'><?php
 $qry="SELECT * FROM refer_table WHERE stat = 'Apply' "; 
 $result=mysqli_query($conn,$qry);
 $nor= mysqli_num_rows($result);
 echo $nor;
?></th></tr><tr><th>Today's Addressed Provisionals</th><th  class='text-center'><?php
$dty=date("Y-m-d H:i:s",mktime(0, 0, 0, date("m"), date("d")-1,date("Y")));
 $qry="SELECT * FROM refer_table WHERE stat <> 'Apply' and compile_time > '{$dty}' "; 
 $result=mysqli_query($conn,$qry);
 $nor= mysqli_num_rows($result);
 echo $nor;
?></th></tr>
<tr><th>Total No. of Addressed Provisionals</th><th  class='text-center'><?php
 $qry="SELECT * FROM refer_table WHERE stat <> 'Apply' "; 
 $result=mysqli_query($conn,$qry);
 $nor= mysqli_num_rows($result);
 echo $nor;
?></th></tr>

  </tbody>
</table>   
</div>
</div>	<br>
	<br>
	<br>

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