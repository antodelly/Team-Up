<?php
  session_start();
  $_SESSION['option'] = 2;
?>

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Modifica profilo</title>

  <link rel="stylesheet" href="css/modificaProfilo.css">
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

<!-- animation -->
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
<!-- end animation -->

<!-- page content -->
<div class="page-wrapper">
  <div class="wrapper">
  
    <div class="wrapper-header">
      <div class="header-sx">
        <h2 class="title">Modifica profilo</h2>
      </div>
      <div class="header-dx">
        <img src="img/logo.png"/>
      </div>
    </div>
      
    <div class="wrapper-body"> 
      <form method="POST" action="Controller/controllerProfilo.php?val=2">
        <div class="row">
          <div class="col-2">
            <label class="input-label">Nome*</label> 
            <input class="input-style" type="text" name="nome" value="<?php echo $_SESSION['nome'];?>" maxlength="30" required title="Solo lettere. Max 30 caratteri" pattern="[A-Za-z\s]{1}[A-Za-z\s.']{0,29}">
          </div>
            
          <div class="col-2">
            <label class="input-label" required>Cognome*</label> 
            <input class="input-style" type="text" name="cognome" value="<?php echo $_SESSION['cognome'];?>" maxlength="30" required title="Solo lettere. Max 30 caratteri" pattern="[A-Za-z]{1}[A-Za-z.']{0,29}">
          </div>
        </div>
          
        <div class="row">
          <div class="col-3">
    	    <label class="input-label">Genere*</label>
            <label class="radio-container m-r-45">Donna 
              <input <?php if($_SESSION['genere']=='Donna') echo 'checked';?>name="genere" type="radio" value="Donna"/>
              <span class="checkmark"></span>
            </label> 
                
            <label class="radio-container m-r-45">Uomo 
              <input <?php if($_SESSION['genere']=='Uomo') echo 'checked';?> name="genere" type="radio" value="Uomo"/>
              <span class="checkmark"></span>
            </label> 
                
            <label class="radio-container">Altro 
              <input <?php if($_SESSION['genere']=='Altro') echo 'checked';?> name="genere" type="radio" value="Altro"/>
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
          
        <div class="row">
          <div class="col-2">
            <label class="input-label">Email*</label> 
            <input class="input-style" type="email" name="email" value="<?php echo $_SESSION['email'];?>" required title="Inserire un'email valida" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
          </div>
          <div class="col-2">
            <label class="input-label">Cellulare</label> 
            <input class="input-style" type="tel" name="cellulare" value="<?php echo $_SESSION['cellulare'];?>" title="Solo numeri (max 10). Deve rispettare il formato 1234567890" pattern="[0-9]{10}">
          </div>
        </div>
          
        <div class="row"> <!--Riga Descrizione -->
          <div class="col-4">
    		<label class="input-label">Descrizione</label>
    		<textarea class="form-control" name="descrizione" rows="3" placeholder="<?php echo $_SESSION['descrizionetm'];?>"></textarea>
          </div>
        </div>
  
        <div class="wrapper-footer">
          <button class="btn--blue" type="submit" onclick="return Validate()">Conferma</button>
          <button class="btn--red" type="button" onclick="location.href= 'visualizzaProfilo.php'">Annulla</button>
        </div>
      </form>
    </div><!-- end wrapper body-->
    
  </div><!-- end wrapper -->
</div><!-- end page content -->


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
