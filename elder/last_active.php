
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE users SET last_active=NOW() WHERE id=$_POST[user_id]");
res(true,"Updated");
?>
