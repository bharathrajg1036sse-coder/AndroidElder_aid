
<?php
require_once '../common/db.php'; 
require_once '../common/response.php';
$q=$conn->query("SELECT * FROM users WHERE email='$_POST[email]' AND role='$_POST[role]' AND is_approved=1");
if($q->num_rows==0) res(false,"Invalid");
$u=$q->fetch_assoc();
if(!password_verify($_POST['password'],$u['password'])) res(false,"Invalid");
res(true,"Success",$u);
?>
