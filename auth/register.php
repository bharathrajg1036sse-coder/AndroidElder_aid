<?php
require_once '../common/db.php';
require_once '../common/response.php';
require_once __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('UTC');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['role'])) {
    res(false, "Missing fields");
    exit;
}

$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$role = $conn->real_escape_string($_POST['role']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

/* check duplicate email */
$check = $conn->query("SELECT id FROM users WHERE email='$email'");
if ($check->num_rows > 0) {
    res(false, "Email already exists");
    exit;
}

/* insert user */
$conn->query("INSERT INTO users(name,email,role,password,is_approved) 
              VALUES('$name','$email','$role','$password',0)");
$user_id = $conn->insert_id;

/* helper profile */
if ($role === 'helper') {
    $conn->query("INSERT INTO helper_profiles(helper_id, approval_status) 
                  VALUES($user_id,'pending')");
}

/* delete old OTPs if re-register */
$conn->query("DELETE FROM user_otps WHERE user_id=$user_id");

/* generate OTP */
$otp = random_int(100000, 999999);
$expires = gmdate('Y-m-d H:i:s', strtotime('+10 minutes'));

$conn->query("INSERT INTO user_otps(user_id, otp, expires_at, is_verified) 
              VALUES($user_id,'$otp','$expires',0)");

/* send OTP email */
try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'yourgmail@gmail.com';        // 🔴 CHANGE
    $mail->Password = 'GMAIL_APP_PASSWORD';         // 🔴 CHANGE
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('yourgmail@gmail.com', 'ElderAid');
    $mail->addAddress($email);

    $mail->Subject = 'ElderAid OTP Verification';
    $mail->Body = "Your OTP is: $otp\n\nValid for 10 minutes.";

    $mail->send();
} catch (Exception $e) {
    // In production: log error
}

res(true, "Registered successfully. OTP sent.", [
    "user_id" => $user_id
]);
?>
