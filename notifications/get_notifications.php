
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM notifications WHERE user_id=$_POST[id]");
res(true,"Notifications",$q->fetch_all(MYSQLI_ASSOC));
?>
