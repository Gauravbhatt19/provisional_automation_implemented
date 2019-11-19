<?php
session_start();
  error_reporting(0);
  	require_once '../../extra_resources/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
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
$dompdf = new Dompdf();
$html="<style>@page {
  margin:1cm;
}</style><div style=' margin:-8px; border-bottom:2px solid #000; text-align:center;line-height:0.5rem;'>
<img height=120 style='padding-left:40px; position:fixed; left:-50px;' src='./logo.png'>
    <div style='margin-left:80px;'><img style='margin-bottom:15px; width:80%;' src='./hindi.png'><h2>THDC Institute of Hydropower Engineering and Technology, Tehri</h2>
    <h3>Bhagirathipuram, Tehri Garhwal, 249124 Uttarakhand,India</h3>
    <p >Website: http://www.thdcihet.ac.in</p>
  </div></div>
  ";
$html.="  <p style='font-weight:bolder; float :left; padding-left:50px;'>Ref. No.:".$id."</p><p style='font-weight:bolder; float :right; margin:-3px; padding-right:50px;'>Date:".date('d/m/Y')."</p>
<table cellspacing='0' cellpadding='5' border='2' style='width:100%; margin-top:30px;'>
  <tbody style='text-align:left;'>
    <tr><th>Student Name :</th>
    <td>";
 $html.=$name."</td> 
    <th>Father&#39;s Name : </th>
    <td>Mr.".$fname."</td></tr><tr>
    <th>Roll No. :</th>
    <td>".$rollno."</td>
    <th>Branch :</th>
    <td>".$branch."</td>
  </tr></tbody>
</table>
<h3 style='text-align:center; text-decoration:underline;'>Back Paper Tabulation Mark Sheet (Provisional)</h3>
<table cellspacing='0' cellpadding='5' border='2' style='width:100%; margin-top:30px;'>
  <tbody style='text-align:center;'>
    <tr><th rowspan='2'>S. No.</th>
    <th rowspan='2'>Subject</th>
    <th colspan='3'>Maximum Marks</th>
    <th colspan='3'>Marks Obtained</th>
    <th rowspan='2'>Result</th>
    <th rowspan='2'>Month & Year</th>
    <th rowspan='2'>Exam</th></tr>
    <tr>
      <th>Sem</th>
      <th>Ses</th>
      <th>Total</th>
      <th>Sem</th>
      <th>Ses</th>
      <th>Total</th>
    </tr>";
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
        if($mmsem>'50'){
          $ext1=0.3*$mmsem;
        $ttl=0.4*($mmsem+$mmses);
        }
        elseif($mmsem=='50'){
        $ext1=0.4*$mmsem;
        $ttl=0.4*($mmsem+$mmses);          
        }
        else{
        $ext1=0.5*$mmsem;
        $ttl=0.5*($mmsem+$mmses);          
        }
        if((($obtsem+$obtses)>=$ttl) and $obtsem>=$ext1){  
        $rslt='PASS';
        }
        else
        {
        $rslt='BACK';
        }
$html.='<tr><td>'.$i.'</td>
    <td>'.$sub.'</td>
    <td>'.$mmsem.'</td>
    <td>'.$mmses.'</td>
    <td>'.($mmsem+$mmses).'</td>
    <td>'.$obtsem.'</td>
    <td>'.$obtses.'</td>
    <td>'.($obtsem+$obtses).'</td>
    <td>'.$rslt.'</td></tr>';
$i++;
}
   $html.="</tbody>
</table>
<div style='position:relative; top:50px;'>
<p style='font-weight:bolder; position:absolute; left:50px;'>Compiled by</p>
<p style='font-weight:bolder; position:absolute; right:50px; margin-top:0;'>Dy. Controller of Examination, THDC-IHET</p>
<p style='position:absolute;left:0px;top:20px;'>Note: While severe caution has been taken in compiling the data, even though if any case of error in statement of marks has been found, the marks entered in the tabulation chart of university / Institute shall be treated as correct and final.</p>
</div>";
 $dompdf->loadHtml($html); 
$dompdf->setPaper('A4', 'landscape'); 
$dompdf->render(); 
$filename=$id.'_'.$rollno;
$dompdf->stream($filename, array("Attachment" => 0));
  header("location: ./genrtcpy.php");
}
else {
  header("location: ../index.php");
}
?>