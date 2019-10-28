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
	}
	else 
		{	
			header("location: ./index.php");
		}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div>Name: <?php echo $full_name;?></div>
	<div>Fathers Name: <?php echo $fathers_name;?></div>
	<div>Roll No: <?php echo $roll_no;?></div>
	<div>Branch: <?php echo $branch;?></div>
	<div>
		<h1>Enter Details for Provisional</h1>
		<table>
			<thead>
				<td>S.No.</td>
				<td>Subject</td>
				<td>Maximum Marks</td>
				<?php if($p_type=='BACK')
				{
					echo '<td>Month & Year</td><td>Exam</td>';
				}
				?>

				


			</thead>
		</table>
	</div>

</body>
</html>
<?php

		// echo $full_name."<br>".$fathers_name."<br>".$roll_no."<br>".$email_id."<br>".$branch."<br>".$year."<br>".$p_type;



		// if($p_type=='REG'){
		// 	header("location: ./_fill2.php");
		// }
		// elseif(){
			
		// }
		// else{
		// 	header("location: ./index.php");
		// }
?>