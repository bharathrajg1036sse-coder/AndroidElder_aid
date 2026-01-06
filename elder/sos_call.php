
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO sos_logs(elder_id) VALUES($_POST[elder_id])");
res(true,"SOS");
?>
