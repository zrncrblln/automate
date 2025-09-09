<?php
$hash = '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6';

$possible_passwords = ['123', 'admin', 'password', 'zoren', 'zoren'];

foreach ($possible_passwords as $pass) {
    if (password_verify($pass, $hash)) {
        echo "Password for admin is: $pass\n";
        break;
    }
}
?>
