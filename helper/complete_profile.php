
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO helper_profiles(helper_id,description,services) VALUES($_POST[id],'$_POST[desc]','$_POST[services]')");
res(true,"Profile saved");
?>
