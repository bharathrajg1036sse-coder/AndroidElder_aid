
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM users WHERE role='elder' AND last_active < NOW() - INTERVAL 7 DAY");
res(true,"Inactive",$q->fetch_all(MYSQLI_ASSOC));
?>
