<?php
include "../config/db.php";
include "../config/auth.php";

$other=$_GET['user_id'];

$res=$conn->query("
SELECT * FROM chat_messages
WHERE (sender_id={$_SESSION['user']} AND receiver_id=$other)
   OR (sender_id=$other AND receiver_id={$_SESSION['user']})
ORDER BY created_at ASC");

echo json_encode($res->fetch_all(MYSQLI_ASSOC));
?>