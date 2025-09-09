<?php
include 'DB_connection.php';

echo "Admin users:\n";
$stmt = $conn->query("SELECT username, fname, lname FROM admin");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Username: " . $row['username'] . " (" . $row['fname'] . " " . $row['lname'] . ")\n";
}

echo "\nTeachers:\n";
$stmt = $conn->query("SELECT username, fname, lname FROM teachers");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Username: " . $row['username'] . " (" . $row['fname'] . " " . $row['lname'] . ")\n";
}

echo "\nStudents:\n";
$stmt = $conn->query("SELECT username, fname, lname FROM students");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Username: " . $row['username'] . " (" . $row['fname'] . " " . $row['lname'] . ")\n";
}

echo "\nRegistrar Office:\n";
$stmt = $conn->query("SELECT username, fname, lname FROM registrar_office");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Username: " . $row['username'] . " (" . $row['fname'] . " " . $row['lname'] . ")\n";
}

echo "\nNote: Default password for all users is '123'\n";
?>
