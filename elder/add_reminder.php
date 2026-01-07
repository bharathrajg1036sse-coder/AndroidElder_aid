
<?php require_once '../common/db.php'; require_once '../common/response.php';
$conn->query("INSERT INTO reminders(elder_id,title,reminder_time,repeat_type) VALUES($_POST[elder_id],'$_POST[title]','$_POST[time]','$_POST[repeat]')");
res(true,"Added");
?>
