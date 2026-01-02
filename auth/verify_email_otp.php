<?php
include "../config/db.php";

$email=$_POST['email'];
$otp=$_POST['otp'];

$stmt=$conn->prepare("SELECT id FROM email_otps WHERE email=? AND otp=? AND expires_at>NOW()");
$stmt->bind_param("ss",$email,$otp);
$stmt->execute();
$res=$stmt->get_result();

if($res->num_rows){
    $conn->query("UPDATE users SET email_verified=1 WHERE email='$email'");
    echo json_encode(["status"=>"verified"]);
}else{
    echo json_encode(["error"=>"Invalid OTP"]);
}
