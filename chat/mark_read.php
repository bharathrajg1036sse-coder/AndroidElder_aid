<?php
include "../config/db.php";
include "../config/auth.php";

$conn->query("UPDATE chat_messages SET is_read=1 WHERE receiver_id={$_SESSION['user']}");
echo json_encode(["status"=>"Messages marked read"]);
?>