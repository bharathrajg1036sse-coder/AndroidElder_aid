
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE notifications SET is_read=1 WHERE id=$_POST[id]");
res(true,"Read");
?>
