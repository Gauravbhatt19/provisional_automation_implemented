<?php
	include './php_set/conn.php';
	session_start();
	error_reporting(0);
	if ( (isset($_SESSION['full_name'])) and (isset($_SESSION['fathers_name'])) and (isset($_SESSION['roll_no'])) and (isset($_SESSION['email_id'])) and (isset($_SESSION['branch'])) and (isset($_SESSION['year'])) and (isset($_SESSION['p_type'])))
	{
		$full_name=$_SESSION['full_name'];
		$fathers_name=$_SESSION['fathers_name'];
		$roll_no=$_SESSION['roll_no'];
		$email_id=$_SESSION['email_id'];
		$branch=$_SESSION['branch'];
		$p_type=$_SESSION['p_type'];
				if($p_type=='REG'){
			$sem=$_SESSION['sem'];
		    $year=$_SESSION['year'];
		}
		else{	
		$sem='0';
		$year='0';
		}
	}
	else 
		{	
			header("location: ./index.php");
		}

?>
<?php
function fetch_subjects($conn,$branch,$year,$sem){
$i='1';
		$_SESSION[$i]=$_POST[$i];
		while(isset($_SESSION[$i])){
			$subcode=$_SESSION[$i];
	$qry1="SELECT * FROM subjects WHERE subcode='$subcode'";
	$results=mysqli_query($conn,$qry1);
	$resultset=mysqli_fetch_assoc($results);
		echo "<tr id='T".$i."'>";
		echo "<td id='S".$i."'>".$i."</td>";
		echo "<input name='".$i."' value='".$resultset['subcode']."' type='hidden'>";
		echo "<td>".$resultset['subcode']." ".$resultset['name']."</td>";
		echo "<td>".$resultset['credit1']."</td>";
		echo "<td>".$resultset['credit2']."</td>";
		echo "<td>".($resultset['credit1']+$resultset['credit2'])."</td>";
		echo "</tr>";
			$i++;
			if(isset($_POST[$i])){
			$_SESSION[$i]=$_POST[$i];	
			}
		}
		$id="subcode".$i;
$_SESSION[$i]=$_POST[$id];
		while(isset($_SESSION[$i])){
			$subcode=$_SESSION[$i];
			$c1id='credit1'.$i;
			$c2id='credit2'.$i;
			$_SESSION[$c1id]=$_POST[$c1id];
			$_SESSION[$c2id]=$_POST[$c2id];
			$credit1=$_POST[$c1id];
			$credit2=$_POST[$c2id];
			echo "<tr id='T".$i."'>";
		echo "<td id='S".$i."'>".$i."</td>";
		echo "<td>".$subcode."</td>";
			echo "<input name='".$i."' value='".$subcode."' type='hidden'>";
			echo "<input name='credit1".$i."' value='".$credit1."' type='hidden'>";
			echo "<input name='credit2".$i."' value='".$credit2."' type='hidden'>";
	echo "<td>".$credit1."</td>";
		echo "<td>".$credit2."</td>";
		echo "<td>".($credit1+$credit2)."</td>";
		echo "</tr>";
			$i++;
			$id='subcode'.$i;
			if(isset($_POST[$id])){
			$_SESSION[$i]=$_POST[$id];	
			}

		}

}
function fetch_subjects1(){
$i='1';
$sid="subcode".$i;
$cid1="credit1".$i;
$cid2="credit2".$i;
$mnth_yrid="mnth_yr".$i;
$btypeid="btype".$i;
while(isset($_POST[$sid])){
			$subcode=$_POST[$sid];
			$credit1=$_POST[$cid1];
			$credit2=$_POST[$cid2];
			$mnth_yr=$_POST[$mnth_yrid];
			$btype=$_POST[$btypeid];
			echo "<tr id='T".$i."'>";
		echo "<td id='S".$i."'>".$i."</td>";
		echo "<td>".$subcode."</td>";
			echo "<input name='subcode".$i."' value='".$subcode."' type='hidden'>";
			echo "<input name='credit1".$i."' value='".$credit1."' type='hidden'>";
			echo "<input name='credit2".$i."' value='".$credit2."' type='hidden'>";
			echo "<input name='mnth_yr".$i."' value='".$mnth_yr."' type='hidden'>";
			echo "<input name='btype".$i."' value='".$btype."' type='hidden'>";
			echo "<td>".$credit1."</td>";
		echo "<td>".$credit2."</td>";
		echo "<td>".($credit1+$credit2)."</td>";
		echo "<td>".$mnth_yr."</td>";
		echo "<td>".$btype."</td>";
		echo "</tr>";
			$i++;
			$sid="subcode".$i;
$cid1="credit1".$i;
$cid2="credit2".$i;
$mnth_yrid="mnth_yr".$i;
$btypeid="btype".$i;
		}

}
?>
<html>
<head>
<meta charset="UTF-8">
	<title>Provisional | THDC-IHET</title>
	<link rel="icon" href="./extra_resources/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
    	body
    	{background-color: rgba(215,228,245,1); overflow-x:hidden;} .cust-de{
			    border: 1px solid #000;
    background-color: rgba(48,57,177,1);
    padding:10px;
    	 }
 .cust-de{
			    border: 1px solid #000;
    background-color: rgba(48,57,177,1);
    padding:10px;
    	 }
    	 .cust-de1{

			    border: 1px solid #000;
    background-color:rgba(255,255,255,1);
    padding:10px;
    color:#000;
    	 }
    	     	 .cust-de1 td {
    	 	border:1px solid #000;
    	 }
    </style>
</head>
<body>
			<?php
	include "./php_set/header.php";
	?>	<?php
	include "./php_set/header1.php";
	?>
  <div class="container-fluid m-3 text-center" style="background-color:white; width:96%;border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<form action="./edit.php" method="POST" name='f1'>
	<h1  style="color:rgba(15,31,145,1);font-size:3vw;">Please Check all the details before Submitting your application.</h1>
	
			<div  class="row text-white font-weight-bolder m-4">
			<div class="col-md-6 row mr-1">
			<span class="col-sm-6 cust-de">Name: </span><span class="col-sm-6 cust-de1"><?php echo $full_name;?></span></div>
			<div class="col-md-6 row">
	<span class="col-sm-6 cust-de">Father's Name: </span><span class="col-sm-6 cust-de1"><?php echo $fathers_name;?></span>
	</div>
</div>

	<div class="row  text-white font-weight-bolder m-4">
			<div class="col-md-3 row mr-1">
	<span class="col-sm-6 cust-de">Roll No: </span><span class="col-sm-6 cust-de1"> <?php echo $roll_no;?></span></div>

			<div class="col-md-3 row mr-1">
	<span class="col-sm-6 cust-de">Branch: </span><span class="col-sm-6 cust-de1"><?php echo $branch;?></span>
	</div>
			<div class="col-md-6 row ">
	<span class="col-sm-6 cust-de">Email: </span><span class="col-sm-6 cust-de1"><?php echo $email_id;?></span>
	</div>
</div>
<table class="table table-bordered text-white text-center">
  <thead>
    <tr class="cust-de">
      <th scope="col" rowspan="2"  style="
	vertical-align:middle;">Sl No.</th>
      <th scope="col" rowspan="2"  style="
	vertical-align:middle;">Subject</th>
      <th scope="col" colspan="2"  >Maximum Marks</th>
            <th scope="col" rowspan="2" style="
	vertical-align:middle;" >Total</th>
      <?php if($p_type=='BACK')
				{
					echo '
      <th scope="col" rowspan="2"  style="
	vertical-align:middle;">Month & Year</th>
      <th scope="col" rowspan="2"  style="
	vertical-align:middle;">Exam</th>';
				}
				?>
    </tr>    
    <tr class="cust-de">
      <th scope="col">Sem</th>
      <th scope="col">Ses</th>
      </tr>
  </thead>
  <tbody class="cust-de1">
   			<?php
					if($p_type=='REG'){
						fetch_subjects($conn,$branch,$year,$sem);
			}
			else{
				fetch_subjects1();
			}
			?>
  </tbody>
</table>

<input type='submit' class="btn btn-primary"  value='Submit this Application' onclick="f1.action='insert.php';  return true;">
<input type='submit' class="btn btn-primary"  value='Edit this Application' onclick="return true;">

<a href="javascript:void(0)" class="btn btn-primary" onclick='exit();'>Discard this Application</a>
	<br>
	&nbsp;
	</form>
</div>
<?php
include './php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>