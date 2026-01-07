<?php
include "../config/db.php";
session_start();

$email=$_POST['email'];
$pass=$_POST['password'];

$q=$conn->prepare("SELECT u.*, h.approval_status FROM users u JOIN helper_profiles h ON u.id=h.user_id WHERE u.email=?");
$q->bind_param("s",$email);
$q->execute();
$user=$q->get_result()->fetch_assoc();

if(!$user || !password_verify($pass,$user['password']))
    exit(json_encode(["error"=>"Invalid credentials"]));

if(!$user['email_verified'])
    exit(json_encode(["error"=>"Email not verified"]));

if($user['approval_status']!='approved')
    exit(json_encode(["error"=>"Admin approval pending"]));

$_SESSION['user']=$user['id'];
$_SESSION['role']="helper";

echo json_encode(["status"=>"Helper logged in"]);
?>