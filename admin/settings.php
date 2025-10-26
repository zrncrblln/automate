<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {
    include "../DB_connection.php";
    include "data/setting.php";
    $setting = getSetting($conn);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin - Setting</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="icon" href="../logo.zxc">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <?php
      include "inc/navbar.php";

      ?>
    </head>

    <body>

      <div class="dashboard-container settings-page">
        <!-- Settings Header -->
        <section class="settings-header">
          <div class="header-content">
            <h1 class="header-title">School Settings</h1>
            <p class="header-subtitle">Configure your school information and academic year details</p>
          </div>
        </section>

        <!-- Settings Form -->
        <section class="settings-section">
          <div class="settings-card">
            <div class="card-header">
              <h5 class="card-title">
                <i class="fas fa-edit me-2"></i>Edit School Settings
              </h5>
            </div>
            <div class="card-body">
              <form method="post" action="req/setting-edit.php">
                <?php if (isset($_GET['error'])) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert"
                    style="border-radius: var(--radius); border: 1px solid #dc3545;">
                    <i class="fas fa-exclamation-triangle me-2"></i><strong>Error:</strong>
                    <?= $_GET['error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert"
                    style="border-radius: var(--radius); border: 1px solid var(--wesleyan-green);">
                    <i class="fas fa-check-circle me-2"></i><strong>Success:</strong> <?= $_GET['success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>
                <?php } ?>

                <div class="settings-grid">
                  <div class="setting-group">
                    <label class="form-label fw-bold" style="color: var(--wesleyan-dark-green);">
                      <i class="fas fa-school me-2"></i>School Name
                    </label>
                    <input type="text" class="form-control form-control-lg" value="<?= $setting['school_name'] ?>"
                      name="school_name" style="border-radius: var(--radius); border: 1px solid var(--neutral-lightgray);"
                      placeholder="Enter school name">
                  </div>
                  <div class="setting-group">
                    <label class="form-label fw-bold" style="color: var(--wesleyan-dark-green);">
                      <i class="fas fa-quote-left me-2"></i>Slogan
                    </label>
                    <input type="text" class="form-control form-control-lg" value="<?= $setting['slogan'] ?>" name="slogan"
                      style="border-radius: var(--radius); border: 1px solid var(--neutral-lightgray);"
                      placeholder="Enter school slogan">
                  </div>
                  <div class="setting-group">
                    <label class="form-label fw-bold" style="color: var(--wesleyan-dark-green);">
                      <i class="fas fa-calendar-alt me-2"></i>Current Year
                    </label>
                    <input type="text" class="form-control form-control-lg" value="<?= $setting['current_year'] ?>"
                      name="current_year" style="border-radius: var(--radius); border: 1px solid var(--neutral-lightgray);"
                      placeholder="e.g., 2024-2025">
                  </div>
                  <div class="setting-group">
                    <label class="form-label fw-bold" style="color: var(--wesleyan-dark-green);">
                      <i class="fas fa-graduation-cap me-2"></i>Current Semester
                    </label>
                    <input type="text" class="form-control form-control-lg" value="<?= $setting['current_semester'] ?>"
                      name="current_semester"
                      style="border-radius: var(--radius); border: 1px solid var(--neutral-lightgray);"
                      placeholder="e.g., First Semester">
                  </div>
                  <div class="setting-group full-width">
                    <label class="form-label fw-bold" style="color: var(--wesleyan-dark-green);">
                      <i class="fas fa-info-circle me-2"></i>About
                    </label>
                    <textarea class="form-control form-control-lg" name="about" rows="4"
                      style="border-radius: var(--radius); border: 1px solid var(--neutral-lightgray);"
                      placeholder="Enter information about the school"><?= $setting['about'] ?></textarea>
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-save me-2"></i>Update Settings
                  </button>
                </div>
              </form>
            </div>
          </div>
        </section>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        $(document).ready(function () {
          $("#navLinks li:nth-child(10) a").addClass('active');
        });
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