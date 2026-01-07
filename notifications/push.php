
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO notifications(user_id,title,message) VALUES($_POST[id],'$_POST[title]','$_POST[msg]')");
res(true,"Pushed");
?>
