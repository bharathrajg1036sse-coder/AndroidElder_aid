
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("DELETE FROM service_requests WHERE id=$_POST[id]");
res(true,"Cancelled");
?>
