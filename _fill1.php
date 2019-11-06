<?php
	include './php_set/conn.php';
	session_start();
	if ( (isset($_SESSION['full_name'])) and (isset($_SESSION['fathers_name'])) and (isset($_SESSION['roll_no'])) and (isset($_SESSION['email_id'])) and (isset($_SESSION['branch'])) and (isset($_SESSION['year'])) and (isset($_SESSION['p_type'])))
	{
		$full_name=$_SESSION['full_name'];
		$fathers_name=$_SESSION['fathers_name'];
		$roll_no=$_SESSION['roll_no'];
		$email_id=$_SESSION['email_id'];
		$branch=$_SESSION['branch'];
		$year=$_SESSION['year'];
		$p_type=$_SESSION['p_type'];
		if($p_type=='REG'){
			$sem=$_SESSION['sem'];
		}
	}
	else 
		{	
			header("location: ./index.php");
		}
?>
<?php
function fetch_subjects($conn,$branch,$year,$sem){
	$qry1="SELECT * FROM subjects WHERE branch='$branch' and batch='$year' and sem='$sem' ORDER BY id";
	$results=mysqli_query($conn,$qry1);
	$i=1;
	while($resultset=mysqli_fetch_assoc($results)){
		echo "<tr id='T".$i."'>";
		echo "<td id='S".$i."'>".$i."</td>";
		echo "<td>
				<input type='hidden' name='".$i."' value='".$resultset['subcode']."'>		
		".$resultset['subcode']." ".$resultset['name']."</td>";
		echo "<td>".$resultset['credit']."</td>";
		echo "<td><a href='javascript:void(0)' onclick='del(this.id)' id='".$i."'>Delete</a></td>";
		echo "</tr>";
		$i++;
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
    </style>
	<script type='text/javascript'>
		function del(i) {
			tid='T'+i;
    var element = document.getElementById(tid);
    element.parentNode.removeChild(element);
    var I=i;
    I++;
    var sid="S"+I;
    while(t=document.getElementById(sid)){
    	tid="T"+I;
    	t.innerHTML=(I-1);
    	t.id="S"+(I-1);
    	document.getElementById(I).id=(I-1);
    	document.getElementById(tid).id="T"+(I-1);
    	I++;
    	sid="S"+I;
		}
    }
		function addSub() {
    parentId='tb1';
    var p = document.getElementById(parentId);
    i=document.getElementById('tb1').lastElementChild.lastElementChild.childNodes[0].id;
    i++;
    elementId="T"+i;
    var newElement = document.createElement('tr');
    newElement.setAttribute('id', elementId);
    newElement.innerHTML ="<td id='S"+i+"'>"+i+"</td>"+"<td>xxxxxx</td><td>xxxxxx</td><td><a href='javascript:void(0)' onclick='del(this.id)' id='"+i+"'>Delete</a></td>";
    p.appendChild(newElement);
}
	</script>
</head>
<body style="background-color: rgba(215,228,245,1);">
		<?php
	include "./php_set/header.php";
	?>
	<div class="container-fluid font-weight-bolder text-white text-center mx-3">
		<div  class="row">
			<div class="col-md-6 row">
			<span class="col-sm-6 cust-de">Name: </span><span class="col-sm-6 cust-de1"><?php echo $full_name;?></span></div>
			<div class="col-md-6 row">
	<span class="col-sm-6 cust-de">Father's Name: </span><span class="col-sm-6 cust-de1"><?php echo $fathers_name;?></span>
	</div>
</div>

	<div class="row">
			<div class="col-md-6 row">
	<span class="col-sm-6 cust-de">Roll No: </span><span class="col-sm-6 cust-de1"> <?php echo $roll_no;?></span></div>

			<div class="col-md-6 row">
	<span class="col-sm-6 cust-de">Branch: </span><span class="col-sm-6 cust-de1"><?php echo $branch;?></span>
	</div>
</div>
</div>
	
	<div>
		<h1>Enter Details for Provisional</h1>
		<form action="./_pushapply.php" method="POST">
			<table>
			<thead>
				<td>S.No.</td>
				<td>Subject</td>
				<td>Maximum Marks</td>
				<td>Action</td>


<?php if($p_type=='BACK')
				{
					echo '<td>Month & Year</td><td>Exam</td>';
				}
				?>

				


			</thead>

			<tbody id='tb1'>
			<?php
					if($p_type=='REG'){
						fetch_subjects($conn,$branch,$year,$sem);

			}
			?>
			
		</tbody>
				
		</table>
<?php
					if($p_type=='REG'){
						echo "<a href='javascript:void(0)' onclick='addSub()'>Add Subject</a>";			
			}
			elseif($p_type=='BACK')
				{
					echo "<a href='javascript:void(0)' onclick='addSub1()'>Add Subject</a>";
				}
				?>
	<input type="submit" value="Apply for Provisional">
	</form>
		
		
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php

		// echo $full_name."<br>".$fathers_name."<br>".$roll_no."<br>".$email_id."<br>".$branch."<br>".$year."<br>".$p_type;



	
		// elseif(){
			
		// }
		// else{
		// 	header("location: ./index.php");
		// }
?>