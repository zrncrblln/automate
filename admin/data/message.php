<?php

// All Messages
function getAllMessages($conn)
{
  $sql = "SELECT * FROM message ORDER BY message_id DESC";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount() >= 1) {
    $messages = $stmt->fetchAll();
    return $messages;
  } else {
    return 0;
  }
}

// Delete Message
function deleteMessage($conn, $message_id)
{
  $sql = "DELETE FROM message WHERE message_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$message_id]);

  if ($stmt->rowCount() > 0) {
    return true;
  } else {
    return false;
  }
}

// Update Message Read Status
function updateMessageReadStatus($conn, $message_id, $is_read)
{
  $sql = "UPDATE message SET is_read=? WHERE message_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$is_read, $message_id]);

  if ($stmt->rowCount() >= 0) {
    return true;
  } else {
    return false;
  }
}