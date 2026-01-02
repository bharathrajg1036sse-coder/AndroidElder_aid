<?php
include "../config/db.php";

$res=$conn->query("
SELECT u.name,h.karma 
FROM helper_profiles h 
JOIN users u ON u.id=h.user_id
ORDER BY h.karma DESC");

echo json_encode($res->fetch_all(MYSQLI_ASSOC));
?>