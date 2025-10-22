<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../DB_connection.php";
        include "data/grade.php";
        include "data/section.php";
        $grades = getAllGrades($conn);
        $sections = getAllSections($conn);


        $fname = '';
        $lname = '';
        $uname = '';
        $address = '';
        $email = '';
        $pfn = '';
        $pln = '';
        $ppn = '';


        if (isset($_GET['fname']))
            $fname = $_GET['fname'];
        if (isset($_GET['lname']))
            $lname = $_GET['lname'];
        if (isset($_GET['uname']))
            $uname = $_GET['uname'];
        if (isset($_GET['address']))
            $address = $_GET['address'];
        if (isset($_GET['email']))
            $email = $_GET['email'];
        if (isset($_GET['pfn']))
            $pfn = $_GET['pfn'];
        if (isset($_GET['pln']))
            $pln = $_GET['pln'];
        if (isset($_GET['ppn']))
            $ppn = $_GET['ppn'];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin - Add Student</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../logo.zxc">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body>
            <?php
            include "inc/navbar.php";
            ?>
            <div class="container-fluid" style="padding-top: 600px;">
                <div class="container">
                    <a href="student.php" class="btn btn-dark">Go Back</a>

                    <form method="post" class="shadow p-4 mt-4 mb-4 form-w" action="req/student-add.php" id="studentForm">
                        <h3>Add New Student</h3>
                        <hr>

                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-dark" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= $_GET['success'] ?>
                            </div>
                        <?php } ?>

                        <!-- Personal Information Section -->
                        <div class="mb-4">
                            <h4 class="section-title">Personal Information</h4>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">First name *</label>
                                    <input type="text" class="form-control" value="<?= $fname ?>" name="fname"
                                        placeholder="Enter first name" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Middle name</label>
                                    <input type="text" class="form-control" name="mname"
                                        placeholder="Enter middle name (optional)">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Last name *</label>
                                    <input type="text" class="form-control" value="<?= $lname ?>" name="lname"
                                        placeholder="Enter last name" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address *</label>
                                <input type="text" class="form-control" value="<?= $address ?>" name="address"
                                    placeholder="Enter complete address" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" value="<?= $email ?>" name="email_address"
                                        placeholder="student@example.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" class="form-control" name="phone_number" placeholder="09XX-XXX-XXXX">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date of birth *</label>
                                    <input type="date" class="form-control" name="date_of_birth" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Place of birth</label>
                                    <input type="text" class="form-control" name="place_of_birth" placeholder="City, Province">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Gender *</label><br>
                                    <input type="radio" value="Male" checked name="gender" required> Male
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" value="Female" name="gender"> Female
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Nationality</label>
                                    <input type="text" class="form-control" name="nationality" placeholder="Filipino"
                                        value="Filipino">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Religion</label>
                                    <input type="text" class="form-control" name="religion" placeholder="Religion">
                                </div>
                            </div>
                        </div>

                        <!-- Account Details Section -->
                        <div class="mb-4">
                            <h4 class="section-title">Account Details</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Username *</label>
                                    <input type="text" class="form-control" value="<?= $uname ?>" name="username"
                                        placeholder="Enter username" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="pass" id="passInput"
                                            placeholder="Enter password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password *</label>
                                <input type="password" class="form-control" name="confirm_pass" placeholder="Confirm password"
                                    required>
                            </div>
                        </div>

                        <!-- Parent Information Section -->
                        <div class="mb-4">
                            <h4 class="section-title">Parent Information</h4>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Parent first name *</label>
                                    <input type="text" class="form-control" value="<?= $pfn ?>" name="parent_fname"
                                        placeholder="Enter parent first name" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Parent middle name</label>
                                    <input type="text" class="form-control" name="parent_mname"
                                        placeholder="Enter parent middle name (optional)">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Parent last name *</label>
                                    <input type="text" class="form-control" value="<?= $pln ?>" name="parent_lname"
                                        placeholder="Enter parent last name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Parent phone number *</label>
                                    <input type="text" class="form-control" value="<?= $ppn ?>" name="parent_phone_number"
                                        placeholder="09XX-XXX-XXXX" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Parent email address</label>
                                    <input type="email" class="form-control" name="parent_email_address"
                                        placeholder="parent@example.com">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Parent occupation</label>
                                    <input type="text" class="form-control" name="parent_occupation"
                                        placeholder="Teacher, Engineer, etc.">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Parent address</label>
                                    <input type="text" class="form-control" name="parent_address"
                                        placeholder="Parent's complete address">
                                </div>
                            </div>
                        </div>

                        <!-- Enrollment Section -->
                        <div class="mb-4">
                            <h4 class="section-title">Enrollment Information</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Grade *</label>
                                    <div class="row row-cols-3">
                                        <?php foreach ($grades as $grade): ?>
                                            <div class="col">
                                                <input type="radio" name="grade" value="<?= $grade['grade_id'] ?>" required>
                                                <?= $grade['grade_code'] ?>-<?= $grade['grade'] ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Section *</label>
                                    <div class="row row-cols-3">
                                        <?php foreach ($sections as $section): ?>
                                            <div class="col">
                                                <input type="radio" name="section" value="<?= $section['section_id'] ?>" required>
                                                <?= $section['section'] ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success btn-lg">Register Student</button>
                        </div>
                    </form>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                $(document).ready(function () {
                    $("#navLinks li:nth-child(3) a").addClass('active');
                });

                // Password generation function
                function makePass(length) {
                    var result = '';
                    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                    var charactersLength = characters.length;
                    for (var i = 0; i < length; i++) {
                        result += characters.charAt(Math.floor(Math.random() * charactersLength));
                    }
                    var passInput = document.getElementById('passInput');
                    passInput.value = result;
                }

                var gBtn = document.getElementById('gBtn');
                gBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    makePass(4);
                });

                // Password confirmation validation
                document.getElementById('studentForm').addEventListener('submit', function (e) {
                    // Check password confirmation
                    const password = document.querySelector('input[name="pass"]').value;
                    const confirmPassword = document.querySelector('input[name="confirm_pass"]').value;

                    if (password !== confirmPassword) {
                        e.preventDefault();
                        alert('Passwords do not match. Please check your password confirmation.');
                        document.querySelector('input[name="confirm_pass"]').focus();
                        return false;
                    }

                    // Validate all required fields
                    const requiredFields = document.querySelectorAll(
                        'input[required], select[required], textarea[required]');
                    let isValid = true;

                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            field.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });

                    // Validate radio buttons
                    const radioGroups = document.querySelectorAll('input[type="radio"][required]');
                    const radioNames = [...new Set(Array.from(radioGroups).map(radio => radio.name))];

                    radioNames.forEach(name => {
                        const radios = document.querySelectorAll(`input[name="${name}"]`);
                        const isChecked = Array.from(radios).some(radio => radio.checked);
                        if (!isChecked) {
                            radios.forEach(radio => radio.classList.add('is-invalid'));
                            isValid = false;
                        } else {
                            radios.forEach(radio => radio.classList.remove('is-invalid'));
                        }
                    });

                    if (!isValid) {
                        e.preventDefault();
                        alert('Please fill in all required fields before submitting.');
                        return false;
                    }
                });

                // Real-time password confirmation validation
                document.querySelector('input[name="confirm_pass"]').addEventListener('input', function () {
                    const password = document.querySelector('input[name="pass"]').value;
                    const confirmPassword = this.value;

                    if (confirmPassword && password !== confirmPassword) {
                        this.classList.add('is-invalid');
                        this.classList.remove('is-valid');
                    } else if (confirmPassword && password === confirmPassword) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-invalid', 'is-valid');
                    }
                });

                // Clear validation on password change
                document.querySelector('input[name="pass"]').addEventListener('input', function () {
                    const confirmField = document.querySelector('input[name="confirm_pass"]');
                    confirmField.classList.remove('is-invalid', 'is-valid');
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