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
      include "data/student.php";
      include "data/grade.php";
      $students = searchStudents($search_key, $conn);
      ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Search Students</title>
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
        if ($students != 0) {
          ?>
          <div class="container mt-5">
            <div class="row mb-3">
              <div class="col-6">
                <div class="d-flex gap-2">
                  <a href="student-add.php" class="btn btn-dark">Add New Student</a>
                  <button id="printBtn" class="btn btn-secondary">Print</button>
                  <button id="resetBtn" class="btn btn-outline-secondary">Reset</button>
                </div>
              </div>
              <div class="col-6">
                <form action="student-search.php" class="n-table" method="post">
                  <div class="input-group">
                    <input type="text" class="form-control" name="searchKey" placeholder="Search...">
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
                    <th scope="col">Grade</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0;
                  foreach ($students as $student) {
                    $i++; ?>
                    <tr>
                      <th scope="row"><?= $i ?></th>
                      <td><?= $student['student_id'] ?></td>
                      <td>
                        <a href="student-view.php?student_id=<?= $student['student_id'] ?>">
                          <?= $student['fname'] ?>
                        </a>
                      </td>
                      <td><?= $student['lname'] ?></td>
                      <td><?= $student['username'] ?></td>
                      <td>
                        <?php
                        $grade = $student['grade'];
                        $g_temp = getGradeById($grade, $conn);
                        if ($g_temp != 0) {
                          echo $g_temp['grade_code'] . '-' .
                            $g_temp['grade'];
                        }
                        ?>
                      </td>
                      <td>
                        <a href="student-edit.php?student_id=<?= $student['student_id'] ?>" class="btn btn-success">Edit</a>
                        <a href="student-delete.php?student_id=<?= $student['student_id'] ?>" class="btn btn-dark">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          <?php } else { ?>
            <div class="alert alert-info .w-450 m-5" role="alert">
              No Results Found
              <a href="student.php" class="btn btn-dark">Go Back</a>
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
            $("#navLinks li:nth-child(3) a").addClass('active');
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
              window.location.href = 'student.php';
            });
          });
        </script>

      </body>

      </html>
      <?php
    } else {
      header("Location: student.php");
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