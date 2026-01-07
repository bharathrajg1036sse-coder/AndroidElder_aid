
<?php
require_once '../common/db.php'; require_once '../common/response.php';
$q=$conn->query("SELECT u.*,h.* FROM users u JOIN helper_profiles h ON u.id=h.helper_id ");
res(true,"OK",$q->fetch_all(MYSQLI_ASSOC));
?>
