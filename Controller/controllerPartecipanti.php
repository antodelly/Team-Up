<?php
session_start();
include '../Model/modelLeader.php';
include '../Model/modelProgetto.php';

if(!isset($_SESSION['id'])){
	header("Location: ../login.php");	
} else{
	$val = $_GET["val"];
	if (isset($val)){
		$_SESSION['option'] = $val;
	} // fine option

	switch($_SESSION['option']){
        case 1: // Invio richiesta di partecipazione
        	richiestaPartecipazione($_SESSION['id'], $_SESSION['infoProg']['idProgetto']);
            header('Location: controllerProgetto.php?val=3&prog='. $_SESSION['infoProg']['idProgetto'] .'');
        break;
        
        case 2: // Valutazione richiesta    
        	unset($_SESSION['risultati']);
            caricaRichieste($_SESSION['infoProg']['idProgetto']);
            header('Location: ../valutaRichieste.php');
        break;
        
        case 3: // Salva richieste
			$_SESSION['risultato'] = $_POST['result'];
            
            gestisciRichiesta($_SESSION['infoProg']['idProgetto'], $_SESSION['richieste'][$_SESSION['cont']]['idTeammate'], $_SESSION['risultato']);
            
            $_SESSION['cont']++;
            $_SESSION['counter']--;

            if($_SESSION['counter'] > 0) {
            	header('Location: ../valutaRichieste.php');
            }
  			else{
            	 header('Location: controllerProgetto.php?val=3&prog='. $_SESSION['infoProg']['idProgetto'] .'');
            }
        break;
        
        case 4: // Annullare richiesta di partecipazione
        	annullaRichiesta($_SESSION['id'], $_SESSION['infoProg']['idProgetto']);
            unset($_SESSION['infoProg']['statoRichiesta']);
            header('Location: ../dettagliProgetto.php');
        break;
     }   
  }
?>