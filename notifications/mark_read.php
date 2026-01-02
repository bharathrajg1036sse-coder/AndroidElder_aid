<?php
include "../config/db.php";
include "../config/auth.php";

$id=$_POST['id'];
$conn->query("UPDATE notifications SET is_read=1 WHERE id=$id");

echo json_encode(["status"=>"Marked read"]);
?>