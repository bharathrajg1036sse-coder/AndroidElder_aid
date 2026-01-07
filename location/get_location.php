
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM locations WHERE user_id=$_POST[id]")->fetch_assoc();
res(true,"Location",$q);
?>
