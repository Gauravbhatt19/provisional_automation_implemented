<?php
	include './php_set/conn.php';
	session_start();
	// error_reporting(0);
	if ( (isset($_SESSION['full_name'])) and (isset($_SESSION['fathers_name'])) and (isset($_SESSION['roll_no'])) and (isset($_SESSION['email_id'])) and (isset($_SESSION['branch'])) and (isset($_SESSION['year'])) and (isset($_SESSION['p_type'])) and ((isset($_POST['subcode1'])) or (isset($_POST['1']))))
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
$Apply='Apply';
$gar_id=date("Y")+date("m")+date("d")+date("H")+date("i")+date("s");
$gar_id=mt_rand($gar_id,$gar_id*$gar_id);
	$query1="INSERT INTO refer_table(name,branch,roll_no,stat,gar_id) VALUES ('".$full_name."','".$branch."','".$roll_no."','".$Apply."','".$gar_id."')";
	$result=mysqli_query($conn,$query1);
	if($p_type=='REG'){
	if($result){
		$query2="SELECT ref_no FROM refer_table WHERE gar_id='".$gar_id."'";
	$result1=mysqli_query($conn,$query2);
	$resultset1=mysqli_fetch_assoc($result1);
	if($result1){
		$ref_no=$resultset1['ref_no'];
		$_SESSION['ref_no']=$ref_no;
		$msg='Your Application is under Process, and you will receive your marksheet within next 24 working Hours.';
		$query3="INSERT INTO buffer(ref_no,name,msg,father_name,email_id,yearofadmin,type,provisional_sem) VALUES ('".$ref_no."','".$full_name."','".$msg."','".$fathers_name."','".$email_id."','".$year."','".$p_type."','".$sem."')";
		$result2=mysqli_query($conn,$query3);
		if($result2){	
			$i='1';
$subcode=$_POST[$i];
	$qry1="SELECT * FROM subjects WHERE subcode='$subcode'";
	$results=mysqli_query($conn,$qry1);
	$resultset=mysqli_fetch_assoc($results);
 while(isset($resultset['subcode']))
 	{
 		$subject=$resultset['subcode'].' '.$resultset['name'];
 		$max_credit1=$resultset['credit1'];
 		$max_credit2=$resultset['credit2'];
 			$btype='REGULAR';$query4="INSERT INTO buffer2_subjects(ref_no,subjects,max_credit1,max_credit2,back_type) VALUES ('".$ref_no."','".$subject."','".$max_credit1."','".$max_credit2."','".$btype."')";
$result5=mysqli_query($conn,$query4);
		if(!$result5){	
$query9="DELETE FROM buffer WHERE ref_no ='".$ref_no."'";
$result10=mysqli_query($conn,$query9);
		$query6="DELETE FROM buffer2_subjects WHERE ref_no ='".$ref_no."'";
$result7=mysqli_query($conn,$query6);
$query9="DELETE FROM refer_table WHERE ref_no ='".$ref_no."'";
$result10=mysqli_query($conn,$query9);
echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
}	
		$i++;
		$subcode=$_POST[$i];
	$qry1="SELECT * FROM subjects WHERE subcode='$subcode'";
	$results=mysqli_query($conn,$qry1);
	$resultset=mysqli_fetch_assoc($results);
}
while(isset($_POST[$i])){
			$subcode=$_POST[$i];
			$c1id='credit1'.$i;
			$c2id='credit2'.$i;
			$credit1=$_POST[$c1id];
			$credit2=$_POST[$c2id];
			$i++;
			$btype='REGULAR';
$query7="INSERT INTO buffer2_subjects(ref_no,subjects,max_credit1,max_credit2,back_type) VALUES ('".$ref_no."','".$subcode."','".$credit1."','".$credit2."','".$btype."')";
$result8=mysqli_query($conn,$query7);
		if(!$result8){	
		$query9="DELETE FROM buffer WHERE ref_no ='".$ref_no."'";
$result10=mysqli_query($conn,$query9);
$query9="DELETE FROM buffer2_subjects WHERE ref_no ='".$ref_no."'";
$result10=mysqli_query($conn,$query9);
$query9="DELETE FROM refer_table WHERE ref_no ='".$ref_no."'";
$result10=mysqli_query($conn,$query9);
echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
		}
		}
	}
		else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
	}


	}
	else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
	}
}	else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
	}
}
elseif($p_type=='BACK'){
	if($result){
		$query2="SELECT ref_no FROM refer_table WHERE gar_id='".$gar_id."'";
	$result1=mysqli_query($conn,$query2);
	$resultset1=mysqli_fetch_assoc($result1);
	if($result1){
		$ref_no=$resultset1['ref_no'];
		$_SESSION['ref_no']=$ref_no;
		$msg='Your Application is under Process, and you will receive your marksheet within next 24 working Hours.';
		$query3="INSERT INTO buffer(ref_no,name,msg,father_name,email_id,yearofadmin,type,provisional_sem) VALUES ('".$ref_no."','".$full_name."','".$msg."','".$fathers_name."','".$email_id."','".$year."','".$p_type."','".$sem."')";
		$result2=mysqli_query($conn,$query3);
		if($result2){	
			$i='1';
			$subcodeid='subcode'.$i;
while(isset($_POST[$subcodeid])){
			$subcode=$_POST[$subcodeid];
			$c1id='credit1'.$i;
			$c2id='credit2'.$i;
			$mnth_yrid="mnth_yr".$i;
			$btypeid="btype".$i;
			$credit1=$_POST[$c1id];
			$credit2=$_POST[$c2id];
			$mnth_yr=$_POST[$mnth_yrid];
			$btype=$_POST[$btypeid];
			$i++;
			$subcodeid='subcode'.$i;
$query7="INSERT INTO buffer2_subjects(ref_no,subjects,max_credit1,max_credit2,back_type,mnth_yr) VALUES ('".$ref_no."','".$subcode."','".$credit1."','".$credit2."','".$btype."','".$mnth_yr."')";
$result8=mysqli_query($conn,$query7);
		if(!$result8){	
		$query9="DELETE FROM buffer WHERE ref_no ='".$ref_no."'";
$result10=mysqli_query($conn,$query9);
$query9="DELETE FROM buffer2_subjects WHERE ref_no ='".$ref_no."'";
$result10=mysqli_query($conn,$query9);
$query9="DELETE FROM refer_table WHERE ref_no ='".$ref_no."'";
$result10=mysqli_query($conn,$query9);
echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
		}
		}
	}
		else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
	}


	}
	else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
	}
}	else{
		echo"<script type='text/javascript'>
	window.setTimeout(function() { alert( 'Internal Error.! Please Check Status or Try Again.!' );
    window.location = './index.php';},0);
	</script>";
	}
}
	else 
		{	
			header("location: ./index.php");
		}
}

?>
<?php
header("location: ./_result.php");
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Error Page</title>
</head>
<body>
	<?php
	header("location: ./_result.php");
	?>
</body>
</html>