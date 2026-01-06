
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO reviews(elder_id,helper_id,rating,review) VALUES($_POST[elder],$_POST[helper],$_POST[rating],'$_POST[text]')");
$conn->query("UPDATE helper_profiles SET karma_points=karma_points+($_POST[rating]*10) WHERE helper_id=$_POST[helper]");
res(true,"Reviewed");
?>
