<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("admin");

$user_id=$_POST['user_id'];
$conn->query("UPDATE users SET status='blocked' WHERE id=$user_id");

echo json_encode(["status"=>"User blocked"]);
?>