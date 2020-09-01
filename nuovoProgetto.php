<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Crea un progetto</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/nuovoProgetto.css">
  
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

<div class="container register">
  <div class="row">
  
    <div class="col-lg-3 register-left">
      <img src="img/logo.png" alt=""/>
      <h3>Nuovo Progetto</h3>
      <p>Inizia a ricercare i componenti per il tuo team!</p>
    </div>
    
    <div class="col-lg-9 register-right">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <h3 class="register-heading">Creazione di un Progetto</h3>
          <form method="post" action="Controller/controllerProgetto.php?val=2">
            <!-- Inizio form -->
            <div class="row register-form">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" name="nomeProgetto" class="form-control" placeholder="Nome progetto*" value="" required>
                </div>
                <div class="form-group">
                  <input type="number" min="1" max="99" name="numPartecipanti" class="form-control" placeholder="Numero partecipanti richiesti*" value="" required>
                </div>
                <div class="form-group">
                  <input type="text"  min="1" name="compenso" class="form-control" placeholder="Compenso (opzionale)" value="">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <input type="date" name="dataCreazione" class="form-control" placeholder="Data d'inizio*" value="" required>
                </div>
                <div class="form-group">
                  <input type="number" min="1" max="999" name="durata" class="form-control" placeholder="Durata stimata (in giorni)*" value="" required>
                </div>
                <div class="form-group">
                  <select class="form-control" name="categoria" required>
                    <option selected="true" disabled="disabled" value="">Seleziona una categoria*</option>
                    <option>Hobby</option>
                    <option>Sport</option>
                    <option>Viaggi</option>
                    <option>Eventi</option>
                    <option>Cucina</option>
                    <option>Informatica</option>
                    <option>Elettronica</option>
                    <option>Scienze</option>
                    <option>Altro</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <textarea name="descrizione" style="height:150px; resize: none;" maxlength="300" class="form-control" placeholder="Descrizione (max 300 caratteri)" value=""></textarea>
                </div>
              </div>
              <input type="submit" class="btnRegister" value="Conferma">
            </div>
          </form>
          <!-- fine form -->
        </div>
      </div>
    </div>
  </div>
</div>


  <section class="footer"> <!-- Footer -->
  	<div class="mark">
   	  <h3>Team<span>Up</span></h3>
    </div>
     <div class="copyright">
       &copy; Copyright. All Rights Reserved
     </div>
  </section> <!-- end Footer -->

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
     
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
