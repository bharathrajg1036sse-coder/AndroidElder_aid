
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE helper_profiles SET approval_status='approved' WHERE helper_id=$_POST[id]");
res(true,"Approved");
?>
