<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("helper");

$task_id=$_POST['task_id'];

$stmt=$conn->prepare("UPDATE task_requests SET helper_id=?, status='accepted' WHERE id=?");
$stmt->bind_param("ii",$_SESSION['user'],$task_id);
$stmt->execute();

echo json_encode(["status"=>"Task accepted"]);
?>