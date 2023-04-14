<?php

$conn = new mysqli('localhost', 'root', '1234','phpintern');
if($conn){

// Step 2: Verify the Email Address
$email = $_GET['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0) {
  echo "This email is not registered.";
  exit;
}

// Step 3: Generate OTP
$otp = rand(1000, 9999);

// Step 4: Save OTP in the Database
$sql = "INSERT INTO password_reset_otp (email, otp, expires_at) VALUES ('$email', '$otp', DATE_ADD(NOW(), INTERVAL 10 MINUTE))";
mysqli_query($conn, $sql);

if($sql){
  echo "Data has insert into table";
}else{
  echo "Data has not inserted into table!";
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "rishukumargupta.offical@gmail.com";
$mail->Password   = "Rishu@7463906582";

$to = $email;
$subject = "Password Reset OTP";
$message = "Your OTP code is: " . $otp;
$headers = 'From: rishukumargupta8409@gmail.com';

// Send email using PHP mail function
// if (mail($to, $subject, $message, $headers)){
//   echo "Email successfully sent to $to !";
// } else {
//   echo "Email sending failed...";
// }

// Step 6: Verify OTP
$otp_entered = $_GET['otp'];
$sql = "SELECT * FROM password_reset_otp WHERE email = '$email' AND otp = '$otp_entered' AND expires_at > NOW()";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 0) {
  echo "Invalid OTP.";
  exit;
}

// Step 7: Reset Password
$new_password = $_GET['new_pass'];
$rep_password = $_GET['rep_pass'];
if($new_password==$rep_password){
  $sql = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
  mysqli_query($conn, $sql);
  echo "Password has changed!";
}
else{
  echo "No chnaged!";
}

session_start();
$_SESSION['otp'] = $otp;

// Delete the OTP from the database after the password reset
// $sql = "DELETE FROM password_reset_otp WHERE email = '$email'";
// mysqli_query($conn, $sql);
}
else{
    echo "DataBase Not connected";
}

header('content-type: application/json');
  
// $response["response"]=$resp;
// echo json_encode($response);

?>
