<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {
    include "../DB_connection.php";
    include "data/message.php";
    $messages = getAllMessages($conn);

    // Handle success/error messages
    $success = "";
    $error = "";
    if (isset($_GET['success'])) {
      $success = $_GET['success'];
    }
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin - Messages</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="icon" href="../logozxc.png">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
        .messages-container {
          display: flex;
          flex-direction: column;
          gap: 1rem;
        }

        .message-card {
          background: var(--card-bg);
          border: 1px solid var(--neutral-lightgray);
          border-radius: var(--radius-lg);
          padding: 1.5rem;
          transition: var(--transition);
          box-shadow: var(--shadow-sm);
        }

        .message-card:hover {
          transform: translateY(-2px);
          box-shadow: var(--shadow);
          border-color: var(--wesleyan-green);
        }

        .message-card-unread {
          border-left: 4px solid var(--wesleyan-green);
          background: linear-gradient(135deg, rgba(0, 102, 51, 0.05), rgba(255, 215, 0, 0.02));
        }

        .message-card-read {
          opacity: 0.8;
        }

        .message-header {
          margin-bottom: 1rem;
        }

        .message-sender h6 {
          margin-bottom: 0.25rem;
        }

        .message-content p {
          color: var(--text-color);
          line-height: 1.6;
          margin-bottom: 1rem;
        }

        .message-actions {
          border-top: 1px solid var(--neutral-lightgray);
          padding-top: 1rem;
        }

        .search-container {
          background: var(--card-bg);
          padding: var(--space-lg);
          border-radius: var(--radius-lg);
          box-shadow: var(--shadow);
          margin-bottom: var(--space-lg);
        }

        .search-input {
          border: 1px solid var(--neutral-lightgray);
          border-radius: var(--radius);
          padding: var(--space-sm) var(--space-lg);
          font-size: 0.875rem;
          width: 100%;
          transition: var(--transition);
        }

        .search-input:focus {
          border-color: var(--wesleyan-green);
          outline: none;
          box-shadow: 0 0 0 3px rgba(0, 102, 51, 0.1);
        }

        .empty-state {
          text-align: center;
          padding: var(--space-2xl);
          color: var(--neutral-darkgray);
        }

        .empty-state i {
          font-size: 4rem;
          margin-bottom: var(--space-lg);
          opacity: 0.5;
        }

        .badge {
          font-size: 0.75rem;
          padding: 0.375rem 0.75rem;
        }

        @media (max-width: 768px) {
          .container {
            width: 95% !important;
            max-width: none !important;
          }

          .message-card {
            padding: 1rem;
          }

          .d-flex.justify-content-between.align-items-center.mb-4 {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
          }

          .d-flex.gap-2 {
            justify-content: center;
          }

          .message-actions .d-flex {
            flex-direction: column;
            gap: 0.5rem;
          }

          .message-actions .btn {
            width: 100%;
          }
        }
      </style>
    </head>

    <body>
      <?php
      include "inc/navbar.php";
      ?>
      <div class="container mt-5" style="width: 90%; max-width: 900px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="text-center mb-0" style="color: var(--wesleyan-dark-green); font-weight: 600;">
            <i class="fas fa-inbox me-2"></i>Inbox
          </h4>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-primary btn-sm" id="markAllRead">
              <i class="fas fa-check-double"></i> Mark All Read
            </button>
            <button class="btn btn-outline-danger btn-sm" id="deleteAllRead">
              <i class="fas fa-trash"></i> Delete Read
            </button>
          </div>
        </div>

        <!-- Success/Error Messages -->
        <?php if ($success != "") { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?php echo $success; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php } ?>
        <?php if ($error != "") { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> <?php echo $error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php } ?>

        <!-- Search Bar -->
        <div class="search-container">
          <div class="input-group">
            <input type="text" id="searchInput" class="search-input"
              placeholder="Search messages by sender name or content...">
            </span>
          </div>
        </div>

        <?php if ($messages != 0) { ?>
          <div id="messagesContainer" class="messages-container">
            <?php foreach ($messages as $message) {
              $isRead = isset($message['is_read']) && $message['is_read'] == 1;
              $statusBadge = $isRead ? 'badge bg-secondary' : 'badge bg-success';
              $statusText = $isRead ? 'Read' : 'New';
              $cardClass = $isRead ? 'message-card-read' : 'message-card-unread';
              ?>
              <div class="message-card <?php echo $cardClass; ?>" data-message-id="<?php echo $message['message_id']; ?>">
                <div class="message-header">
                  <div class="d-flex justify-content-between align-items-start">
                    <div class="message-sender">
                      <h6 class="mb-1" style="color: var(--wesleyan-dark-green); font-weight: 600;">
                        <i class="fas fa-user me-2"></i><?php echo htmlspecialchars($message['sender_full_name']); ?>
                      </h6>
                      <small class="text-muted">
                        <i class="fas fa-envelope me-1"></i><?php echo htmlspecialchars($message['sender_email']); ?>
                      </small>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <span class="<?php echo $statusBadge; ?>"><?php echo $statusText; ?></span>
                      <small class="text-muted">
                        <i class="fas fa-clock me-1"></i><?php echo date('M d, Y H:i', strtotime($message['date_time'])); ?>
                      </small>
                    </div>
                  </div>
                </div>
                <div class="message-content">
                  <p class="mb-3"><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
                </div>
                <div class="message-actions">
                  <div class="d-flex gap-2 justify-content-end">
                    <?php if (!$isRead) { ?>
                      <button class="btn btn-success btn-sm mark-read-btn"
                        data-message-id="<?php echo $message['message_id']; ?>">
                        <i class="fas fa-check"></i> Mark Read
                      </button>
                    <?php } else { ?>
                      <button class="btn btn-outline-secondary btn-sm mark-unread-btn"
                        data-message-id="<?php echo $message['message_id']; ?>">
                        <i class="fas fa-undo"></i> Mark Unread
                      </button>
                    <?php } ?>
                    <button class="btn btn-danger btn-sm delete-btn" data-message-id="<?php echo $message['message_id']; ?>">
                      <i class="fas fa-trash"></i> Delete
                    </button>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        <?php } else { ?>
          <div class="text-center py-5">
            <div class="empty-state">
              <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
              <h5 class="text-muted">No messages yet</h5>
              <p class="text-muted">Your inbox is empty. New messages will appear here.</p>
            </div>
          </div>
        <?php } ?>
      </div>

      <!-- Success/Error Messages -->
      <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert">
          <div class="d-flex">
            <div class="toast-body" id="successMessage"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
        <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert">
          <div class="d-flex">
            <div class="toast-body" id="errorMessage"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        $(document).ready(function () {
          $("#navLinks li:nth-child(9) a").addClass('active');

          // Search functionality
          $('#searchInput').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('.message-card').each(function () {
              var senderName = $(this).find('h6').text().toLowerCase();
              var messageContent = $(this).find('.message-content p').text().toLowerCase();
              if (senderName.includes(searchTerm) || messageContent.includes(searchTerm)) {
                $(this).show();
              } else {
                $(this).hide();
              }
            });
          });

          // Mark as Read
          $('.mark-read-btn').click(function () {
            const messageId = $(this).data('message-id');
            const card = $(this).closest('.message-card');

            $.post('req/message-update.php', {
              message_id: messageId,
              action: 'mark_read'
            })
              .done(function (response) {
                card.removeClass('message-card-unread').addClass('message-card-read');
                card.find('.badge').removeClass('bg-success').addClass('bg-secondary').text(
                  'Read');
                card.find('.message-actions').html(`
                <div class="d-flex gap-2 justify-content-end">
                  <button class="btn btn-outline-secondary btn-sm mark-unread-btn" data-message-id="${messageId}">
                    <i class="fas fa-undo"></i> Mark Unread
                  </button>
                  <button class="btn btn-danger btn-sm delete-btn" data-message-id="${messageId}">
                    <i class="fas fa-trash"></i> Delete
                  </button>
                </div>
              `);
                showToast('Message marked as read', 'success');
              })
              .fail(function () {
                showToast('Failed to update message', 'error');
              });
          });

          // Mark as Unread
          $(document).on('click', '.mark-unread-btn', function () {
            const messageId = $(this).data('message-id');
            const card = $(this).closest('.message-card');

            $.post('req/message-update.php', {
              message_id: messageId,
              action: 'mark_unread'
            })
              .done(function (response) {
                card.removeClass('message-card-read').addClass('message-card-unread');
                card.find('.badge').removeClass('bg-secondary').addClass('bg-success').text(
                  'New');
                card.find('.message-actions').html(`
                <div class="d-flex gap-2 justify-content-end">
                  <button class="btn btn-success btn-sm mark-read-btn" data-message-id="${messageId}">
                    <i class="fas fa-check"></i> Mark Read
                  </button>
                  <button class="btn btn-danger btn-sm delete-btn" data-message-id="${messageId}">
                    <i class="fas fa-trash"></i> Delete
                  </button>
                </div>
              `);
                showToast('Message marked as unread', 'success');
              })
              .fail(function () {
                showToast('Failed to update message', 'error');
              });
          });

          // Delete Message
          $(document).on('click', '.delete-btn', function () {
            if (!confirm('Are you sure you want to delete this message?')) return;

            const messageId = $(this).data('message-id');
            const card = $(this).closest('.message-card');

            $.post('req/message-delete.php', {
              message_id: messageId
            })
              .done(function (response) {
                card.fadeOut(300, function () {
                  $(this).remove();
                  if ($('.message-card').length === 0) {
                    location.reload(); // Reload to show empty state
                  }
                });
                showToast('Message deleted successfully', 'success');
              })
              .fail(function () {
                showToast('Failed to delete message', 'error');
              });
          });

          // Mark All Read
          $('#markAllRead').click(function () {
            if (!confirm('Mark all unread messages as read?')) return;

            $('.message-card-unread .mark-read-btn').each(function () {
              $(this).trigger('click');
            });
          });

          // Delete All Read
          $('#deleteAllRead').click(function () {
            if (!confirm('Delete all read messages?')) return;

            $('.message-card-read .delete-btn').each(function () {
              $(this).trigger('click');
            });
          });
        });

        function showToast(message, type) {
          const toastId = type === 'success' ? '#successToast' : '#errorToast';
          const messageId = type === 'success' ? '#successMessage' : '#errorMessage';

          $(messageId).text(message);
          const toast = new bootstrap.Toast($(toastId));
          toast.show();
        }
      </script>

    </body>

    </html>
    <?php

  } else {
    header("Location: ../login.php");
    exit;
  }
} else {
  header("Location: ../login.php");
  exit;
}

?>