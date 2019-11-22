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
	$qry1="SELECT * FROM subjects WHERE branch='$branch' and batch='$year' and sem='$sem' ORDER BY id";
	$results=mysqli_query($conn,$qry1);
	$i=1;
	while($resultset=mysqli_fetch_assoc($results)){
		echo "<tr id='T".$i."'>";
		echo "<td id='S".$i."'>".$i."</td>";
		echo "<td>
				<input type='hidden' name='".$i."' value='".$resultset['subcode']."'>		
		".$resultset['subcode']." ".$resultset['name']."</td>";
		echo "<td>".$resultset['credit1']."</td>";
		echo "<td>".$resultset['credit2']."</td>";
		echo "<td><a href='javascript:void(0)' onclick='del(this.id)' id='".$i."'>Delete</a></td>";
		echo "</tr>";
		$i++;
	}
	if($i==1){
			echo "<td id='S1'>1</td><td><input type='text' placeholder='e.g. TCS401 Discrete Mathematics' class='form-control' name='subcode1' required/></td><td>	<select class='form-control'  name='credit11'><option value='100'>100</option><option value='50'>50</option><option value='25'>25</option></select></td><td>	<select class='form-control' name='credit21'><option value='50'>50</option><option value='25'>25</option></select></td><td><a href='javascript:void(0)' onclick='del(this.id)' id='1' style='display:none;'>Delete</a></td>";
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
    	{background-color: rgba(215,228,245,1); overflow-x:hidden;}
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
    	 .cust-de th,.cust-de td {
    	 	border:3px solid #fff;
    	 }
    	 .cust-de1 td {
    	 	border:1px solid #000;
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
		function addSub(t) {
    parentId='tb1';
    var p = document.getElementById(parentId);
    i=document.getElementById('tb1').lastElementChild.lastElementChild.lastElementChild.childNodes[0].id;
    i++;
    elementId="T"+i;
    var newElement = document.createElement('tr');
    newElement.setAttribute('id', elementId);
    newElement.setAttribute('class', 'cust-de1');
   	if(t=='1'){
   		newElement.innerHTML ="<td id='S"+i+"'>"+i+"</td>"+"<td><input type='text' placeholder='e.g. TCS401 Discrete Mathematics' class='form-control' name='subcode"+i+"' required/></td><td>	<select class='form-control'  name='credit1"+i+"'><option value='100'>100</option><option value='50'>50</option><option value='25'>25</option></select></td><td>	<select class='form-control' name='credit2"+i+"'><option value='50'>50</option><option value='25'>25</option></select></td><td><a href='javascript:void(0)' onclick='del(this.id)' id='"+i+"'>Delete</a></td>";
    }
    else{
	newElement.innerHTML ="<td id='S"+i+"'>"+i+"</td>"+"<td><input type='text' placeholder='e.g. TCS401 Discrete Mathematics' class='form-control' name='subcode"+i+"' required/></td><td>	<select class='form-control'  name='credit1"+i+"'><option value='100'>100</option><option value='50'>50</option><option value='25'>25</option></select></td><td>	<select class='form-control' name='credit2"+i+"'><option value='50'>50</option><option value='25'>25</option></select></td><td><input type='text' placeholder='e.g. Dec 2018' class='form-control' name='mnth_yr"+i+"' required/></td><td><select class='form-control' name='btype"+i+"'><option value='REGULAR'>Regular Back</option><option value='INTERNAL'>Internal Back</option> <option value='SPECIAL'>Special Back</option> </select></td><td><a href='javascript:void(0)' onclick='del(this.id)' id='"+i+"'>Delete</a></td>";
   
    }p.lastElementChild.appendChild(newElement);
}
function rst() {
	   var txt;
var r = confirm("Are you sure to reset the table !");
if (r == true) {
location.reload();
  }
}
	</script>
</head>
<body>
		<?php
	include "./php_set/header.php";
	?>	<?php
	include "./php_set/header1.php";
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
  <div class="container-fluid m-3 text-center" style="background-color:white; width:96%;border-radius:5px;
	box-shadow: 0px 0px 5px  #000;  ">
		<form action="./_pushapply.php" method="POST">
  	<h1 style="color:rgba(15,31,145,1);font-size:3vw;">Enter Details for Provisional</h1>
<table class="table table-bordered text-white text-center" id='tb1'>
  <thead>
    <tr class="cust-de">
      <th scope="col" rowspan="2"  style="
	vertical-align:middle;">Sl No.</th>
      <th scope="col" rowspan="2"  style="
	vertical-align:middle;">Subject</th>
      <th scope="col" colspan="2"  >Maximum Marks</th>
      <?php if($p_type=='BACK')
				{
					echo '
      <th scope="col" rowspan="2"  style="
	vertical-align:middle;">Month & Year</th>
      <th scope="col" rowspan="2"  style="
	vertical-align:middle;">Exam</th>';
				}
				?>
       <?php if($p_type=='REG')
				{
					echo '<th scope="col">Action</th>';
				}
				else
				{
					echo '<th scope="col"  rowspan="2" style="vertical-align:middle;">Action</th>';
				}
				?> 
    </tr>    
    <tr class="cust-de">
      <th scope="col">Sem</th>
      <th scope="col">Ses</th>
             <?php if($p_type=='REG')
				{
					echo '<th scope="col" class="bg-white" style="border:1px solid #000;"><button type="button" onclick="rst()" class="btn btn-warning">Reset Table</button></th>';
				}
				?> 
      </tr>
  </thead>
  <tbody class="cust-de1">
   			<?php
					if($p_type=='REG'){
						fetch_subjects($conn,$branch,$year,$sem);
			}
			else{
				echo "<td id='S1'>1</td><td><input type='text' placeholder='e.g. TCS401 Discrete Mathematics' class='form-control' name='subcode1' required/></td><td>	<select class='form-control'  name='credit11'><option value='100'>100</option><option value='50'>50</option><option value='25'>25</option></select></td><td>	<select class='form-control' name='credit21'><option value='50'>50</option><option value='25'>25</option></select></td><td><input type='text' placeholder='e.g. Dec 2018' class='form-control' name='mnth_yr1' required/></td><td><select class='form-control' name='btype1'><option value='REGULAR'>Regular Back</option><option value='INTERNAL'>Internal Back</option> <option value='SPECIAL'>Special Back</option> </select></td><td><a href='javascript:void(0)' onclick='del(this.id)' id='1' style='display:none;'>Delete</a></td>";
			}
			?>
  </tbody>
</table>
  <?php
					if($p_type=='REG'){
						echo "<a href='javascript:void(0)' onclick='addSub(1)' class='btn btn-primary'>Add Subject</a>";			
			}
			elseif($p_type=='BACK')
				{
					echo "<a href='javascript:void(0)' onclick='addSub(0)'  class='btn btn-primary'>Add Subject</a>";
				}
				?>
	<input type="submit" class="btn btn-primary" value="Save & Check">
	</form>
<br>
   </div><?php
include './php_set/footer.php';
?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>