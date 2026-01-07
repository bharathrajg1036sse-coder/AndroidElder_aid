<<<<<<< HEAD
<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("elder");

$helper=$_POST['helper_id'];
$rating=$_POST['rating'];
$review=$_POST['review'];

$stmt=$conn->prepare("INSERT INTO reviews(elder_id,helper_id,rating,review) VALUES(?,?,?,?)");
$stmt->bind_param("iiis",$_SESSION['user'],$helper,$rating,$review);
$stmt->execute();

$conn->query("UPDATE helper_profiles SET karma=karma+10 WHERE user_id=$helper");
$conn->query("INSERT INTO karma_points(helper_id,points,reason) VALUES($helper,10,'Task completed review')");

echo json_encode(["status"=>"Review submitted & karma added"]);
=======

<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO reviews(elder_id,helper_id,rating,review) VALUES($_POST[elder],$_POST[helper],$_POST[rating],'$_POST[text]')");
$conn->query("UPDATE helper_profiles SET karma_points=karma_points+($_POST[rating]*10) WHERE helper_id=$_POST[helper]");
res(true,"Reviewed");
?>
>>>>>>> bd88544c526af5a869a70bbb1af3196781a4646c
