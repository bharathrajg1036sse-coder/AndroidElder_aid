<<<<<<< HEAD
<?php
include "../config/db.php";
include "../config/auth.php";

$other=$_GET['user_id'];

$res=$conn->query("
SELECT * FROM chat_messages
WHERE (sender_id={$_SESSION['user']} AND receiver_id=$other)
   OR (sender_id=$other AND receiver_id={$_SESSION['user']})
ORDER BY created_at ASC");

echo json_encode($res->fetch_all(MYSQLI_ASSOC));
?>
=======

<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT * FROM messages WHERE (sender_id=$_POST[a] AND receiver_id=$_POST[b]) OR (sender_id=$_POST[b] AND receiver_id=$_POST[a]) ORDER BY created_at");
res(true,"Messages",$q->fetch_all(MYSQLI_ASSOC));
?>
>>>>>>> bd88544c526af5a869a70bbb1af3196781a4646c
