<?php
session_start();

$_SESSION['option'] = 6;
$show = $_GET['result'];
?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Ricerca</title>
  
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/ricercaProgetti.css">
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
    
	<div class="search">
	  <form method="POST" action="Controller/controllerProgetto.php">
        <div class="left">
          <div class="title">Ricerca un progetto</div>
          <div class="search-input">
     	    <label>Nome progetto:</label>
  		    <input class="name" type="text" id="projectname" name="projectname">
          </div>
          
          <div class="select-input">
 		  	<select name="categoria">
          	  <option class="hidden" selected disabled>Seleziona una categoria</option>
          	  <option>Hobby</option>
              <option>Sport</option>
              <option>Viaggi</option>
          	  <option>Eventi</option>
          	  <option>Cucina</option>
          	  <option>Informatica</option>
          	  <option>Elettronica</option>
          	  <option>Scienze</option>
          	  <option>Altro</option>
              <option>Tutte</option>
            </select>
          </div> <!-- end select input -->
          
        </div> <!-- end left -->
      
        <div class="right">
		  <div class="title">Seleziona uno stato</div>
          <div class="radio-btn">
            <input class="status" checked="checked" name="status" type="radio" value="tutti">
            <label class="radio">Tutti<br></label>

            <input class="status" name="status" type="radio" value="impostazione">
            <label class="radio">Impostazione<br></label> 

            <input class="status" name="status" type="radio" value="avviato">
            <label class="radio">Avviato<br></label> 

            <input class="status" name="status" type="radio" value="chiuso">
            <label class="radio">Chiuso<br></label> 
          </div> <!-- end radio-btn -->
        <div class="btn-conf">
          <input class="invio" type="submit" value="Cerca">
		</div>
        </div> <!-- end right -->
        

      </form>
    </div> <!-- end search -->
    
    <?php
    	if($show == true){   
        	echo '<div class="main">
					<div class = "border">
					  <div class = "inner-cutout"> 
						<h1 class="knockout">Risultati della ricerca</h1>
					  </div>
					</div>
				</div>
            ';
        	$i = 0;
        	
            while($_SESSION['infoProg'][$i]['nomeProgetto'] != ''){
                echo '
            	<div class="results">
                  <div class="single">
                    <div class="output"><a href="Controller/controllerProgetto.php?val=3&prog='. $_SESSION['infoProg'][$i]['idProgetto']. '"><span>'. $_SESSION['infoProg'][$i]['nomeProgetto'] .'</span></a></div>
                    <div class="output"><a href="Controller/controllerProfilo.php?val=6&idT='.$_SESSION['infoProg'][$i]['idLeader']. '"><span>'.$_SESSION['infoProg'][$i]['nomeLeader'].' '.$_SESSION['infoProg'][$i]['cognomeLeader']. '</span></a></div>
                    <div class="output">'.$_SESSION['infoProg'][$i]['categoria'].'</div>
                    <div class="output">'.$_SESSION['infoProg'][$i]['stato'].'</div>
                  </div>
      			</div>
                ';
                $i++;
            }
            unset($_SESSION['infoProg']);
        }
        
        if($show == 'none'){
            echo '
			<div class="noresults">
                Nessun risultato
     		</div>
            ';
        }

	?>



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
