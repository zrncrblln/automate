<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Sd</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/logozxc.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="body-login" data-theme="light">
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="row shadow-lg rounded overflow-hidden w-100 w-md-75 mx-auto">
            <div class="col-12 col-md-6 d-block login-left position-relative p-0">
                <div class="position-relative text-white text-center p-3 p-md-5 h-100 d-flex flex-column justify-content-center"
                    style="z-index: 2; background: linear-gradient(135deg, var(--primary-blue), var(--accent-teal));">
                    <h1 class="mb-3" style="font-size: 1.5rem; font-size: clamp(1.5rem, 5vw, 2.5rem);">Welcome Back!
                    </h1>
                    <p class="lead mb-4 d-none d-md-block">Please login to your account to continue.</p>
                    <div class="animated fadeIn">
                        <ul class="list-unstyled d-none d-md-block">
                            <li><i class="fas fa-check-circle me-2"></i> Comprehensive student management</li>
                            <li><i class="fas fa-check-circle me-2"></i> Real-time grade tracking</li>
                            <li><i class="fas fa-check-circle me-2"></i> Secure and intuitive interface</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 p-3 p-md-5 d-flex flex-column justify-content-center position-relative">
                <form method="post" action="req/login.php" class="login-form">
                    <h3 class="login-title">Welcome Back</h3>
                    <p class="login-subtitle">Sign in to your account</p>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($_GET['error']) ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="uname" class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="text" class="form-input" id="uname" name="uname" placeholder="Enter your email"
                                autocomplete="off" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" class="form-input" id="pass" name="pass"
                                placeholder="Enter your password" required />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Sign In</button>
                    <div class="text-center mt-3">
                        <a href="index.php" class="text-decoration-none text-white home-link">Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>