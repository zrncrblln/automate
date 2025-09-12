<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Login - Sd</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="icon" href="lg.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="body-login" data-theme="light">
	<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
		<div class="row shadow-lg rounded overflow-hidden w-100 w-md-75 mx-auto">
			<div class="col-12 col-md-6 d-block login-left position-relative p-0">
				<img src="img/login-bg.jpg" alt="Background"
					class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover"
					style="filter: blur(6px); z-index: 1;" />
				<div class="position-relative text-white text-center p-3 p-md-5 h-100 d-flex flex-column justify-content-center"
					style="z-index: 2; backdrop-filter: brightness(0.6);">
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
				<img src="img/login-bg.jpg" alt="Background"
					class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover"
					style="filter: blur(6px); z-index: 1;" />
				<form method="post" action="req/login.php" class="login" style="background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.25) 100%);
					backdrop-filter: blur(10px);
					-webkit-backdrop-filter: blur(10px);
					border-radius: 15px;
					padding: 2rem;
					position: relative;
					z-index: 2;">
					<p class="text-center text-white mb-4">Login with Email</p>
					<?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-danger" role="alert">
							<?= htmlspecialchars($_GET['error']) ?>
						</div>
					<?php } ?>
					<div class="mb-3 input-group">
						<span class="input-group-text"><i class="fa fa-envelope"></i></span>
						<input type="text" class="form-control" id="uname" name="uname" placeholder="Email id"
							autocomplete="off" />
					</div>
					<div class="mb-3 input-group">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>
						<input type="password" class="form-control" id="pass" name="pass" placeholder="Password" />
					</div>
					<div class="mb-3">
						<a href="#" class="text-white small">Forgot your password?</a>
					</div>
					<button type="submit" class="btn btn-primary w-100 mb-3">LOGIN</button>
					<div class="text-center mb-3">
						<span>OR</span>
					</div>
					<div class="d-flex justify-content-center gap-3 mb-3">
						<button type="button" class="btn btn-light social-btn"><i class="fab fa-google"></i></button>
						<button type="button" class="btn btn-light social-btn"><i
								class="fab fa-facebook-f"></i></button>
						<button type="button" class="btn btn-light social-btn"><i class="fab fa-apple"></i></button>
					</div>
					<div class="text-center">
						<a href="#" class="text-decoration-none text-white">Don't have account? Register Now</a>
					</div>
					<div class="text-center mt-3">
						<a href="index.php" class="text-decoration-none text-white home-link">Home</a>
					</div>
				</form>
				<div class="text-center text-muted mt-4">
					Software Design Final Project 2023
				</div>
			</div>
		</div>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>