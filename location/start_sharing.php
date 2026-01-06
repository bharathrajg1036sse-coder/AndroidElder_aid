
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("REPLACE INTO locations(user_id,is_sharing) VALUES($_POST[id],1)");
res(true,"Started");
?>
