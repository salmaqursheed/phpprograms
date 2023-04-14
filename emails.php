<?php

// $conn = new mysqli('localhost', 'root', '1234','phpintern');
// Generate a random 6-digit OTP code
$otp_code = rand(100000, 999999);

// Email details
$email = $_GET['email'];

$to_email = $email;
$subject = 'Password Reset OTP';
$message = 'Your OTP for password reset is '.$otp_code;
$headers = 'From: rishukumargupta.offical@gmail.com';

// Send email using PHP mail function
mail($to_email, $subject, $message);

// Store the OTP code in a session variable or database for later verification
session_start();
$_SESSION['otp_code'] = $otp_code;
?>
