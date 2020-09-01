<?php
session_start();
include '../Model/modelTeammate.php';
include '../Model/modelProgetto.php';
include '../Model/gestoreAccesso.php';

if(!isset($_SESSION['id'])){
	header("Location: ../login.php");	
} else{
	$val = $_GET["val"];
	if (isset($val)){
		$_SESSION['option'] = $val;
	} 
 	
    
    switch($_SESSION['option']){
    // Caricamento dati personali
    case 1:
      $idT = $_GET['idT'];
      
      if($idT == $_SESSION['id']){
        $_SESSION['auto'] = true;
      	$_SESSION['nomeTM'] = $_SESSION['nome'];
	  	$_SESSION['cognomeTM'] = $_SESSION['cognome'];
	  	$_SESSION['descrizioneTM'] = $_SESSION['descrizionetm'];
	  	$_SESSION['emailTM'] = $_SESSION['email'];
	  	$_SESSION['cellulareTM'] = $_SESSION['cellulare'];
      	$_SESSION['genereTM'] = $_SESSION['genere']; 
        
        $_SESSION['pPartecipatiTM'] = countProgettiInCorso($idT) + countProgettiConclusi($idT);
        $_SESSION['pCreatiTM'] = countProgettiCreati($idT);
        
        switch($_SESSION['genereTM']){
      	  case "Donna": $_SESSION['coloreTM'] = "background: linear-gradient(to right,rgb(174, 65, 200),rgb(154,45,180));"; break;
          case "Uomo": $_SESSION['coloreTM'] = "background: linear-gradient(to right,rgb(45,108,180),rgb(45,128,200));"; break;
          case "Altro": $_SESSION['coloreTM'] = "background: linear-gradient(to right,rgb(95,196,31),rgb(115,196,51));"; break;  
        } 
      }
      
 	  header("Location: ../visualizzaProfilo.php");
      break;
      
    //Modifica profilo
    case 2:
      $id = $_SESSION['id'];
      $nome = $_POST['nome'];
      $cognome = $_POST['cognome'];
      $genere = $_POST['genere'];
      $email = $_POST['email'];
      $cellulare = $_POST['cellulare'];
      $descrizione = $_POST['descrizione'];
      
	  //Controllo se la nuova mail è già presente nel DB
	  $flag = mailControl($id, $email);
      if ($flag == 1){
      	echo ' <script LANGUAGE="JavaScript"> window.alert("Questa email è gia in uso!"); window.location.href="../visualizzaProfilo.php";</script>';
      } else {
      	  $_SESSION['nome'] = $nome;
          $_SESSION['cognome'] = $cognome;
          $_SESSION['genere'] = $genere;
          $_SESSION['email'] = $email;
          $_SESSION['cellulare'] = $cellulare;
          $_SESSION['descrizionetm'] = $descrizione;
          modificaProfilo();  
          
          $_SESSION['type'] = "success";
          $_SESSION['message'] = "Profilo modificato con successo.";
          $_SESSION['redirect'] = "<script LANGUAGE='JavaScript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/Controller/controllerProfilo.php?val=1&idT=$id';}, 3000); </script>";
      	  header('Location: ../loading.php');  
        }   
      break;
	
	case 3: //aggiorna password
    	$pass1 = $_POST['password1'];
      	$pass2 = $_POST['password2'];	
        
        if($pass1 != $pass2){
         	$_SESSION['type'] = "error";
          	$_SESSION['message'] = "Le due password non coincidono!";
          	$_SESSION['redirect'] = "<script LANGUAGE='JavaScript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/reimpostaPassword.php';}, 3000); </script>";
      	  	header('Location: ../loading.php');
        }
        else{
        	updatePassword($pass1);
            $_SESSION['type'] = "success";
          	$_SESSION['message'] = "La tua password è stata modificata con successo!";
          	$_SESSION['redirect'] = "<script LANGUAGE='JavaScript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/home.php';}, 3000); </script>";
      	  	header('Location: ../loading.php');
        }
        break;
    
    // Messaggio per la cancellazione di un teammate
	case 4: 
      echo '<script> 
			  let result = confirm("Sei sicuro di voler procedere?");
			  if(!result){
				window.location.href = "http://www.teamjg.altervista.org/Teamup/home.php";
              } else{
                  window.location.href = "http://www.teamjg.altervista.org/Teamup/Controller/controllerProfilo.php?val=5";
              }
    		</script>';
      break;
      
    // Cancellazione di un teammate
    case 5: 
    	deleteTeammate();
        session_unset();
        $_SESSION['type'] = "success";
        $_SESSION['message'] = "Cancellazione avvenuta con successo.";
        $_SESSION['redirect'] = "<script type='text/javascript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/index.html';}, 3000);</script>";
      	header('Location: ../loading.php');
        break;
        
     
    // Visualizzazione profilo altrui    
    case 6: 
        $idT = $_GET['idT'];
        if($idT == $_SESSION['id']){
        	header('Location: controllerProfilo.php?val=1&idT='. $idT .'');
        }
        else{     
        	$_SESSION['otherProfile'] = getDati($idT);
            
            $_SESSION['nomeTM'] = $_SESSION['otherProfile']['nome'];
	  		$_SESSION['cognomeTM'] = $_SESSION['otherProfile']['cognome'];
	  		$_SESSION['descrizioneTM'] = $_SESSION['otherProfile']['descrizionetm'];
	  		$_SESSION['emailTM'] = $_SESSION['otherProfile']['email'];
	  		$_SESSION['cellulareTM'] = $_SESSION['otherProfile']['cellulare'];
      		$_SESSION['genereTM'] = $_SESSION['otherProfile']['genere'];

            $_SESSION['pPartecipatiTM'] = countProgettiInCorso($idT) + countProgettiConclusi($idT);
            $_SESSION['pCreatiTM'] = countProgettiCreati($idT);
            
            switch($_SESSION['genereTM']){
      	 		case "Donna": $_SESSION['coloreTM'] = "background: linear-gradient(to right,rgb(174, 65, 200),rgb(154,45,180));"; break;
         		case "Uomo": $_SESSION['coloreTM'] = "background: linear-gradient(to right,rgb(45,108,180),rgb(45,128,200));"; break;
         		case "Altro": $_SESSION['coloreTM'] = "background: linear-gradient(to right,rgb(95,196,31),rgb(115,196,51));"; break;  
                default: $_SESSION['coloreTM'] = "background: gray"; break;
            }  
            header("Location: ../visualizzaProfilo.php");
        }

        break;
  }
  
}	

?>   