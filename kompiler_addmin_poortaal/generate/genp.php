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
<?php
function fetch_subjects($conn,$ref_no,$p_type){
	$i='1';
$qry="SELECT * FROM buffer2_subjects WHERE ref_no='{$ref_no}'";
$results=mysqli_query($conn,$qry);
		while($resultset=mysqli_fetch_assoc($results))
		{
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td><input type='text' class='form-control' size='40' name='subname_".$i."' value='".$resultset['subjects']."'></td>";
		echo "<td id='max1_".$i."'>".$resultset['max_credit1']."</td>";
		echo "<td id='max2_".$i."'>".$resultset['max_credit2']."</td>";
		echo "<td>".($resultset['max_credit1']+$resultset['max_credit2'])."</td>";
		echo "<td><input type='number' id='cr1_".$i."' name='cr1_".$i."' min='0' max='".$resultset['max_credit1']."'   class='form-control' onchange='modf(".$i.")' value=".$resultset['credit1']." required/></td><td><input type='number' id='cr2_".$i."' name='cr2_".$i."' min='0' max='".$resultset['max_credit2']."'   class='form-control' onchange='modf(".$i.")'  value=".$resultset['credit2']." required/></td><td id='total".$i."'>".($resultset['credit1']+$resultset['credit2'])."</td>";
	if($p_type=='BACK'){
		echo "<td>".$resultset['mnth_yr']."</td><td>";
		if($resultset['back_type']=='REGULAR')
			echo "Regular Back";
		elseif($resultset['back_type']=='INTERNAL')
			echo "Internal Back";
		else
			echo "Special Back";
		echo "</td>";
	}
	echo "<td id='result".$i."'></td>";
		echo "</tr>";
			$i++;
		}
}
?>
<html>
<head>
	 <script type="text/javascript">
    	function modf(id){
    		var id1='cr1_'+id;
    		var id2='cr2_'+id;
    		elem1=document.getElementById(id1).value;
    		elem2=document.getElementById(id2).value;
    		var id3='total'+id;
        var id4='max1_'+id;
        var id5='max2_'+id;
        elem3=document.getElementById(id4).innerHTML;
        elem4=document.getElementById(id5).innerHTML;
        if(parseInt(elem3)>50){
          var ext1=0.3*parseInt(elem3);
        var ttl=0.4*(parseInt(elem3)+parseInt(elem4));
        }
        else if(parseInt(elem3)==50){
        var ext1=0.4*parseInt(elem3);
        var ttl=0.4*(parseInt(elem3)+parseInt(elem4));          
        }
        else{
        var ext1=0.5*parseInt(elem3);
        var ttl=0.5*(parseInt(elem3)+parseInt(elem4));          
        }
    		   if(isNaN(parseInt(elem1)))
    			elem1='0';    		   
    		if(isNaN(parseInt(elem2)))
    			elem2='0';
    		document.getElementById(id3).innerHTML=parseInt(elem1)+parseInt(elem2);
    		var id4='result'+id;
    		if(((parseInt(elem1)+parseInt(elem2))>=parseInt(ttl)) && parseInt(elem1)>=parseInt(ext1)){	
    		document.getElementById(id4).innerHTML='PASS';
    		}
    		else
    		{
			document.getElementById(id4).innerHTML='BACK';
    		}
    	}
    </script>
<meta charset="UTF-8">
	<title>Compiler | Provisional | THDC-IHET</title>
	<link rel="icon" href="../../extra_resources/img/logo.png">
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
  <div class="container-fluid m-3 text-center" style="background-color:white; width:96%;border-radius:5px;
	box-shadow: 0px 0px 5px  #000;">
	<form action="./check.php" method="POST" name='f1'>
	<h1  style="color:rgba(15,31,145,1);font-size:3vw;"><?php
	if($p_type=='BACK')
		echo "Back Paper Provisional";
	else
		echo "Regular Provisional of ".$sem." Semester";
	?></h1>
	
			<div  class="row text-white font-weight-bolder m-4">
			<div class="col-md-6 row mr-1">
			<span class="col-sm-6 cust-de">Name: </span><span class="col-sm-6 cust-de1"><?php echo $name;?></span></div>
			<div class="col-md-6 row">
	<span class="col-sm-6 cust-de">Father's Name: </span><span class="col-sm-6 cust-de1"><?php echo $fname;?></span>
	</div>
</div>

	<div class="row  text-white font-weight-bolder m-4">
			<div class="col-md-6 row mr-1">
	<span class="col-sm-6 cust-de">Roll No: </span><span class="col-sm-6 cust-de1"> <?php echo $rollno;?></span></div>

			<div class="col-md-6 row mr-1">
	<span class="col-sm-6 cust-de">Branch: </span><span class="col-sm-6 cust-de1"><?php echo $branch;?></span>
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
      <th scope="col" colspan="2"  >Marks Obtained</th>
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
   <th scope="col" rowspan="2" style="
	vertical-align:middle;" >Result</th>
    </tr>    
    <tr class="cust-de">
      <th scope="col">Sem</th>
      <th scope="col">Ses</th> <th scope="col">Sem</th>
      <th scope="col">Ses</th>
      </tr>
  </thead>
  <tbody class="cust-de1">
   			<?php
						fetch_subjects($conn,$id,$p_type);
			?>
  </tbody>
</table>

<input type='hidden' name='id'  <?php echo "value='".$id."'"; ?> >
<input type='submit' class="btn btn-primary"  value='Save & Check'>
<a href='javascript:void(0)' class="btn btn-primary" onclick='reject()'>Reject this Application</a>
	<br>
                 <script type="text/javascript">
          function reject(){
            var test= window.confirm("Are you sure, You want to reject this Application !");
            if(test == true)
            	<?php $lnk='./reject.php?id='.$id;
            	echo "window.location='".$lnk."'";
            ?>
          }
        </script>
	&nbsp;
	</form>
</div>
<?php
include '../../php_set/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>