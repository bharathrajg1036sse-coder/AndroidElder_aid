<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("helper");

$task_id=$_POST['task_id'];

$conn->query("UPDATE task_requests SET status='completed' WHERE id=$task_id");

echo json_encode(["status"=>"Task completed"]);
?>