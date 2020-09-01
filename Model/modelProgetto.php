<?php
session_start();

function iMieiProgetti(){ // Visualizzazione dei progetti creati e partecipati
	include 'connect.php';
    $i = 0;
    $arrayTotale = array();
    $arrDati = array();
	$query1 = "SELECT idProgetto, nome, stato FROM progetto WHERE teammateID='{$_SESSION['id']}';";
    $query2 = "SELECT DISTINCT progetto.idProgetto AS idProg, nome, progetto.stato AS status
    			FROM progetto INNER JOIN richiesta
    			ON progetto.idProgetto = richiesta.idProgetto
                WHERE richiesta.idTeammate='{$_SESSION['id']}' AND richiesta.stato='Accettata';";

    $result = mysqli_query($conn , $query1);
    while ($row = mysqli_fetch_assoc($result)){
    	$arrDati['idProgetto'] = $row['idProgetto'];
        $arrDati['nome'] = $row['nome'];
        $arrDati['stato'] = $row['stato'];
        $arrayTotale[$i] = $arrDati;
        $i++;
    }
    
    $result = mysqli_query($conn , $query2);
    while ($row = mysqli_fetch_assoc($result)){
    	$arrDati['idProgetto'] = $row['idProg'];
        $arrDati['nome'] = $row['nome'];
        $arrDati['stato'] = $row['status'];
        $arrayTotale[$i] = $arrDati;
        $i++;
    }
   
    mysqli_close($conn);
	return $arrayTotale;
}


function getIdProg($nomeP){ // Acquisizione id progetto dal nome progetto
	include 'connect.php';
    $query = "SELECT idProgetto from progetto WHERE nome='$nomeP'";
    
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
   
    mysqli_close($conn);
    return $row['idProgetto'];
}


function getInfoProject($idProgetto){ // Acquisizione informazioni di un progetto tramite l'id progetto
	include 'connect.php';
	$query = "SELECT idProgetto, progetto.nome AS nomeProgetto, progetto.descrizione AS descrizioneProgetto, 
    	dataCreazione, categoria, stato, durata, compenso, numPartecipanti, idTeammate AS idLeader, 
        teammate.nome AS nomeLeader, teammate.cognome AS cognomeLeader 
        FROM progetto INNER JOIN teammate ON teammateID=idTeammate
        WHERE idProgetto= '$idProgetto' ";
    
    $result = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($result);
    
    //Formattazione della data
    $temp = $row['dataCreazione']; 
    $row['dataCreazione'] = $temp[8].$temp[9].$temp[7].$temp[5].$temp[6].$temp[4].$temp[0].$temp[1].$temp[2].$temp[3];
    
    mysqli_close($conn);
    return $row;
}


function caricaTeammates($idP){ // Caricamento teammates di un progetto
	include 'connect.php';
    $i = 0;
    $dati = array();
    $query = "SELECT richiesta.idTeammate as teammate, stato, nome, cognome FROM richiesta INNER JOIN teammate 
    			ON richiesta.idTeammate = teammate.idTeammate
                WHERE idProgetto='$idP' AND stato='Accettata'";

    $result = mysqli_query($conn , $query);
    while ($row = mysqli_fetch_assoc($result)){
    	$dati[$i]['idTeammates'] = $row['teammate'];
        $dati[$i]['statoTeammates'] = $row['stato'];
        $dati[$i]['nomeTeammates'] = $row['nome'];
        $dati[$i]['cognomeTeammates'] = $row['cognome'];  
        $i++;
    }
    mysqli_close($conn);
    var_dump($dati);
    return $dati;
}


function verificaStatoRichiesta($idT, $idP){ //Acquisizione stato della richiesta
	include 'connect.php';
    $query = "SELECT stato FROM richiesta WHERE idTeammate='$idT' AND idProgetto='$idP';";
    
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    mysqli_close($conn);
    return $row['stato'];
}


function ricercaProgetto($nome, $categoria, $stato){
	include 'connect.php';
    $i = 0;
    $query = "SELECT idProgetto FROM progetto"; 
    // procedura per la composizione della stringa da ricercare
    if($nome != '' or $categoria != 'tutte' or $stato != 'tutti'){
    	$query .=" WHERE";
    }
    if($nome != ''){
    	$query .= " nome LIKE '%$nome%'";
    }
    if($categoria != 'tutte' and $nome != ''){
    	$query .= " AND categoria = '$categoria'";
    }
    if($categoria != 'tutte' and $nome == ''){
    	$query .= " categoria = '$categoria'";
    }
    if($stato != 'tutti' and ($categoria != 'tutte' or $nome != '')){
    	$query .= " AND stato = '$stato'";
    }
    if($stato != 'tutti' and ($categoria == 'tutte' and $nome == '')){
    	$query .= " stato = '$stato'";
    }
    // fine procedura
    
    $result = mysqli_query($conn , $query);
    while ($row = mysqli_fetch_assoc($result)){
    	$progetti[$i] = $row['idProgetto'];
        $i++;
    }
    
    mysqli_close($conn);
    return $progetti;
}


function getLastProjectId(){ // Ritorna l'id dell'ultimo progetto inserito nel database
	include 'connect.php';
	$query = "SELECT MAX(idProgetto) AS id FROM progetto";
    
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    mysqli_close($conn);
    return $row['id'];
}


function recuperaObiettivi($idProg){ // Recupera gli obiettivi del progetto
	include 'connect.php';
    $i = 0;
    $query = "SELECT nomeObiettivo, idProgetto, stato FROM obiettivi WHERE idProgetto = '$idProg' ORDER BY nomeObiettivo";
    
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)){
    	$nomi[$i] = $row['nomeObiettivo'];
        $stati[$i] = $row['stato'];    
        $i++;
    }
    $_SESSION['infoProg']['obiettivi'] = $nomi;
    $_SESSION['infoProg']['statoObiettivo'] = $stati;

    mysqli_close($conn);
}


function richiestaPartecipazione($idT, $idP){
	include 'connect.php';
    $query = "INSERT INTO richiesta (idTeammate, idProgetto, stato) VALUES
    			('$idT', '$idP', 'In attesa');";
	
    mysqli_query($conn, $query);
    mysqli_close($conn);
}


function annullaRichiesta($idT, $idP){
	include 'connect.php';
    $query = "DELETE FROM richiesta WHERE idTeammate='$idT' AND idProgetto='$idP';";
	
    mysqli_query($conn, $query);
    mysqli_close($conn);	
}

function caricaRichieste($idP){
	include 'connect.php';	
    $query = "SELECT richiesta.idTeammate, nome, cognome FROM richiesta INNER JOIN teammate
    			ON richiesta.idTeammate = teammate.idTeammate
                WHERE idProgetto='$idP' AND stato='In attesa';";
    $i = 0;
    
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)){
    	$_SESSION['richieste'][$i]['idTeammate'] = $row['idTeammate'];
        $_SESSION['richieste'][$i]['nome'] = $row['nome'];
        $_SESSION['richieste'][$i]['cognome'] = $row['cognome'];
        $i++;
    }
    $_SESSION['counter'] = $i;
    $_SESSION['cont'] = 0;
    mysqli_close($conn);
}


/**************************************************
******************  CONTATORI   *******************
**************************************************/

function countProgettiConclusi($id){
	include 'connect.php';
    
    $query = "SELECT COUNT(progetto.idProgetto) AS cont FROM progetto INNER JOIN richiesta 
    	ON progetto.idProgetto = richiesta.idProgetto
        WHERE richiesta.idTeammate = '$id' 
        AND (progetto.stato ='Chiuso')";
        
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    mysqli_close($conn);
    return $row['cont'];
}

function countProgettiInCorso($id){
	include 'connect.php';
    
    $query = "SELECT COUNT(progetto.idProgetto) AS cont FROM progetto INNER JOIN richiesta 
    	ON progetto.idProgetto = richiesta.idProgetto
        WHERE richiesta.idTeammate = '$id' 
        AND (progetto.stato ='Impostazione' OR progetto.stato='Avviato')";
        
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    
    return $row['cont'];
}

function countProgettiCreati($id){
	include 'connect.php';
    $query = "SELECT COUNT(idProgetto) AS cont FROM progetto WHERE teammateID='$id'";
    
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    mysqli_close($conn);
    return $row['cont']; 
}


?>