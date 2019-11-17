<?php
session_start();
require_once '../extra_resources/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$conn=mysqli_connect('localhost','root','','provisional_db');
if(isset($_SESSION['login_id']) and isset($_POST['1']))
{
    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y-m-d");
    $i='1';
$dompdf = new Dompdf();
$html="<style>@page {
  margin:1cm;
}</style><div style=' margin:-8px; border-bottom:2px solid #000; text-align:center;line-height:0.5rem;'>
<img height=100 style='padding-left:40px; position:fixed; left:-50px;' src='./generate/logo.png'>
    <div style='margin-left:80px;'><img style='margin-bottom:15px; width:70%;' src='./generate/hindi.png'><h3>THDC Institute of Hydropower Engineering and Technology, Tehri</h3>
    <h4>Bhagirathipuram, Tehri Garhwal, 249124 Uttarakhand,India</h4>
    <p >Website: http://www.thdcihet.ac.in</p>
  </div></div>
  <p style='font-weight:bolder; float :right;  padding-right:50px;'>Date:".date('d/m/Y')."</p><h3 style='text-align:center; text-decoration:underline; padding-left:5%;'>Reference Table (Provisional Portal)</h3><table cellspacing='0' cellpadding='5' border='1' style='width:100%; margin-top:30px;'>  <tbody style='text-align:center;'>    <tr><th>Ref.No.</th><th>Name</th>    <th>Roll No.</th>    <th>Date</th>    </tr>";
$id=$_POST[$i];
    while(isset($_POST[$i])){
      $qry="SELECT * FROM refer_table WHERE ref_no='{$id}' ORDER BY ref_no";
    $results=mysqli_query($conn,$qry);
    $resultset=mysqli_fetch_assoc($results);
    $name=$resultset['name'];
    $rollno=$resultset['roll_no'];
   $last=date("d-m-Y",strtotime($resultset['last_modify']));  
    $html.='<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$rollno.'</td><td>'.$last.'</td></tr>';
      $i++;
      if(isset($_POST[$i])){
      $id=$_POST[$i];
    }
    }
   $html.="</tbody></table>";
 $dompdf->loadHtml($html); 
$dompdf->setPaper('A4', 'Portrait');
$dompdf->render(); 
$filename='refer_table_'.$dt;
$dompdf->stream($filename, array("Attachment" => 0));
}
else{
    header("location: ./index.php");

}
	
?>