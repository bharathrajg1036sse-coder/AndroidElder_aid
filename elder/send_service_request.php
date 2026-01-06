
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO service_requests(elder_id,helper_id,service_type) VALUES($_POST[elder_id],$_POST[helper_id],'$_POST[service]')");
res(true,"Sent");
?>
