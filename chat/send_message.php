<<<<<<< HEAD
<?php
include "../config/db.php";
include "../config/auth.php";

$receiver=$_POST['receiver_id'];
$msg=$_POST['message'];

$stmt=$conn->prepare("INSERT INTO chat_messages(sender_id,receiver_id,message) VALUES(?,?,?)");
$stmt->bind_param("iis",$_SESSION['user'],$receiver,$msg);
$stmt->execute();

echo json_encode(["status"=>"Message sent"]);
?>
=======

<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO messages(sender_id,receiver_id,message) VALUES($_POST[from],$_POST[to],'$_POST[msg]')");
res(true,"Sent");
?>
>>>>>>> bd88544c526af5a869a70bbb1af3196781a4646c
