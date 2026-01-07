
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE locations SET latitude=$_POST[lat],longitude=$_POST[lng] WHERE user_id=$_POST[id]");
res(true,"Updated");
?>
