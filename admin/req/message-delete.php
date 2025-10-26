<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
        if (isset($_POST['message_id'])) {
            include "../../DB_connection.php";

            $message_id = $_POST['message_id'];

            if (empty($message_id)) {
                $em = "Message ID is required";
                header("Location: ../message.php?error=$em");
                exit;
            }

            $sql = "DELETE FROM message WHERE message_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$message_id]);

            if ($stmt->rowCount() > 0) {
                $sm = "Message deleted successfully";
                header("Location: ../message.php?success=$sm");
                exit;
            } else {
                $em = "Failed to delete message";
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