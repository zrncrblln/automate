<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Sd</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="lg.png">
</head>
<body class="body-login" data-theme="light">
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-75 shadow-lg rounded overflow-hidden">
            <div class="col-md-6 d-none d-md-block bg-image"></div>
            <div class="col-md-6 bg-white p-5 d-flex flex-column justify-content-center position-relative">
                <form method="post" action="req/login.php" class="login">
                    <div class="text-center mb-4 position-relative">
                        <img src="lg.png" width="100" alt="Logo" />
                        <button type="button" class="theme-toggle position-absolute top-0 end-0" id="themeToggle" aria-label="Toggle theme"><i class="fas fa-moon"></i></button>
                    </div>
                    <h3 class="mb-4 text-center">LOGIN</h3>
                    <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?=htmlspecialchars($_GET['error'])?>
                    </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="uname" class="form-label">User</label>
                        <input type="text" class="form-control" id="uname" name="uname" autocomplete="off" />
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" />
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Usertype</label>
                        <select class="form-control" id="role" name="role">
                            <option value="1">Admin</option>
                            <option value="2">Teacher</option>
                            <option value="3">Student</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enter</button>
                    <a href="index.php" class="d-block text-center mt-3 text-decoration-none">Home</a>
                </form>
                <div class="text-center text-muted mt-4">
                    Software Design Final Project 2023
                </div>
            </div>
        </div>
    </div>
     <script src="js/bootstrap.bundle.min.js"></script>
 <script>
      const themeToggle = document.getElementById('themeToggle');
      const body = document.body;

      themeToggle.addEventListener('click', () => {
        if (body.getAttribute('data-theme') === 'light') {
          body.setAttribute('data-theme', 'dark');
          themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        } else {
          body.setAttribute('data-theme', 'light');
          themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        }
      });
    </script>
 </body>
 </html>
