<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("family");

$elder_id=$_GET['elder_id'];

$res=$conn->query("SELECT * FROM task_requests WHERE elder_id=$elder_id");

echo json_encode($res->fetch_all(MYSQLI_ASSOC));
?>