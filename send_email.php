<?php 
 
// add require path  
require 'path/to/PHPMailer/src/PHPMailer.php'; 
require 'path/to/PHPMailer/src/SMTP.php'; 
require 'path/to/phpmailer/PHPMailerAutoload.php'; 
 
$conn = new mysqli('localhost', 'root', '','klcdoe'); 
if($conn){ 
 
 
$email=$_GET['email'];   
//creating objects for phpmailer 
$mail = new PHPMailer\PHPMailer\PHPMailer(); 
 
##set mail 
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true; 
$mail->Username = 'rishukumr0187@gmail.com'; 
$mail->Password = 'Rishu@7463906582'; 
$mail->SMTPSecure = 'tls'; 
$mail->Port = 587; 
 
//set the email details 
$mail->setFrom('rishukumr0187@gmail.com', 'Rishu kumar'); 
$mail->addAddress($email, "testing"); 
$mail->Subject = 'Subject of the email'; 
$mail->Body = 'Body of the email'; 
 
//finally send mail 
 
if(!$mail->send()) { 
  echo 'Error: ' . $mail->ErrorInfo; 
} else { 
  echo 'Message sent successfully.'; 
} 
 
 
} 
else{ 
    echo "DataBase Not connect";
}
?>