<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin - Home</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
      <?php
      include "inc/navbar.php";
      ?>
      <div class="dashboard-container" style="margin-top: 4rem;">
        <!-- Hero Section with Key Metrics -->
        <section class="dashboard-hero">
          <div class="hero-content">
            <h1 class="hero-title">Admin Dashboard</h1>
            <p class="hero-subtitle">Manage your school system efficiently</p>
          </div>
          <div class="metrics-grid">
            <div class="metric-card">
              <div class="metric-icon">
                <i class="fas fa-users"></i>
              </div>
              <div class="metric-content">
                <h3 class="metric-value">1,250</h3>
                <p class="metric-label">Total Students</p>
              </div>
            </div>
            <div class="metric-card">
              <div class="metric-icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <div class="metric-content">
                <h3 class="metric-value">85</h3>
                <p class="metric-label">Teachers</p>
              </div>
            </div>
            <div class="metric-card">
              <div class="metric-icon">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <div class="metric-content">
                <h3 class="metric-value">12</h3>
                <p class="metric-label">Classes</p>
              </div>
            </div>
            <div class="metric-card">
              <div class="metric-icon">
                <i class="fas fa-book"></i>
              </div>
              <div class="metric-content">
                <h3 class="metric-value">45</h3>
                <p class="metric-label">Subjects</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Quick Actions Section -->
        <section class="quick-actions">
          <h2 class="section-title">Quick Actions</h2>
          <div class="dashboard-grid">
            <a href="teacher.php" class="dashboard-card">
              <i class="fas fa-user-tie"></i>
              <h5>Manage Professors</h5>
            </a>
            <a href="student.php" class="dashboard-card">
              <i class="fas fa-user-graduate"></i>
              <h5>Manage Students</h5>
            </a>
            <a href="class.php" class="dashboard-card">
              <i class="fas fa-building"></i>
              <h5>Departments</h5>
            </a>
            <a href="section.php" class="dashboard-card">
              <i class="fas fa-layer-group"></i>
              <h5>Sections</h5>
            </a>
            <a href="grade.php" class="dashboard-card">
              <i class="fas fa-chart-line"></i>
              <h5>Grades</h5>
            </a>
            <a href="course.php" class="dashboard-card">
              <i class="fas fa-book-open"></i>
              <h5>Subjects</h5>
            </a>
            <a href="registrar-office.php" class="dashboard-card">
              <i class="fas fa-clipboard-list"></i>
              <h5>Registrar Office</h5>
            </a>
            <a href="settings.php" class="dashboard-card">
              <i class="fas fa-cog"></i>
              <h5>Settings</h5>
            </a>
          </div>
        </section>

        <!-- Analytics Placeholder -->
        <section class="analytics-section">
          <h2 class="section-title">Analytics Overview</h2>
          <div class="analytics-grid">
            <div class="analytics-card">
              <h3>Enrollment Trends</h3>
              <div class="chart-placeholder">
                <i class="fas fa-chart-bar"></i>
                <p>Chart will be implemented</p>
              </div>
            </div>
            <div class="analytics-card">
              <h3>Performance Metrics</h3>
              <div class="chart-placeholder">
                <i class="fas fa-chart-pie"></i>
                <p>Chart will be implemented</p>
              </div>
            </div>
          </div>
        </section>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
      <script>
        $(document).ready(function () {
          $("#navLinks li:nth-child(1) a").addClass('active');
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