
<?php require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT u.name,h.karma_points FROM helper_profiles h JOIN users u ON u.id=h.helper_id ORDER BY karma_points DESC");
res(true,"Leaderboard",$q->fetch_all(MYSQLI_ASSOC));
?>
