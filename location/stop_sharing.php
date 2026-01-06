
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE locations SET is_sharing=0 WHERE user_id=$_POST[id]");
res(true,"Stopped");
?>
