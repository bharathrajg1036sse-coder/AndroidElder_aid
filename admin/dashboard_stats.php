
<?php
require_once '../common/db.php'; require_once '../common/response.php';
$a=$conn->query("SELECT COUNT(*) c FROM users where role='elder'")->fetch_assoc();
$b=$conn->query("SELECT COUNT(*) c FROM helper_profiles WHERE approval_status='approved'")->fetch_assoc();
$c=$conn->query("SELECT COUNT(*) c FROM helper_profiles WHERE approval_status='Pending'")->fetch_assoc();
res(true,"Stats",["total_elders"=>$a['c'],"total_helpers"=>$b['c'],"pending_helpers"=>$c['c']]);
?>
