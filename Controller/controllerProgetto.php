<?php
session_start();
include '../Model/modelProgetto.php';
include '../Model/modelLeader.php';

if(!isset($_SESSION['id'])){
	header("Location: ../login.php");	
} else{
	$val = $_GET["val"];
	if (isset($val)){
		$_SESSION['option'] = $val;
	} // fine option

	switch($_SESSION['option']){
    
      case 1: // I miei progetti (profilo personale)
        $i = 0;
      	$_SESSION['pInfo'] = iMieiProgetti();
        $_SESSION['pconclusi'] = countProgettiConclusi($_SESSION['id']);
        $_SESSION['pincorso'] = countProgettiInCorso($_SESSION['id']);
        $_SESSION['pcreati'] = countProgettiCreati($_SESSION['id']); 
		header('Location: ../mieiProgetti.php');
        break;
        
        case 2: // Creazione nuovo progetto
        $datiProg = array(
        	'nomeProgetto' => addslashes($_POST['nomeProgetto']),
        	'descrizione' => addslashes($_POST['descrizione']),
        	'dataCreazione' => $_POST['dataCreazione'],
        	'durata' => addslashes($_POST['durata']),
       	 	'categoria' => addslashes($_POST['categoria']),
        	'compenso' => addslashes($_POST['compenso']),
        	'numPartecipanti' => addslashes($_POST['numPartecipanti']),
            'idLeader' => $_SESSION['id']
        );
        
        if($datiProg['compenso'] == NULL){ $datiProg['compenso'] = 0; }
        $success = newProject($datiProg);
        
        if($success = 2){
        	$lastId = getLastProjectId();
        	$_SESSION['type'] = "success";
        	$_SESSION['message'] = "Il progetto è stato creato correttamente";
        	$_SESSION['redirect'] = "<script LANGUAGE='JavaScript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/Controller/controllerProgetto.php?val=3&prog=$lastId';}, 3000); </script>";     
        } 
        else{
        	$_SESSION['type'] = "error";
        	$_SESSION['message'] = "Errore nella creazione del progetto!";
        	$_SESSION['redirect'] = "<script LANGUAGE='JavaScript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/home.php';}, 3000); </script>";
        }
        header('Location: ../loading.php');
        break;
        
        case 3: // Info di un progetto
			$idP = $_GET["prog"]; 
            $_SESSION['infoProg'] = getInfoProject($idP); 
            $_SESSION['teammates'] = caricaTeammates($idP);
            recuperaObiettivi($_SESSION['infoProg']['idProgetto']);
            $_SESSION['infoProg']['statoRichiesta'] = verificaStatoRichiesta($_SESSION['id'], $idP);
            header('Location: ../dettagliProgetto.php');
        break;
        
        case 4: //Avvia progetto
        	$controller = avviaProgetto($_SESSION['infoProg']['idProgetto']);
            if($controller == TRUE){
            	$_SESSION['type'] = "success";
        		$_SESSION['message'] = "Il progetto è stato avviato correttamente";
        		$_SESSION['redirect'] = "<script LANGUAGE='JavaScript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/dettagliProgetto.php';}, 3000); </script>";	
            	$_SESSION['infoProg']['stato'] = 'Avviato';
            }
        	else{
            	$_SESSION['type'] = "error";
        		$_SESSION['message'] = "Errore nell'avvio del progetto!";
        		$_SESSION['redirect'] = "<script LANGUAGE='JavaScript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/dettagliProgetto.php';}, 3000); </script>";	
            }
       		header('Location: ../loading.php');
       break;
       
       case 5: //chiusura progetto
           $confirm = $_GET['confirm'];
           if($confirm != 1){
           echo '<script> 
			  let result = confirm("Sei sicuro di voler chiudere il progetto? (Non potrai tornare indietro)");
			  if(!result){
				window.location.href = "http://www.teamjg.altervista.org/Teamup/dettagliProgetto.php";
              } else{
                  window.location.href = "http://www.teamjg.altervista.org/Teamup/Controller/controllerProgetto.php?val=5&confirm=1";
              }
    		</script>';
            }
            if($confirm == 1){
            	chiudiProgetto($_SESSION['infoProg']['idProgetto']);
                $_SESSION['infoProg']['stato'] = 'Chiuso';
                header('Location: controllerProgetto.php?val=3&prog='. $_SESSION['infoProg']['idProgetto'] .'');
            }
       break;
        
       case 6: //Ricerca progetti
        	$name = $_POST["projectname"];  
            $category = $_POST["categoria"];

            if($category == NULL or $category == 'Tutte'){ $category = 'tutte'; }
            $status = $_POST["status"];  

			$arrayID = ricercaProgetto($name, $category, $status);
            $i = 0;
            while($arrayID[$i] != ''){
            	$_SESSION['infoProg'][$i] = getInfoProject($arrayID[$i]);
                $i++;
            }

            if($arrayID == NULL){
            	header('Location: ../ricercaProgetti.php?result=none');
            }
            else{
                header('Location: ../ricercaProgetti.php?result=true');        
            }

        break;
            
        
    case 7: // Ultimi 3 progetti in home
    	$last = getLastProjectId();
        $i = 0;
        $j = 0;
        
        while($j < 3){
        	$_SESSION['projectsHome'][$j] = getInfoProject($last - $i);
            if($_SESSION['projectsHome'][$j]['nomeProgetto'] == NULL){$j--;}
            $j++;
            $i++;
        } 
        
        $_SESSION['t'] =  1;
        header ('location: ../home.php');
		break;
        
        case 8: //Imposta obiettivi
        	$obiettivi = array(0=>$_POST["obj1"], 1=>$_POST["obj2"], 2=>$_POST["obj3"], 3=>$_POST["obj4"], 4=>$_POST["obj5"]);

            impostaObiettivi($obiettivi, $_SESSION['infoProg']['idProgetto']);
            recuperaObiettivi($_SESSION['infoProg']['idProgetto']);
            header('Location: ../dettagliProgetto.php');
        break;
        
        case 9: //Aggiorna stato obiettivi
        	$ob = array(
            		1 => $_POST['ob1'],
                    2 => $_POST['ob2'],
                    3 => $_POST['ob3'],
                    4 => $_POST['ob4'],
                    5 => $_POST['ob5'],
            );
       	 	if($ob[1] != NULL){ aggiornaStatoObiettivo($_SESSION['infoProg']['obiettivi'][0], $_SESSION['infoProg']['idProgetto']);}
			if($ob[2] != NULL){ aggiornaStatoObiettivo($_SESSION['infoProg']['obiettivi'][1], $_SESSION['infoProg']['idProgetto']);}
        	if($ob[3] != NULL){ aggiornaStatoObiettivo($_SESSION['infoProg']['obiettivi'][2], $_SESSION['infoProg']['idProgetto']);}
        	if($ob[4] != NULL){ aggiornaStatoObiettivo($_SESSION['infoProg']['obiettivi'][3], $_SESSION['infoProg']['idProgetto']);}
        	if($ob[5] != NULL){ aggiornaStatoObiettivo($_SESSION['infoProg']['obiettivi'][4], $_SESSION['infoProg']['idProgetto']);}
        	
            recuperaObiettivi($_SESSION['infoProg']['idProgetto']);
            header('Location: ../dettagliProgetto.php');
        break;  
        
        case 10: //Modifica progetto      
            $datiProg = array(
        		'nomeProgetto' => addslashes($_POST["nomeProgetto"]),
        		'descrizione' => addslashes($_POST["descrizione"]),
        		'dataCreazione' => $_POST["dataCreazione"],
        		'durata' => addslashes($_POST["durata"]),
       	 		'categoria' => addslashes($_POST["categoria"]),
        		'compenso' => addslashes($_POST["compenso"]),
        		'numPartecipanti' => addslashes($_POST["numPartecipanti"])
        	);
            $id = $_SESSION['infoProg']['idProgetto'];
            
        	modificaProgetto($id, $datiProg);
            header('Location: controllerProgetto.php?val=3&prog='. $id .'');
        break;
        
        case 11: // Messaggio di eliminazione progetto
        	echo '<script> 
			  let result = confirm("Sei sicuro di voler eliminare questo progetto?");
			  if(!result){
				window.location.href = "http://www.teamjg.altervista.org/Teamup/home.php";
              } else{
                  window.location.href = "http://www.teamjg.altervista.org/Teamup/Controller/controllerProgetto.php?val=12";
              }
    		</script>';
        break;
        
        case 12: // Eliminazione progetto
        	deleteProject($_SESSION['infoProg']['idProgetto']);
            unset($_SESSION['infoProg']);
            
            $_SESSION['type'] = "success";
        	$_SESSION['message'] = "Il progetto è eliminato";
        	$_SESSION['redirect'] = "<script LANGUAGE='JavaScript'> window.setTimeout(function() { window.location.href='http://teamjg.altervista.org/Teamup/home.php';}, 3000); </script>";	
       		header('Location: ../loading.php');
        break;
        
        
        case 13: // Invio richiesta di partecipazione
        	richiestaPartecipazione($_SESSION['id'], $_SESSION['infoProg']['idProgetto']);
            header('Location: controllerProgetto.php?val=3&prog='. $_SESSION['infoProg']['idProgetto'] .'');
        break;
        
        case 14: // Valutazione richiesta    
        	unset($_SESSION['risultati']);
            caricaRichieste($_SESSION['infoProg']['idProgetto']);
            header('Location: ../valutaRichieste.php');
        break;
        
        case 15: // Salva richieste
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
        
        case 16: // Annullare richiesta di partecipazione
        	annullaRichiesta($_SESSION['id'], $_SESSION['infoProg']['idProgetto']);
            unset($_SESSION['infoProg']['statoRichiesta']);
            header('Location: ../dettagliProgetto.php');
        break;
             
    }// fine switch
    
}// fine else iniziale
?>