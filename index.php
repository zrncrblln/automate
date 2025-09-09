<?php 
include "DB_connection.php";
include "data/setting.php";
$setting = getSetting($conn);

if ($setting != 0) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to <?=$setting['school_name']?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="lg.png">
</head>
<body class="body-home" data-theme="light">
    <div class="black-fill"><br /> <br />
    	<div class="container">
    	<nav class="navbar navbar-expand-lg"
    	     id="homeNav">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">
		    	<img src="lg.png" width="40" alt="Logo">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>
		      </ul>
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		      	<li class="nav-item">
		          <a class="nav-link" href="login.php">Login</a>
		        </li>
		        <li class="nav-item">
		          <button class="btn btn-link theme-toggle" id="themeToggle" aria-label="Toggle theme">
		            <i class="fas fa-moon"></i>
		          </button>
		        </li>
		      </ul>
		  </div>
		    </div>
		</nav>
        <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
        	<img src="lg.png" alt="Logo" >
        	<h4>Welcome to <?=$setting['school_name']?></h4>
        	<p><?=$setting['slogan']?></p>
        </section>

        <section id="about" class="d-flex justify-content-center align-items-center">
        	<div class="card-1">
        		<h5>About Us</h5>
        		<p><?=$setting['about']?></p>
        	</div>
        </section>

    	</div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
<?php } else {
	header("Location: login.php");
	exit;
}  ?>
