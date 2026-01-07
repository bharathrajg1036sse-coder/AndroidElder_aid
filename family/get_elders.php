
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT u.* FROM users u JOIN elder_family e ON u.id=e.elder_id WHERE e.family_id=$_POST[id]");
res(true,"Elders",$q->fetch_all(MYSQLI_ASSOC));
?>
