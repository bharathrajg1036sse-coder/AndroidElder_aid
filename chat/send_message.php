
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO messages(sender_id,receiver_id,message) VALUES($_POST[from],$_POST[to],'$_POST[msg]')");
res(true,"Sent");
?>
