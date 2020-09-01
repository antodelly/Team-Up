<?php
session_start();
?>

<!doctype html>
<html class="no-js" lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Progetti</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="stylesheet" href="css/home.css">
      <link rel="stylesheet" href="css/dettagliProgetto.css">

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

<!-- Content -->
<div class="content">

<!-- Row 1  -->
<div class="row">

  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-five">
          <div class="stat-icon dib flat-color-1">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
              <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
              <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
            </svg>
          </div>
          <div class="stat-content">
            <div class="stat-text"><?php echo $_SESSION['infoProg']['nomeProgetto']; ?></div>
            <div class="stat-heading">Nome Progetto</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-five">
          <div class="stat-icon dib flat-color-2">
            <svg class="bi bi-star" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
            </svg>
          </div>
          <div class="stat-content">
            <div class="stat-text"><a href="Controller/controllerProfilo.php?val=6&idT=<?php echo $_SESSION['infoProg']['idLeader'];?>"><?php echo $_SESSION['infoProg']['nomeLeader'].' '.$_SESSION['infoProg']['cognomeLeader']; ?></a></div>
            <div class="stat-heading">Leader</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-five">
          <div class="stat-icon dib flat-color-3">
            <svg class="bi bi-calendar-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
              <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
              <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
          </div>
          <div class="stat-content">
            <div class="stat-text"><?php echo $_SESSION['infoProg']['dataCreazione'];?></div>
            <div class="stat-heading">Data Creazione</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-five">
          <div class="stat-icon dib flat-color-4">
            <svg class="bi bi-people" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zm7.973.056v-.002.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
            </svg>
          </div>
          <div class="stat-content">
            <div class="stat-text"><span class="count"><?php echo $_SESSION['infoProg']['numPartecipanti'];?></span></div>
            <div class="stat-heading">Teammates</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fine Row1 -->
                
<!-- Row 2 -->
<div class="row">

  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-five">
          <div class="stat-icon dib flat-color-7">
            <svg class="bi bi-award" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M9.669.864L8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193l-1.51-.229L8 1.126l-1.355.702-1.51.229-.684 1.365-1.086 1.072L3.614 6l-.25 1.506 1.087 1.072.684 1.365 1.51.229L8 10.874l1.356-.702 1.509-.229.684-1.365 1.086-1.072L12.387 6l.248-1.506-1.086-1.072-.684-1.365z"/>
              <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
            </svg>
          </div>
          <div class="stat-content">
            <div class="stat-text"><?php echo $_SESSION['infoProg']['categoria']?></div>
            <div class="stat-heading">Categoria</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-five">
          <div class="stat-icon dib flat-color-6">
            <svg class="bi bi-alarm" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A6 6 0 1 0 8 3a6 6 0 0 0 0 12zm0 1A7 7 0 1 0 8 2a7 7 0 0 0 0 14z"/>
              <path fill-rule="evenodd" d="M8 4.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.053.224l-1.5 3a.5.5 0 1 1-.894-.448L7.5 8.882V5a.5.5 0 0 1 .5-.5z"/>
              <path d="M.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z"/>
              <path fill-rule="evenodd" d="M11.646 14.146a.5.5 0 0 1 .708 0l1 1a.5.5 0 0 1-.708.708l-1-1a.5.5 0 0 1 0-.708zm-7.292 0a.5.5 0 0 0-.708 0l-1 1a.5.5 0 0 0 .708.708l1-1a.5.5 0 0 0 0-.708zM5.5.5A.5.5 0 0 1 6 0h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
              <path d="M7 1h2v2H7V1z"/>
            </svg>
          </div>
          <div class="stat-content">
            <div class="stat-text"><span class="count"><?php echo $_SESSION['infoProg']['durata']?></span> giorni</div>
            <div class="stat-heading">Durata</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-five">
          <div class="stat-icon dib flat-color-5">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  			  <path fill-rule="evenodd" d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z"/>
  			  <path d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
			</svg>
          </div>
          <div class="stat-content">
            <div class="stat-text"><span class="count"><?php echo $_SESSION['infoProg']['compenso']?></span> €</div>
            <div class="stat-heading">Compenso</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php 
   	  echo '
      		<div class="col-lg-3 col-md-6">
    		  <div class="card">
      		    <div class="card-body">
                  <div class="stat-status">Stato: '.$_SESSION['infoProg']['stato'].'</div>
           ';
      // Visualizzato solo dal Leader
      if($_SESSION['infoProg']['idLeader'] == $_SESSION['id'] && $_SESSION['infoProg']['stato'] == 'Impostazione'){
      	echo '<div class="stat-modify"><a href="modificaProgetto.php">Modifica progetto</a></div>';
        echo '<div class="btn-delete">
    		    <a href="Controller/controllerProgetto.php?val=11">
    		      <button>Elimina progetto</button>
			    </a>
              </div>';
      }
                
      // Visualizzazto solo dal Teammate 
      if($_SESSION['infoProg']['idLeader'] != $_SESSION['id'] and $_SESSION['infoProg']['stato'] == 'Impostazione'
      	and $_SESSION['infoProg']['statoRichiesta'] != 'In attesa' and $_SESSION['infoProg']['statoRichiesta'] != 'Rifiutata'
        and $_SESSION['infoProg']['statoRichiesta'] != 'Accettata'){     
        echo '<div class="btn-send">
    		  <a href="Controller/controllerPartecipanti.php?val=1">
    		    <button>Invia richiesta</button>
			  </a>
            </div>';
      }
      
      if($_SESSION['infoProg']['idLeader'] != $_SESSION['id'] and $_SESSION['infoProg']['statoRichiesta'] == 'Rifiutata'){  
      	echo '<div class="denied">Rifiutata</div>';
      }
      
      if($_SESSION['infoProg']['idLeader'] != $_SESSION['id'] and $_SESSION['infoProg']['stato'] == 'Impostazione'
      	and $_SESSION['infoProg']['statoRichiesta'] == 'In attesa'){     
        echo '<div class="btn-cancel">
    		  <a href="Controller/controllerPartecipanti.php?val=4">
    		    <button>Annulla richiesta</button>
			  </a>
            </div>';
      }    
      $j = 0; $close = 1;
      while($j < 5 and $_SESSION['infoProg']['obiettivi'][$j] != ''){
        if($_SESSION['infoProg']['statoObiettivo'][$j] == 0){
        	$close = 0;
        }
		$j++;
      }
        
      if($_SESSION['infoProg']['idLeader'] == $_SESSION['id'] and $_SESSION['infoProg']['stato'] == 'Avviato'
      	and $close == 1){
    	echo '<div class="btn-close">
    		<a href="Controller/controllerProgetto.php?val=5">
    		  <button>Chiudi il progetto</button>
			</a>
            </div>';
      }
                
      	echo '
      			</div>
    		  </div>
  			</div>
           ';
	  
  ?>
  
</div>
<!-- Fine Row2 -->                
                
               
<!-- Descrizione -->
<div class="row">
  <div class="col-lg-10 offset-lg-1">
    <div class="card">
      <div class="card-body">
        <h4 class="box-title">Descrizione </h4>
      </div>
      
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <p style="padding: 10px;"> <?php echo $_SESSION['infoProg']['descrizioneProgetto']; ?> </p>
        </div>
      </div>

    </div> <!-- end card -->
  </div>
</div> <!-- end row -->
<!-- end Descrizione -->


<!-- Tabella -->
<div class="orders">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">Teammates 
            <svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  			  <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
			</svg>
          </h4>
          <?php if($_SESSION['infoProg']['idLeader'] == $_SESSION['id'] and $_SESSION['infoProg']['stato'] == 'Impostazione'){
          		echo '	
          		<div class="btn-requests">
          		  <a href="Controller/controllerPartecipanti.php?val=2">
    		  		<button>Visualizza richieste</button>
				  </a>
          		</div>';
                }
          ?>
        </div>
        
        <div class="card-body--">
          <div class="table-stats order-table ov-h">
            <table class="table ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Cognome</th>
                  <th>Info</th>
                </tr>
              </thead>
     
<!------------------------------
		SEZIONE TEAMMATES
------------------------------->    
              <tbody>
                <?php
                  $i = 0;
                  while($_SESSION['teammates'][$i]['idTeammates'] != ''){
                    echo '
                      <tr>
                        <td class="serial">' . ($i+1) . '</td>

                        </td>
                        <td>' . $_SESSION['teammates'][$i]['nomeTeammates'] . '</td>
                        <td>' . $_SESSION['teammates'][$i]['cognomeTeammates'] .'</td>
                        <td class="p-0">
        			      <div class="position-relative p-3">
          			        <a href="Controller/controllerProfilo.php?val=6&idT='.$_SESSION['teammates'][$i]['idTeammates'].'" class="stretched-link">Vai al profilo</a>
        			      </div>
      				    </td>
                      </tr>';
                    $i++;
                  }
                ?> 

              </tbody>
            </table>
          </div> <!-- end table-stats -->
        </div>
      </div> <!-- /end card -->
    </div>  <!-- end col-lg-8 -->
  </div> <!-- end row -->
</div> <!-- end orders -->
 
<div class="list">
    <h2>Obiettivi</h2>
	<?php 
    	if($_SESSION['infoProg']['idLeader'] == $_SESSION['id'] && $_SESSION['infoProg']['stato']=="Impostazione"){
    		echo '<h3><a href="impostaObiettivi.php">Imposta obiettivi</a></h3>';
    	}

    $i = 0;
    

      if($_SESSION['infoProg']['stato'] == 'Avviato' and $_SESSION['infoProg']['idLeader'] == $_SESSION['id']){
        $_SESSION['option'] = 9;
        echo '<form method="POST" action="Controller/controllerProgetto.php">';
      } 
      
      while($i < 5 && $_SESSION['infoProg']['obiettivi'][$i] !=''){
        echo '<label>';
        if($_SESSION['infoProg']['idLeader'] == $_SESSION['id']){
            echo '<input type="checkbox" name="ob'. ($i+1) .'" value="1"';
            if($_SESSION['infoProg']['statoObiettivo'][$i] == 1){
            	echo ' checked';
            } 
            echo '>';
        } 
        echo' <i></i>
      		  <span>'.$_SESSION['infoProg']['obiettivi'][$i].'</span> 
              </label>
            ';
    	
    		$i++;
   	  } 

      if($_SESSION['infoProg']['idLeader'] == $_SESSION['id'] and $_SESSION['infoProg']['stato'] == 'Avviato'){
      	echo '<button class="btn-save" type="submit" onclick="">
            	Salva i cambiamenti
          	  </button>';
        	echo '</form>';
      }		


    if($_SESSION['infoProg']['idLeader'] == $_SESSION['id'] && $_SESSION['infoProg']['stato'] == 'Impostazione'){   
    	echo '<div class="btn-start">
    		<a href="Controller/controllerProgetto.php?val=4">
    		  <button>Avvia il progetto</button>
			</a>';
    }
    
    
    ?>
  </div>
</div> 
 


<!-- end content -->
        
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>