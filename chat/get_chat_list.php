
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT DISTINCT receiver_id FROM messages WHERE sender_id=$_POST[id]");
res(true,"Chats",$q->fetch_all(MYSQLI_ASSOC));
?>
