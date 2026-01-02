<?php
include "../config/db.php";
include "../config/auth.php";
requireRole("admin");

$res=$conn->query("
SELECT u.id,u.name,u.email 
FROM users u 
JOIN helper_profiles h ON u.id=h.user_id 
WHERE h.approval_status='pending'
");

echo json_encode($res->fetch_all(MYSQLI_ASSOC));
