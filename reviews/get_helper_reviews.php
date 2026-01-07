
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM reviews WHERE helper_id=$_POST[id]");
res(true,"Reviews",$q->fetch_all(MYSQLI_ASSOC));
?>
