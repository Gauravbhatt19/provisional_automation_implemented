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
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>Please Check all the details before Submitting your application.</h1>
	<table>
		<thead>
			<tr>
				<td>Name: <?php echo $full_name; ?></td>
				<td>Fathers Name: <?php echo $fathers_name; ?></td>
				<td>Roll No: <?php echo $roll_no; ?></td>
				<td>Branch: <?php echo $branch; ?></td>
			</tr>
		</thead>
		<tbody>
<?php
$i='1';
		$_SESSION[$i]=$_POST[$i];
		while(isset($_SESSION[$i])){
			$subcode=$_SESSION[$i];
	$qry1="SELECT * FROM subjects WHERE subcode='$subcode'";
	$results=mysqli_query($conn,$qry1);
	$resultset=mysqli_fetch_assoc($results);
		echo "<tr id='T".$i."'>";
		echo "<td id='S".$i."'>".$i."</td>";
		echo "<td>".$resultset['subcode']." ".$resultset['name']."</td>";
		echo "<td>".$resultset['credit']."</td>";
		echo "</tr>";
			$i++;
			if(isset($_POST[$i])){
			$_SESSION[$i]=$_POST[$i];	
			}
		}
?>
		</tbody>
	</table>
	<a href="#">Submit the details</a>
	<a href="#">Edit Application</a>
	<a href="./_discard.php">Discard this Application</a>
</body>
</html>