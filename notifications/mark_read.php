<<<<<<< HEAD
<?php
include "../config/db.php";
include "../config/auth.php";

$id=$_POST['id'];
$conn->query("UPDATE notifications SET is_read=1 WHERE id=$id");

echo json_encode(["status"=>"Marked read"]);
?>
=======

<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE notifications SET is_read=1 WHERE id=$_POST[id]");
res(true,"Read");
?>
>>>>>>> bd88544c526af5a869a70bbb1af3196781a4646c
