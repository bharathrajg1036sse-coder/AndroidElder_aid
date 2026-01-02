<?php
include "../config/db.php";
include "../config/mail.php";

$email = $_POST['email'];
$otp = rand(100000,999999);
$exp = date("Y-m-d H:i:s", strtotime("+5 minutes"));

$stmt = $conn->prepare("INSERT INTO email_otps(email,otp,expires_at) VALUES(?,?,?)");
$stmt->bind_param("sss",$email,$otp,$exp);
$stmt->execute();

sendMail($email,"ElderAid OTP","Your OTP: <b>$otp</b>");
echo json_encode(["status"=>"OTP sent"]);
