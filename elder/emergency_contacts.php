
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT u.* FROM users u JOIN emergency_contacts e ON u.id=e.family_id WHERE e.elder_id=$_POST[elder_id]");
res(true,"Contacts",$q->fetch_all(MYSQLI_ASSOC));
?>
