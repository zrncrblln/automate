<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {
    if (isset($_GET['searchKey'])) {

      $search_key = $_GET['searchKey'];
      include "../DB_connection.php";
      include "data/teacher.php";
      include "data/subject.php";
      include "data/grade.php";
      $teachers = searchTeachers($search_key, $conn);
      ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Serach Teachers</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" href="../logo.zxc">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <!-- DataTables Responsive CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
      </head>

      <body>
        <?php
        include "inc/navbar.php";
        if ($teachers != 0) {
          ?>
          <div class="container mt-5">
            <div class="row mb-3">
              <div class="col-6">
                <div class="d-flex gap-2">
                  <a href="teacher-add.php" class="btn btn-dark">Add New Teacher</a>
                  <button id="printBtn" class="btn btn-secondary">Print</button>
                  <button id="resetBtn" class="btn btn-outline-secondary">Reset</button>
                </div>
              </div>
              <div class="col-6">
                <form action="teacher-search.php" class="n-table" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control" name="searchKey" value="<?= $search_key ?>" placeholder="Search...">
                    <button class="btn btn-primary">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>


            <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-dark mt-3 n-table" role="alert">
                <?= $_GET['error'] ?>
              </div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
              <div class="alert alert-info mt-3 n-table" role="alert">
                <?= $_GET['success'] ?>
              </div>
            <?php } ?>

            <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($teachers as $teacher) {
                    $i++; ?>
                    <tr>
                      <th scope="row"><?= $i ?></th>
                      <td><?= $teacher['teacher_id'] ?></td>
                      <td><a href="teacher-view.php?teacher_id=<?= $teacher['teacher_id'] ?>">
                          <?= $teacher['fname'] ?></a></td>
                      <td><?= $teacher['lname'] ?></td>
                      <td><?= $teacher['username'] ?></td>
                      <td>
                        <?php
                        $s = '';
                        $subjects = str_split(trim($teacher['subjects']));
                        foreach ($subjects as $subject) {
                          $s_temp = getSubjectById($subject, $conn);
                          if ($s_temp != 0)
                            $s .= $s_temp['subject_code'] . ', ';
                        }
                        echo $s;
                        ?>
                      </td>
                      <td>
                        <?php
                        $g = '';
                        $grades = str_split(trim($teacher['grades']));
                        foreach ($grades as $grade) {
                          $g_temp = getGradeById($grade, $conn);
                          if ($g_temp != 0)
                            $g .= $g_temp['grade_code'] . '-' .
                              $g_temp['grade'] . ', ';
                        }
                        echo $g;
                        ?>
                      </td>
                      <td>
                        <a href="teacher-edit.php?teacher_id=<?= $teacher['teacher_id'] ?>" class="btn btn-success">Edit</a>
                        <a href="teacher-delete.php?teacher_id=<?= $teacher['teacher_id'] ?>" class="btn btn-dark">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          <?php } else { ?>
            <div class="alert alert-info .w-450 m-5" role="alert">
              No Results Found
              <a href="teacher.php" class="btn btn-dark">Go Back</a>
            </div>
          <?php } ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <!-- DataTables Responsive JS -->
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
        <!-- DataTables Buttons JS -->
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <script>
          $(document).ready(function () {
            $("#navLinks li:nth-child(2) a").addClass('active');
            $('#dataTable').DataTable({
              responsive: true,
              paging: true,
              lengthMenu: [10, 25, 50],
              searching: false, // Disable built-in search to keep custom form
              ordering: true,
              info: true,
              dom: 'lfrtip',
              buttons: [],
              language: {
                emptyTable: "No data available in table"
              }
            });

            // Custom print functionality
            $('#printBtn').on('click', function () {
              window.print();
            });

            // Custom reset functionality
            $('#resetBtn').on('click', function () {
              window.location.href = 'teacher.php';
            });
          });
        </script>

      </body>

      </html>
      <?php

    } else {
      header("Location: teacher.php");
      exit;
    }

  } else {
    header("Location: ../login.php");
    exit;
  }
} else {
  header("Location: ../login.php");
  exit;
}

?>