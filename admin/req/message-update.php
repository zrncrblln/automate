<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
        if (isset($_POST['message_id']) && isset($_POST['action'])) {
            include "../../DB_connection.php";

            $message_id = $_POST['message_id'];
            $action = $_POST['action'];

            if (empty($message_id) || empty($action)) {
                $em = "Invalid request";
                header("Location: ../message.php?error=$em");
                exit;
            }

            if ($action == 'mark_read') {
                $sql = "UPDATE message SET is_read=1 WHERE message_id=?";
            } elseif ($action == 'mark_unread') {
                $sql = "UPDATE message SET is_read=0 WHERE message_id=?";
            } else {
                $em = "Invalid action";
                header("Location: ../message.php?error=$em");
                exit;
            }

            $stmt = $conn->prepare($sql);
            $stmt->execute([$message_id]);

            if ($stmt->rowCount() >= 0) {
                $sm = "Message updated successfully";
                header("Location: ../message.php?success=$sm");
                exit;
            } else {
                $em = "Failed to update message";
                header("Location: ../message.php?error=$em");
                exit;
            }
        } else {
            header("Location: ../../logout.php");
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}
?>