<?php
  session_start();
  $_SESSION['option'] = 3;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reimposta la tua password</title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/reimpostaPassword.css">
</head>

<body> 

 	<nav> <!-- Navbar -->
      <div class="logo">
      	<a href="home.php"><img src="img/logo.png"></a>
	  </div>
	  <label for="btn" class="icon">
        <span class="fa fa-bars"></span>
      </label>
      <input type="checkbox" id="btn">
      <ul>
		<li><a href="home.php">Home</a></li>
		<li>
          <label for="btn-1" class="show">Progetti +</label>
          <a href="" style="pointer-events: none;">Progetti</a>
          <input type="checkbox" id="btn-1">
          <ul>
			<li><a href="Controller/controllerProgetto.php?val=1">I miei progetti</a></li>
			<li><a href="nuovoProgetto.php">Crea progetto</a></li>
			<li><a href="ricercaProgetti.php">Ricerca progetti</a></li>
		  </ul>
		</li>
        
		<li>
          <label for="btn-2" class="show">Profilo +</label>
          <a href="" style="pointer-events: none;">Profilo</a>
          <input type="checkbox" id="btn-2">
          <ul>
			<li><a href="Controller/controllerProfilo.php?val=1&idT=<?php echo $_SESSION['id']; ?>">Visualizza profilo</a></li>
			<li><a href="Controller/controllerNavbar.php?val=1">Log Out</a></li>
			<li>
              <label for="btn-3" class="show">Impostazioni +</label>
              <a href="" style="pointer-events: none;">Impostazioni <span class="fa fa-plus"></span></a>
              <input type="checkbox" id="btn-3">
              <ul>
				<li><a href="modificaProfilo.php">Modifica profilo</a></li>
				<li><a href="reimpostaPassword.php">Cambia password</a></li>
				<li><a href="Controller/controllerProfilo.php?val=4">Elimina profilo</a></li>
			  </ul>
			</li>
		  </ul>
		</li>
	  </ul>
	</nav> <!-- end Navbar -->

  <ul class="box-area">
  	<li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>

<!-- cript controllo correttezza password live -->
<script>
  var check = function() {
  if (document.getElementById('password1').value == document.getElementById('password2').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'Le password coincidono';
  } else {
        document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Le password non coincidono';
  }
}
</script>

<script>
function Validate() {
  var password = document.getElementById("password1").value;
  var confirmPassword = document.getElementById("password2").value;
  if (password != confirmPassword) {
      alert("Le password non coincidono!");
      return false;
  }
  return true;
}
</script>

<!-- end script -->

<div class="content">
<form method="POST" action="Controller/controllerProfilo.php">
  <div class="pw-box">
    <div class="col">
      <label class="label">Nuova password</label>
      <input id="password1" class="input-pw" name="password1" type="password" onkeyup="check()" minlength="6" title="Minimo 6 caratteri, tra cui 1 lettera, 1 maiuscola e 1 numero." required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
    </div>
    <div class="col">
      <label class="label">Ripeti password</label> 
      <input id="password2" class="input-pw" name="password2" type="password" onkeyup="check()" minlength="6" title="Minimo 6 caratteri, tra cui 1 lettera, 1 maiuscola e 1 numero." required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
    </div>

	<span id="message"></span>
    
    
    <button class="button" type="submit">
  		Conferma
    </button>
  </div>
</form>

  <div class="message"></div>
</div> <!-- end content -->


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

</body>
</html>
