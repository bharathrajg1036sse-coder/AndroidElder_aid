<?php
require_once '../common/db.php';
require_once '../common/response.php';
date_default_timezone_set('UTC');

if (!isset($_POST['user_id'], $_POST['otp'])) {
    res(false, "Missing user_id or otp");
    exit;
}

$user_id = intval($_POST['user_id']);
$otp = trim($_POST['otp']);
$otp = str_replace('"', '', $otp);
$otp = $conn->real_escape_string($otp);

$q = $conn->query("
    SELECT id FROM user_otps
    WHERE user_id = $user_id
      AND otp = '$otp'
      AND is_verified = 0
      AND expires_at >= UTC_TIMESTAMP()
    LIMIT 1
");

if ($q->num_rows === 0) {
    res(false, "Invalid or expired OTP");
    exit;
}

/* mark ONLY this OTP verified */
$conn->query("
    UPDATE user_otps
    SET is_verified = 1
    WHERE user_id = $user_id
      AND otp = '$otp'
");

/* mark user verified */
$conn->query("
    UPDATE users
    SET is_approved = 1
    WHERE id = $user_id
     AND role IN ('elder', 'admin', 'family')
");

res(true, "OTP verified. Registration complete.");
