<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login</title>
   
	<!--Bootsrap CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>


<body>

<!-- titolo -->
<div class="hide">
	<h2>“Qualsiasi cosa tu possa fare o sogni di poter fare, cominciala. L’audacia possiede genialità, magia e forza”</h2>
    <h3>Goethe</h3>
</div>
<!-- end titolo -->

<!-- contenuto -->
<div class="container">
    <div class="card">
      <div class="card-header">
        <h3>Accedi</h3>
        <img src="img/logo.png" alt="">
      </div>
      <div class="card-body">
        <form method="post" action="Controller/controllerLogin.php">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><em class="fas fa-user"></em></span>
            </div>
            <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
          </div>
          
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><em class="fas fa-key"></em></span>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
          </div>
          <div class="form-group">
            <input type="submit" value="Login" class="btn float-right login_btn">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Non hai un account?<a href="registrazione.php">Registrati</a>
        </div>
        <div class="d-flex justify-content-center">
          <a href="recuperaPassword.php">Password dimenticata?</a>
        </div>
      </div>
    </div>
</div>
<!-- end contenuto -->


<!-- footer -->
<section class="footer">
  <div class="mark">
    <h3>Team<span>Up</span></h3>
  </div>
  <div class="copyright">
    &copy; Copyright. All Rights Reserved
  </div>
</section>
<!-- end footer -->

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>