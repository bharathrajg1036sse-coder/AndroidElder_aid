
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT karma_points FROM helper_profiles WHERE helper_id=$_POST[id]")->fetch_assoc();
res(true,"Karma",$q);
?>
