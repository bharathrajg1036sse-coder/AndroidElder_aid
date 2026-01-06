
<?php
require_once '../common/db.php'; require_once '../common/upload_file.php'; require_once '../common/response.php';
$p=upload($_FILES['image'],'uploads/profile');
$conn->query("UPDATE users SET profile_image='$p' WHERE id=$_POST[user_id]");
res(true,"Uploaded",$p);
?>
