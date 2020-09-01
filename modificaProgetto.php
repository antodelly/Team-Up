<?php
session_start();
$_SESSION['option'] = 10;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Modifica il tuo progetto</title>
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/modificaProgetto.css">
  
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
			<li><a href="#">Ricerca progetti</a></li>
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
      <img src="img/gear.png" alt=""/>
      
      <?php if($_SESSION['infoProg']['stato'] == 'Impostazione'){
      			echo '<div class="btn-red">
    					<a href="Controller/controllerProgetto.php?val=11">
    		  			  <button>Cancella il progetto</button>
						</a>
                      </div>';
      }?>
    </div>
    
    <div class="col-lg-9 register-right">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <h3 class="register-heading">Modifica il tuo progetto</h3>
          <form method="post" action="Controller/controllerProgetto.php">
            <!-- Inizio form -->
            <div class="row register-form">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="infos">Nome progetto*</label>
                  <input type="text" class="form-control" name="nomeProgetto" value="<?php echo $_SESSION['infoProg']['nomeProgetto']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="infos">Numero partecipanti*</label>
                  <input type="number" min="1" max="99" class="form-control" name="numPartecipanti" value="<?php echo $_SESSION['infoProg']['numPartecipanti']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="infos">Compenso</label>
                  <input type="text"  min="0" class="form-control" name="compenso" value="<?php echo $_SESSION['infoProg']['compenso']; ?>">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label class="infos">Data d'inizio*</label>
                  <input type="date" name="dataCreazione" class="form-control" value="" required>
                </div>
                <div class="form-group">
                  <label class="infos">Durata stimata (in giorni)*</label>
                  <input type="number" min="1" max="999" name="durata" class="form-control" value="<?php echo $_SESSION['infoProg']['durata']; ?>" required>
                </div>
                <div class="form-group">
                  <label class="infos">Categoria*</label>
                  <select class="form-control" name="categoria" required>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Hobby'){echo 'selected="true"';}?>>Hobby</option>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Sport'){echo 'selected="true"';}?>>Sport</option>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Viaggi'){echo 'selected="true"';}?>>Viaggi</option>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Eventi'){echo 'selected="true"';}?>>Eventi</option>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Cinema'){echo 'selected="true"';}?>>Cucina</option>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Informatica'){echo 'selected="true"';}?>>Informatica</option>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Elettronica'){echo 'selected="true"';}?>>Elettronica</option>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Scienze'){echo 'selected="true"';}?>>Scienze</option>
                    <option <?php if($_SESSION['infoProg']['categoria'] == 'Altro'){echo 'selected="true"';}?>>Altro</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label class="infos">Descrizione (max 300 caratteri)*</label>
                  <textarea name="descrizione" style="height:150px; resize: none;" maxlength="300" class="form-control" placeholder="<?php echo $_SESSION['infoProg']['descrizioneProgetto']; ?>"></textarea>
                </div>
              </div>
              <input type="submit" class="btnRegister" value="Conferma">
              <button>Conferma</button>
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
