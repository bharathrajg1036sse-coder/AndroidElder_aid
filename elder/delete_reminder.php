
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("DELETE FROM reminders WHERE id=$_POST[id]");
res(true,"Deleted");
?>
