<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("elder");

$conn->query("INSERT INTO emergency_logs(elder_id) VALUES({$_SESSION['user']})");

$conn->query("INSERT INTO notifications(user_id,message)
SELECT family_id,'Emergency alert from linked elder'
FROM family_links WHERE elder_id={$_SESSION['user']}");

echo json_encode(["status"=>"Emergency sent"]);
?>