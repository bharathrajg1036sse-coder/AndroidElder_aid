<?php
include "../config/db.php";
session_start();

$email=$_POST['email'];
$pass=$_POST['password'];

$stmt=$conn->prepare("SELECT * FROM users WHERE email=? AND role='family'");
$stmt->bind_param("s",$email);
$stmt->execute();
$user=$stmt->get_result()->fetch_assoc();

if(!$user || !password_verify($pass,$user['password']))
    exit(json_encode(["error"=>"Invalid credentials"]));

if(!$user['email_verified'])
    exit(json_encode(["error"=>"Email not verified"]));

$_SESSION['user']=$user['id'];
$_SESSION['role']="family";

echo json_encode(["status"=>"Family logged in"]);
?>