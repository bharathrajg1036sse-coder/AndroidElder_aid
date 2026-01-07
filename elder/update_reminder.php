
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE reminders SET title='$_POST[title]' WHERE id=$_POST[id]");
res(true,"Updated");
?>
