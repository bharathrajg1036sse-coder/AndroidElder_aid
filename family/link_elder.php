<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("family");

$elder_id=$_POST['elder_id'];

$stmt=$conn->prepare("INSERT INTO family_links(family_id,elder_id) VALUES(?,?)");
$stmt->bind_param("ii",$_SESSION['user'],$elder_id);
$stmt->execute();

echo json_encode(["status"=>"Linked to elder"]);
?>