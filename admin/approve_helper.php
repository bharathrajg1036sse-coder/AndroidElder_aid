<<<<<<< HEAD
<?php
include "../config/db.php";
include "../config/auth.php";
include "../config/mail.php";
requireRole("admin");

$helper_id=$_POST['helper_id'];

$conn->query("UPDATE helper_profiles SET approval_status='approved' WHERE user_id=$helper_id");

$email=$conn->query("SELECT email FROM users WHERE id=$helper_id")->fetch_assoc()['email'];

sendMail($email,"Helper Approved","Your helper account has been approved.");

$conn->query("INSERT INTO admin_logs(admin_id,action) VALUES({$_SESSION['user']},'Approved helper $helper_id')");

echo json_encode(["status"=>"Helper approved"]);
?>
=======

<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("UPDATE helper_profiles SET approval_status='approved' WHERE helper_id=$_POST[id]");
res(true,"Approved");
?>
>>>>>>> bd88544c526af5a869a70bbb1af3196781a4646c
