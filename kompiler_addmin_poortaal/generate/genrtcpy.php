<?php
session_start();
  error_reporting(0);
$conn=mysqli_connect('localhost','root','','provisional_db');
    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y-m-d H:i:s");
if(!isset($_SESSION['login_id']))
{
 header("location: ../index.php");
}
if(isset($_SESSION['ref_id']))
{
$id=$_SESSION['ref_id'];
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
else {
  header("location: ../index.php");
}
?>
<html>
<head>
        <style>
    .cus_but
{
  background-color:rgba(0,162,232,1); 
  border:0px;
  color:#fff;
  font-weight:bolder; 
  transition:0.5s; 
  border-radius:2px; 
  padding:10px;
  opacity:0.5;  
  text-decoration:none; 
}
.cus_but:hover
{
  background-color:rgba(0,62,132,1); 
  transition:0.5s; 
  opacity:1;  
}
  </style>
  <meta charset="UTF-8">
  <title><?php echo $name; ?></title>
  <style type="text/css">table{
  width:96%;
  margin:2%;  
  border:1px solid #000;
  }
th,td
{border:1px solid #000;
  margin:-8px;
}
</style>
</head>
<body style="font-family: Calibri">
  <header style="border-bottom:4px solid #000; text-align:center; display:grid;grid-template-columns:4fr 40fr; line-height:0.5rem;  ">
    <img height=120 style="padding-left:40px; "src="../../extra_resources/img/logo.png">
    <div style="margin-left:-130px;"><h2>टी० एच ० डी० सी० हाइड्रोपावर अभियांत्रिकी एवं प्रौद्योगिकी संस्थान, टिहरी</h2><h2>THDC Institute of Hydropower Engineering and Technology, Tehri</h2>
    <h3>Bhagirathipuram, Tehri Garhwal, 249124 Uttarakhand,India</h3>
    <p >Website: http://www.thdcihet.ac.in</p>
  </div></header>
  <p style="font-weight:bolder; float :right; padding-right:50px;">Date:<?php echo date("d/m/Y");?></p>  <p style="font-weight:bolder; float :left; padding-left:50px;">Ref. No.:<?php echo $id;?></p>
  <table cellspacing="0" cellpadding="5">
  <tbody style="text-align:left;">
    <tr><th>Student Name :</th>
    <td><?php 
     echo $name;
    ?></td> 
    <th>Father&#39;s Name : </th>
    <td>Mr. <?php 
    echo $fname;
    ?></td></tr><tr>
    <th>Roll No. :</th>
    <td><?php 
    echo $rollno;
    ?></td>
    <th>Branch :</th>
    <td><?php 
    echo $branch;
    ?></td>
  </tr>


  </tbody>
</table>
<h3 style="text-align:center; text-decoration:underline;">Back Paper Tabulation Mark Sheet (Provisional)</h3>
<table cellspacing="0" cellpadding="5">
  <tbody style="text-align:center;">
    <tr><th rowspan="2">S. No.</th>
    <th rowspan="2">Subject</th>
    <th colspan="3">Maximum Marks</th>
    <th colspan="3">Marks Obtained</th>
    <th rowspan="2">Result</th>
    <th rowspan="2">Month & Year</th>
    <th rowspan="2">Exam</th></tr>
    <tr>
      <th>Sem</th>
      <th>Ses</th>
      <th>Total</th>
      <th>Sem</th>
      <th>Ses</th>
      <th>Total</th>
    </tr>
<?php 
$i=1;
$qry2="SELECT * FROM buffer2_subjects WHERE ref_no='{$id}'";
$result2=mysqli_query($conn,$qry2);
while($resultset2=mysqli_fetch_assoc($result2)){
  $sub=$resultset2['subjects'];
  $mmsem=$resultset2['max_credit1'];
  $mmses=$resultset2['max_credit2'];
$obtsem=$resultset2['credit1'];
$obtses=$resultset2['credit2'];
$mnth_yr=$resultset2['mnth_yr'];
$exam_type=$resultset2['back_type'];
echo '<tr><td>'.$i.'</td>
    <td>'.$sub.'</td>
    <td>'.$mmsem.'</td>
    <td>'.$mmses.'</td>
    <td>'.($mmsem+$mmses).'</td>
    <td>'.$obtsem.'</td>
    <td>'.$obtses.'</td>
    <td>'.($obtsem+$obtses).'</td>
    <td>'.$result.'</td>
    <td>'.$mnth_yr.'</td>
    <td>'.$exam_type.' BACK</td></tr>';
$i++;
}
?>

  </tbody>
</table>
<div style="margin-top:50px;">
<p style="font-weight:bolder; float:left; padding-left:80px; ">Compiled by</p>
<p style="font-weight:bolder; float:right; padding-right:80px; ">Dy. Controller of Examination, THDC-IHET</p>
<p style=" float:left; margin:0px 80px; ">Note: While severe caution has been taken in compiling the data, even though if any case of error in statement of marks has been found, the marks entered in the tabulation chart of university / Institute shall be treated as correct and final.</p>
</div>
<a style='position:fixed; bottom:20px; left:35%; ' class='cus_but'  <?php echo "href='./genp.php?id=".$id."'";?> >Go Back</a>
<a style='position:fixed; bottom:20px; left:44%; ' class='cus_but' href="./print.php" >Download</a>
<a style='position:fixed; bottom:20px; left:54%; ' class='cus_but' href="./gen.php" >Generate & Send</a>
</body>
</html>