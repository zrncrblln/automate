<?php
require_once 'DB_connection.php';

try {
    $stmt = $conn->query("SELECT * FROM admin");
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h2>Admin Users</h2>";
    echo "<ul>";
    foreach ($admins as $admin) {
        echo "<li>" . htmlspecialchars($admin['username']) . " - " . htmlspecialchars($admin['fname']) . " " . htmlspecialchars($admin['lname']) . "</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "Error fetching admin users: " . $e->getMessage();
}
?>
