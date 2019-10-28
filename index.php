<?php
include "./php_set/conn.php";
session_start();
if(isset($_POST['full_name']))
{
	if(!isset($_POST['fathers_name']))
	{
		$_SESSION['err1']='Please Enter Valid fathers\' name';
	}
	if(!isset($_POST['roll_no']))
	{
		$_SESSION['err2']='Please Enter Valid Roll no.';
	}
	if(!isset($_POST['email_id']))
	{
		$_SESSION['err3']='Please Enter Valid Email ID';
	}
	if ( (isset($_POST['full_name'])) and (isset($_POST['fathers_name'])) and (isset($_POST['roll_no'])) and (isset($_POST['email_id'])) )
	{
		$_SESSION['full_name']=mysqli_escape_string($conn,$_POST['full_name']);
		$_SESSION['fathers_name']=mysqli_escape_string($conn,$_POST['fathers_name']);
		$_SESSION['roll_no']=mysqli_escape_string($conn,$_POST['roll_no']);
		$_SESSION['email_id']=mysqli_escape_string($conn,$_POST['email_id']);
		$_SESSION['branch']=mysqli_escape_string($conn,$_POST['branch']);
		$_SESSION['year']=mysqli_escape_string($conn,$_POST['year']);
		$_SESSION['p_type']=mysqli_escape_string($conn,$_POST['p_type']);
		header("location: ./_fill1.php");
	}
}
?>
<?php
function fetch_instruction($conn){
	$ins='instructions';
	$qry="SELECT * FROM general WHERE name='".$ins."'";
	$result=mysqli_query($conn,$qry);
	$resultset=mysqli_fetch_assoc($result);
	$list=explode('<br>', $resultset['val']);
	foreach ($list as $l) {
		echo "<li>".$l." </li>";
		}
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div>
	<h1>Instructions</h1>
	<ol>
		<?php
		fetch_instruction($conn);
		?>
	</ol>
</div>

<div>
	<form action="./" method="POST">
		<input type="text" name='full_name' placeholder="Full Name" required>

		<br>
		<input type="text" name='fathers_name' placeholder="Fathers Name" required>
		<?php
		if (isset($_SESSION['err1']))
		{
			echo $_SESSION['err1'];
		}
		?>
		<br>
		<input type="number" name='roll_no' placeholder="Roll No." required>
				<?php
		if (isset($_SESSION['err2']))
		{
			echo $_SESSION['err2'];
		}
		?><br>
		<select name="branch" required>
			<option disabled selected>Branch</option>
			<option value="CSE">CSE</option>
			<option value="CE">CE</option>
			<option value="ECE">ECE</option>
			<option value="EE">EE</option>
			<option value="ME">ME</option>
		</select>
		<br>
		<input type="email" name='email_id' placeholder="Where Provisional to be receive" required>
				<?php
		if (isset($_SESSION['err3']))
		{
			echo $_SESSION['err3'];
		}
		?><br>
	<select name="year" required>
			<option disabled selected>Year of Admission</option>
			<option value="17">Before or 2017</option>
			<option value="18">After 2017</option>
	</select>
		<br>
	<select name="p_type" required>
			<option disabled selected>Provisional Type</option>
			<option value="REG">Regular</option>
			<option value="BACK">Back Paper</option>
	</select>
	<br>
	<input type="submit" value="Initiate for Provisional">
	</form>
</div>
</body>
</html>