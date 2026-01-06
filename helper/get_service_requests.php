
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM service_requests WHERE helper_id=$_POST[id]");
res(true,"Requests",$q->fetch_all(MYSQLI_ASSOC));
?>
