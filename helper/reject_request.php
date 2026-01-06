
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE service_requests SET status='rejected' WHERE id=$_POST[id]");
res(true,"Rejected");
?>
