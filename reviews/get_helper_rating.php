
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT AVG(rating) avg FROM reviews WHERE helper_id=$_POST[id]")->fetch_assoc();
res(true,"Rating",$q);
?>
