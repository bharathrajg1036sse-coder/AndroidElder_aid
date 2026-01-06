
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT u.id,u.name,h.services,h.avg_rating FROM users u JOIN helper_profiles h ON u.id=h.helper_id WHERE approval_status='approved'");
res(true,"Helpers",$q->fetch_all(MYSQLI_ASSOC));
?>
