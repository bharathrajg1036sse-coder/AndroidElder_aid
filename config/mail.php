<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

function sendMail($to, $subject, $body){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "your@gmail.com";
    $mail->Password = "APP_PASSWORD";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->setFrom("your@gmail.com", "ElderAid");
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->send();
}
?>
