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

                 <script type="text/javascript">
          function delusr(id){
            var test= window.confirm("Are you sure, You want delete this user !");
            if(test == true){
              var url='./delete.php?id='+id;
              window.location=url;
          }
        }
        </script>
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
    <h5 class="card-title text-center">Compiler Users</h5>
   <div>
   <table class="table table-hover text-center" >
   	<form action='./printref.php' method="POST">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No.</th>
      <th scope="col">UserID</th>
      <th scope="col">Last Login</th>
      <th scope="col">Action1</th>
      <th scope="col">Action2</th>
    </tr>
   	</thead>
  <tbody>

<?php
  	$i=1;
$qry="SELECT * FROM users WHERE type='compiler'";
$result=mysqli_query($conn,$qry);
while($resultset=mysqli_fetch_assoc($result)){
 	 $usr_id=$resultset['userid']; 
 	 $last=date("d-m-Y",strtotime($resultset['last_login']));  
  echo "<tr><th>".$i."</th><th class='text-left'>".$usr_id."</th><th>".$last."</th><th><a href='./reset.php?id=".$usr_id."' class='btn btn-warning'>Reset Password</a></th><th><a href='javascript:void(0)' onclick=\"  delusr('".$usr_id."')\" class='btn btn-danger'>Delete Account</a></th>";

   	echo "</tr>";
   	$i++;
   	}
    ?>
          </tbody>
</table>  
<a href="./addusr.php" class="btn btn-primary float-right mr-4 mb-4">Add User</a>
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