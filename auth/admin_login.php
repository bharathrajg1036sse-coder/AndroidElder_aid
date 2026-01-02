<?php
include "../config/db.php";
session_start();

$email=$_POST['email'];
$pass=$_POST['password'];

$stmt=$conn->prepare("SELECT * FROM users WHERE email=? AND role='admin'");
$stmt->bind_param("s",$email);
$stmt->execute();
$user=$stmt->get_result()->fetch_assoc();

if(!$user || !password_verify($pass,$user['password']))
    exit(json_encode(["error"=>"Invalid admin credentials"]));

$_SESSION['user']=$user['id'];
$_SESSION['role']="admin";

echo json_encode(["status"=>"Admin logged in"]);
?>