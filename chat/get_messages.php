
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM messages WHERE (sender_id=$_POST[a] AND receiver_id=$_POST[b]) OR (sender_id=$_POST[b] AND receiver_id=$_POST[a]) ORDER BY created_at");
res(true,"Messages",$q->fetch_all(MYSQLI_ASSOC));
?>
