<?php
include "../config/db.php";
include "../config/auth.php";

$res=$conn->query("SELECT * FROM notifications WHERE user_id={$_SESSION['user']}");

echo json_encode($res->fetch_all(MYSQLI_ASSOC));
?>