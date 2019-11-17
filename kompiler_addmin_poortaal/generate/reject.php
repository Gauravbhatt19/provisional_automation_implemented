<?php
session_start();
$conn=mysqli_connect('localhost','root','','provisional_db');
if(!isset($_SESSION['login_id']))
{
	header("location: ../index.php");
}
error_reporting(0);
if ( (isset($_GET['id'])) and (isset($_SESSION['login_id'])))
	{
		$id=mysqli_escape_string($conn,$_GET['id']);
		$qry="SELECT * FROM buffer WHERE ref_no='{$id}'";
		$results=mysqli_query($conn,$qry);
		$resultset=mysqli_fetch_assoc($results);
		$p_type=$resultset['type'];
		$sem=$resultset['provisional_sem'];
		$name=$resultset['name'];
		$fname=$resultset['father_name'];
		$year=$resultset['yearofadmin'];
		$qry1="SELECT * FROM refer_table WHERE ref_no='{$id}'";
		$results1=mysqli_query($conn,$qry1);
		$resultset1=mysqli_fetch_assoc($results1);
		$rollno=$resultset1['roll_no'];
		$branch=$resultset1['branch'];
	}
	else 
		{	
			header("location: ../index.php");
		}
?>
<html>
<head>
<meta charset="UTF-8">
	<title>Compiler | Provisional | THDC-IHET</title>
	<link rel="icon" href="../../extra_resources/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style=" font-family:Verdana,arial;text-align:center;">
    <img src="../../extra_resources/img/logo.png" alt="logo" width='70'><h1 style="font-weight:bolder; color:rgba(15,31,145,1);font-size:2.195vw;padding-left:3.1vw;">THDC Institute of Hydropower Engineering and Technology</h1>
</nav>
	<div>
		<h3 style="	background-color:rgba(131,222,205,1); 
	color:rgba(62,82,78,0.7); " class="text-center font-weight-bolder p-3">Provisional Marksheet Portal</h3>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style='margin-top:-8px;'>
  <a class="navbar-brand" href="../index.php" >Provisional Application Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0  text-center">
      <li class="nav-item">
        <a class="nav-link" href="../requestedp.php">Requested Provisional</a>
      </li> 
           <li class="nav-item">
        <a class="nav-link" href="../genrejp.php">Generated/Rejected Provisional</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="../reftb.php">Reference Table</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="../chngepss.php">Change Password</a>
      </li>   
        <a class="nav-link" href="javascript:void(0)" onclick="logout()"> Logout</a>
                 <script type="text/javascript">
          function logout(){
            var test= window.confirm("Are you sure, You want to logout !");
            if(test == true)
              window.location='../_logout.php';
          }
        </script>
      </li>
      </ul>
  </div>
</nav>

<div class="container-fluid row">
<div class="container-fluid col-lg-3 py-4">
<br>
<table class="table table-hover">
  <tbody>
    <tr>
      <th scope="row"><a href="../instrn.php">Add/Modify the instructions</a></th>
    </tr>
    <tr>
      <th scope="row"><a href="../requestedp.php">See the requested provisionals</a></th>
    </tr>
    <tr>
      <th scope="row"><a href="../genrejp.php">Generated/Rejected provisionals</a></th>
    </tr>
    <tr>
      <th scope="row"><a href="../reftb.php">Reference table</a></th>
    </tr>
    <tr>
      <th scope="row"><a href="../chngepss.php">Change Password</a></th>
    </tr>
  </tbody>
</table>
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
			}			function plce(){
				var reason=document.getElementById('reason').value;
				if(reason=='Other'){
					document.getElementById('box').style.display='block';
				}
				else{
					document.getElementById('box').style.display='none';
				}
			}
		</script>
	<form action="./_reject.php" method="POST"  onsubmit="return chckpass()"  class="card px-5 pt-4" style="	border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<h2 class="text-center">Reason for Rejection</h2>
		<label for="reason" class="mb-0 pt-3">Reason</label>
		<select name='reason' class="form-control" id="reason" onchange="plce()" required>
		<option value="incorrect">Incorrect Information</option>
				<option value="improper">Information Improper</option>
						<option value="missing">Missing Result</option>
								<option value="redundant">Redundant Applications</option>
										<option value="Other">Other</option>
		</select>
		<br>
		<input type="hidden" name='id' <?php  echo "value='".$id."'";?> >	
		<textarea class='form-control' name='reason1' rows='5' id='box' style="display:none;"></textarea>
	<input class='btn btn-primary p-1 my-3' type="submit" value="Reject">
	<br>
	</form>
</div>

</div>
</div>
    <?php
include '../../php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>