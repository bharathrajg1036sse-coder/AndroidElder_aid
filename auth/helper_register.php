<?php
include "../config/db.php";

$name=$_POST['name'];
$email=$_POST['email'];
$pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
$id_type=$_POST['govt_id_type'];
$id_number=$_POST['govt_id_number'];

$file=$_FILES['govt_id_file'];
$path="../uploads/govt_ids/".time()."_".$file['name'];
move_uploaded_file($file['tmp_name'],$path);

$stmt=$conn->prepare("INSERT INTO users(role,name,email,password) VALUES('helper',?,?,?)");
$stmt->bind_param("sss",$name,$email,$pass);
$stmt->execute();
$user_id=$conn->insert_id;

$conn->query("INSERT INTO helper_profiles(user_id) VALUES($user_id)");

$stmt=$conn->prepare("INSERT INTO govt_ids(user_id,id_type,id_number,id_file) VALUES(?,?,?,?)");
$stmt->bind_param("isss",$user_id,$id_type,$id_number,$path);
$stmt->execute();

echo json_encode(["status"=>"Helper registered. Await admin approval"]);
