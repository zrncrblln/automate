<?php
session_start();
if (
  isset($_SESSION['teacher_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Teacher') {
    include "../DB_connection.php";
    include "data/class.php";
    include "data/grade.php";
    include "data/section.php";
    include "data/teacher.php";

    $teacher_id = $_SESSION['teacher_id'];
    $teacher = getTeacherById($teacher_id, $conn);
    $classes = getAllClasses($conn);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Teachers - Students</title>
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
      if ($classes != 0) {
        ?>
        <div class="container mt-5">

          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped mt-3 n-table">
              <thead>
                <tr>
                  <th scope="col">Department ID</th>
                  <th scope="col">Department Code</th>
                  <th scope="col">Department Name</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0;
                foreach ($classes as $class) {
                  ?>


                  <?php
                  $classesx = str_split(trim($teacher['class']));
                  $grade = getGradeById($class['grade'], $conn);
                  $section = getSectioById($class['section'], $conn);
                  $c = $grade['grade_code'] . '-' . $grade['grade'] . $section['section'];
                  foreach ($classesx as $class_id) {
                    if ($class_id == $class['class_id']) {
                      $i++; ?>
                      <tr>
                        <th scope="row"><?= $i ?></th>
                        <td> <a href="students_of_class.php?class_id=<?= $class['class_id'] ?>">
                            <?php echo $c; ?>
                          </a>
                        </td>
                      </tr>

                      <?php
                    }
                  }


                  ?>

                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php } else { ?>
          <div class="alert alert-info .w-450 m-5" role="alert">
            Empty!
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
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-secondary'
              }
            ],
            language: {
              emptyTable: "No data available in table"
            }
          });
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