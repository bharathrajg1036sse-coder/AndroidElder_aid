<<<<<<< HEAD
<?php
include "../config/db.php";
include "../config/auth.php";

$res=$conn->query("SELECT * FROM notifications WHERE user_id={$_SESSION['user']}");

echo json_encode($res->fetch_all(MYSQLI_ASSOC));
?>
=======

<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM notifications WHERE user_id=$_POST[id]");
res(true,"Notifications",$q->fetch_all(MYSQLI_ASSOC));
?>
>>>>>>> bd88544c526af5a869a70bbb1af3196781a4646c
