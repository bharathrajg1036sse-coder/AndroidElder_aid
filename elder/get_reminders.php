
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM reminders WHERE elder_id=$_POST[elder_id]");
res(true,"Reminders",$q->fetch_all(MYSQLI_ASSOC));
?>
