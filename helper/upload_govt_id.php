
<?php require_once '../common/db.php'; require_once '../common/upload_file.php'; require_once '../common/response.php';
$p=upload($_FILES['id'],'uploads/govt');
$conn->query("UPDATE helper_profiles SET govt_id_image='$p' WHERE helper_id=$_POST[id]");
res(true,"Uploaded");
?>
