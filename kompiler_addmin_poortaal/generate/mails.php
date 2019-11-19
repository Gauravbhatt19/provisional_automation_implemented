<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
// error_reporting(0);
$conn=mysqli_connect('localhost','root','','provisional_db');
    date_default_timezone_set("Asia/Kolkata");
    $dt=date("Y-m-d H:i:s");
if(!isset($_SESSION['login_id']))
{
 header("location: ../index.php");
}
if(isset($_GET['ref']))
{
$id=$_GET['ref'];
$mail = new PHPMailer(true);
$qry="SELECT * FROM buffer WHERE ref_no='{$id}'";
    $results=mysqli_query($conn,$qry);
    $resultset=mysqli_fetch_assoc($results);
    $name=$resultset['name'];
    $email_id=$resultset['email_id'];
    $qry1="SELECT * FROM refer_table WHERE ref_no='{$id}'";
    $results1=mysqli_query($conn,$qry1);
    $resultset1=mysqli_fetch_assoc($results1);
    $rollno=$resultset1['roll_no'];
$filename=$id.'_'.$rollno;
try {
 $mail->SMTPDebug =0;      
    $mail->isSMTP();   
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;    
    $mail->Username   = 'provisional.thdcihet@gmail.com';
    $mail->Password   = 'Provisional@1234';              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
    $mail->Port       = 587;                             
    $mail->setFrom('provisional.thdcihet@gmail.com', 'Provisional Portal');
    $mail->addAddress($email_id,$name);   
    $mail->addReplyTo('provisional.thdcihet@gmail.com', 'Provisional Portal');
    $mail->isHTML(true);           
    $mail->Subject = 'Provisional Marksheet THDC IHET | '.$name;
    $mail->Body    = 'PFA to the Provisional Marksheet.<br> <b>Note: </b> This mark sheet is valid only after Signature from Dy. Controller of Examination. ';
    $mail->AltBody = 'PFA to the Provisional Marksheet.Note: This mark sheet is valid only after Signature from Dy. Controller of Examination. ';
$full_path='./temp/'.$filename.'.pdf';
  $mail->addAttachment($full_path);
    $mail->send();
        unlink($full_path);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
else {
  header("location: ../index.php");
}
?>