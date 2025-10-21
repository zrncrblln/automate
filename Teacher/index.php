<?php
session_start();
if (
  isset($_SESSION['teacher_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Teacher') {
    include "../DB_connection.php";
    include "data/teacher.php";
    include "data/subject.php";
    include "data/grade.php";
    include "data/section.php";
    include "data/class.php";


    $teacher_id = $_SESSION['teacher_id'];
    $teacher = getTeacherById($teacher_id, $conn);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Teacher - Home</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">
      <link rel="icon" href="../logo.zxc">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
      <?php
      include "inc/navbar.php";

      if ($teacher != 0) {
        ?>
        <div class="dashboard-container">
          <!-- Welcome Section -->
          <section class="teacher-welcome">
            <div class="welcome-content">
              <h1 class="welcome-title">Welcome back, <?= $teacher['fname'] ?>!</h1>
              <p class="welcome-subtitle">Manage your classes and track student progress</p>
            </div>
            <div class="teacher-profile-card">
              <div class="profile-header">
                <img src="../img/teacher-<?= $teacher['gender'] ?>.png" alt="Profile" class="profile-avatar">
                <div class="profile-info">
                  <h3><?= $teacher['fname'] ?>       <?= $teacher['lname'] ?></h3>
                  <p>@<?= $teacher['username'] ?></p>
                  <span class="employee-id">ID: <?= $teacher['employee_number'] ?></span>
                </div>
              </div>
              <div class="profile-details">
                <div class="detail-item">
                  <i class="fas fa-graduation-cap"></i>
                  <span><?= $teacher['qualification'] ?></span>
                </div>
                <div class="detail-item">
                  <i class="fas fa-envelope"></i>
                  <span><?= $teacher['email_address'] ?></span>
                </div>
                <div class="detail-item">
                  <i class="fas fa-phone"></i>
                  <span><?= $teacher['phone_number'] ?></span>
                </div>
              </div>
            </div>
          </section>

          <!-- My Classes Section -->
          <section class="my-classes">
            <h2 class="section-title">My Classes</h2>
            <div class="classes-grid">
              <?php
              $classes = str_split(trim($teacher['class']));
              foreach ($classes as $class_id) {
                $class = getClassById($class_id, $conn);
                if ($class != 0) {
                  $grade = getGradeById($class['grade'], $conn);
                  $section = getSectioById($class['section'], $conn);
                  ?>
                  <div class="class-card">
                    <div class="class-header">
                      <h4><?= $grade['grade_code'] ?>-<?= $grade['grade'] ?></h4>
                      <span class="section-badge"><?= $section['section'] ?></span>
                    </div>
                    <div class="class-actions">
                      <a href="classes.php?class_id=<?= $class_id ?>" class="btn btn-primary">
                        <i class="fas fa-users"></i> View Students
                      </a>
                      <a href="student-grade.php?class_id=<?= $class_id ?>" class="btn btn-success">
                        <i class="fas fa-chart-line"></i> Grade Book
                      </a>
                    </div>
                  </div>
                  <?php
                }
              }
              ?>
            </div>
          </section>

          <!-- Quick Actions -->
          <section class="quick-actions">
            <h2 class="section-title">Quick Actions</h2>
            <div class="dashboard-grid">
              <a href="students.php" class="dashboard-card">
                <i class="fas fa-search"></i>
                <h5>Student Directory</h5>
              </a>
              <a href="classes.php" class="dashboard-card">
                <i class="fas fa-book-open"></i>
                <h5>All Classes</h5>
              </a>
              <a href="pass.php" class="dashboard-card">
                <i class="fas fa-key"></i>
                <h5>Change Password</h5>
              </a>
            </div>
          </section>

          <!-- Recent Activity -->
          <section class="recent-activity">
            <h2 class="section-title">Recent Activity</h2>
            <div class="activity-card">
              <div class="activity-placeholder">
                <i class="fas fa-clock"></i>
                <h4>No Recent Activity</h4>
                <p>Your recent grading and student interactions will appear here.</p>
              </div>
            </div>
          </section>
        </div>
      <?php
      } else {
        header("Location: logout.php?error=An error occurred");
        exit;
      }
      ?>

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