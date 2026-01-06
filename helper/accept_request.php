
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE service_requests SET status='accepted' WHERE id=$_POST[id]");
res(true,"Accepted");
?>
