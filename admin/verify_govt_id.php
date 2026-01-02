<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("admin");

$id=$_POST['govt_id_id'];
$status=$_POST['status']; // approved/rejected

$stmt=$conn->prepare("UPDATE govt_ids SET verification_status=? WHERE id=?");
$stmt->bind_param("si",$status,$id);
$stmt->execute();

echo json_encode(["status"=>"Govt ID updated"]);
?>