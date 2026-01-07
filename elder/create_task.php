<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("elder");

$desc=$_POST['description'];

$stmt=$conn->prepare("INSERT INTO task_requests(elder_id,description,status) VALUES(?,?, 'requested')");
$stmt->bind_param("is",$_SESSION['user'],$desc);
$stmt->execute();

echo json_encode(["status"=>"Task requested"]);
?>