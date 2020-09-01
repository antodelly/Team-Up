<?php
session_start();
if($_SESSION['t'] != 1){
	header ('location: Controller/controllerProgetto.php?val=7');   
}
unset($_SESSION['t']);
?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>TeamUp</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="css/home.css">
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

<!-- Project section -->
<div class="section-header">Ultimi progetti creati</div>
<div class="projects-section">
  
  <!--first card -->
  <div class="wrapper">
    <div class="project">
      <div class="card-top">
        <a href="Controller/controllerProgetto.php?val=3&prog=<?php echo $_SESSION['projectsHome'][0]['idProgetto']; ?>"> <?php echo $_SESSION['projectsHome'][0]['nomeProgetto']; ?> </a>		
      </div>
      
      <div class="creator">Creatore</div>
      <div class="title"><?php echo $_SESSION['projectsHome'][0]['nomeLeader']." ".$_SESSION['projectsHome'][0]['cognomeLeader'];?></div>
      <div class="description">
          <?php echo $_SESSION['projectsHome'][0]['descrizioneProgetto'];?>
      </div>

      <div class="info c1">
		<div class="info-values"><p>Durata (ore)</p></div>
        <div class="info-values"><p>Compenso €</p></div>
        <div class="info-values"><p>Categoria</p></div>       
      </div>

      <div class="stat c1">
      	<div class="stat-values"><p><?php echo $_SESSION['projectsHome'][0]['durata'];?></p></div>
        <div class="stat-values"><p><?php echo $_SESSION['projectsHome'][0]['compenso'];?></p></div>
		<div class="stat-values"><p><?php echo $_SESSION['projectsHome'][0]['categoria'];?></p></div>
      </div>

    </div> <!-- end first -->
  </div> <!-- end first card -->
  
    <!-- second card -->
  <div class="wrapper">
    <div class="project">
      <div class="card-top">
		<a href="Controller/controllerProgetto.php?val=3&prog=<?php echo $_SESSION['projectsHome'][1]['idProgetto']; ?>"> <?php echo $_SESSION['projectsHome'][1]['nomeProgetto']; ?> </a>
      </div>
      
      <div class="creator">Creatore</div>
      <div class="title"><?php echo $_SESSION['projectsHome'][1]['nomeLeader']." ".$_SESSION['projectsHome'][1]['cognomeLeader'];?></div>
      <div class="description">
        <?php echo $_SESSION['projectsHome'][1]['descrizioneProgetto'];?>
      </div>

      <div class="info c4">
		<div class="info-values"><p>Durata (ore)</p></div>
        <div class="info-values"><p>Compenso €</p></div>
        <div class="info-values"><p>Categoria</p></div>       
      </div>
      
      <div class="stat c4">
      	<div class="stat-values"><p><?php echo $_SESSION['projectsHome'][1]['durata'];?></p></div>
        <div class="stat-values"><p><?php echo $_SESSION['projectsHome'][1]['compenso'];?></p></div>
		<div class="stat-values"><p><?php echo $_SESSION['projectsHome'][1]['categoria'];?></p></div>
      </div>

    </div> <!-- end first -->
  </div> <!-- end second card -->
  
    <!--first third -->
  <div class="wrapper">
    <div class="project">
      <div class="card-top">
		<a href="Controller/controllerProgetto.php?val=3&prog=<?php echo $_SESSION['projectsHome'][2]['idProgetto']; ?>"> <?php echo $_SESSION['projectsHome'][2]['nomeProgetto']; ?> </a>
      </div>
      <div class="creator">Creatore</div>
      <div class="title"><?php echo $_SESSION['projectsHome'][2]['nomeLeader']." ".$_SESSION['projectsHome'][2]['cognomeLeader'];?></div>
      <div class="description">
        <?php echo $_SESSION['p3']['descrizioneProgetto'];?>
      </div>

      <div class="info c5">
		<div class="info-values"><p>Durata (ore)</p></div>
        <div class="info-values"><p>Compenso €</p></div>
        <div class="info-values"><p>Categoria</p></div>       
      </div>
      
      <div class="stat c5">
      	<div class="stat-values"><p><?php echo $_SESSION['projectsHome'][2]['durata'];?></p></div>
        <div class="stat-values"><p><?php echo $_SESSION['projectsHome'][2]['compenso'];?></p></div>
		<div class="stat-values"><p><?php echo $_SESSION['projectsHome'][2]['categoria'];?></p></div>
      </div>

    </div> <!-- end first -->
  </div> <!-- end third card -->
 
</div> <!-- end container -->

  <section class="footer">
  	<div class="mark">
   	  <h3>Team<span>Up</span></h3>
    </div>
     <div class="copyright">
       &copy; Copyright. All Rights Reserved
     </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
