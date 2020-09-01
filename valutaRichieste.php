<?php 
session_start();
$_SESSION['option'] = 3;
?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Valuta richieste</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/valutaRichieste.css">
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
			<li><a href="Controller/controllerProfilo.php?val=1">Visualizza profilo</a></li>
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
	</nav> 
    
<!-- Content -->
<div class="content">
<?php 
if($_SESSION['counter'] > 0){

  echo '
  <div class="contentor">
  	<div class="title">Titolo</div>
    <div class="mid-section">
      <div class="output">'. $_SESSION['richieste'][$_SESSION['cont']]['nome'].' '.
      						 $_SESSION['richieste'][$_SESSION['cont']]['cognome'].'</div>
    
    <div class="bottoni">
      <form method="POST" action="Controller/controllerPartecipanti.php">
        <input type="submit" class="button-red" name="result" value="Rifiuta">
      	<input type="submit" class="button-green" name="result" value="Accetta">
      </form>
    </div>
    </div>
  </div>';
  }
  
  if($_SESSION['counter'] == 0){
  	echo '<h1>Nessuna nuova richiesta<h1>';
  }
?>

</div>


<!-- End content -->

  <section class="footer"> <!-- Footer -->
  	<div class="mark">
   	  <h3>Team<span>Up</span></h3>
    </div>
     <div class="copyright">
       &copy; Copyright. All Rights Reserved
     </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
