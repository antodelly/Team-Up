<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Profilo</title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/visualizzaProfilo.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

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

 
 <!-- Main content -->
  <div class="wrapper">
	<div class="left" style="<?php echo $_SESSION['coloreTM'];?>"> 
        <img src="https://i.imgur.com/cMy8V5j.png" alt="user" width="100">
        <h4><?php echo $_SESSION['nomeTM']." ".$_SESSION['cognomeTM'];?></h4>
        <div class="descrizione"><?php echo $_SESSION['descrizioneTM'];?></div>
   </div>
    <div class="right">
        <div class="infos">  
            <div class="ptitle">Informazioni</div>
            <div class="info_data">
                 <div class="data">
                    <h3>Email</h3>
                    <p><?php echo $_SESSION['emailTM'];?></p>
                 </div>
                 <div class="data">
                   <h3>Cellulare</h3>
                    <p><?php echo $_SESSION['cellulareTM'];?></p>
              </div>
            </div>
        </div>


      
      <div class="projects">
            <div class="ptitle">Progetti</div>
            <div class="projects_data">
                 <div class="data">
                    <h3>Partecipati</h3>
                    <p><?php echo $_SESSION['pPartecipatiTM']; ?></p>
                 </div>
                 <div class="data">
                   <h3>Creati</h3>
                    <p><?php echo $_SESSION['pCreatiTM'];?></p>
              </div>
            </div>
        </div>
      
      <?php if($_SESSION['auto'] == true){
      		echo '
        	<div class="buttons">
      		  <a href="modificaProfilo.php" class="btn-modify" style="'. $_SESSION['coloreTM'] . 'text-decoration: none;">Modifica</a>
              <a href="reimpostaPassword.php" class="btn-psw">Cambia password</a>
      		</div>
             ';
             unset($_SESSION['auto']);
        	}	
      ?>

      

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

</body>

</html>