<?php
include "DB_connection.php";

$plain_password = 'admin123';
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

$sql = "UPDATE admin SET password = ? WHERE username = 'zoren'";
$stmt = $conn->prepare($sql);
$stmt->execute([$hashed_password]);

echo "Password for user 'zoren' has been reset and hashed successfully.";
?>
