<?php
session_start();

function newProject($dati){ //Aggiunta di un nuovo progetto al database
	include 'connect.php';
    
    $query1 = "INSERT INTO progetto (nome, descrizione, dataCreazione, categoria, stato, durata, compenso, numPartecipanti, teammateID) 
    		VALUES('{$dati['nomeProgetto']}', '{$dati['descrizione']}', '{$dati['dataCreazione']}', 
            '{$dati['categoria']}', 'Impostazione', '{$dati['durata']}', '{$dati['compenso']}',  
            '{$dati['numPartecipanti']}', '{$dati['idLeader']}');";
      
    $query2 = "INSERT INTO leader (idTeammate) values ('{$dati['idLeader']}');";

    $result = mysqli_query($conn, $query1);
    $result += mysqli_query($conn, $query2);
  
    mysqli_close($conn);
    return $result;
}

function deleteProject($idP){
	include 'connect.php';
    $query1 = "DELETE FROM progetto WHERE idProgetto='$idP';";
    $query2 = "DELETE FROM leader WHERE idProgetto='$idP';";
    
    $result = mysqli_query($conn, $query1);
    $result += mysqli_query($conn, $query2);
    
    mysqli_close($conn);
    return $result;
}

function avviaProgetto($idP){
	include 'connect.php';
    $query = "UPDATE progetto SET stato='Avviato' WHERE idProgetto='$idP';";
    
    $result = mysqli_query($conn, $query);
    
    mysqli_close($conn);
    return $result;
}

function chiudiProgetto($idP){
	include 'connect.php';
    $query = "UPDATE progetto SET stato='Chiuso' WHERE idProgetto='$idP';";
    
    $result = mysqli_query($conn, $query);
    
    mysqli_close($conn);
    return $result;
}

function modificaProgetto($idP, $dati){
	include 'connect.php';
    $query = "UPDATE progetto SET nome='{$dati['nomeProgetto']}' , descrizione='{$dati['descrizione']}',
    		dataCreazione='{$dati['dataCreazione']}', durata='{$dati['durata']}',
            categoria='{$dati['categoria']}', compenso='{$dati['compenso']}', numPartecipanti='{$dati['numPartecipanti']}'
            WHERE idProgetto = '$idP';";

    mysqli_query($conn, $query);
    mysqli_close($conn);
}

function impostaObiettivi($obj, $idProg){
	include 'connect.php';
    $query = "DELETE FROM obiettivi WHERE idProgetto = '$idProg';";
    mysqli_query($conn, $query);
    $i = 0;

    while($i < 5){
    	if($obj[$i] != ""){
        mysqli_query($conn, "INSERT INTO obiettivi (nomeObiettivo, idProgetto) VALUES ('{$obj[$i]}', '$idProg');");
        }	
    	$i++;
    } 
    
    mysqli_close($conn);
}

function aggiornaStatoObiettivo($obiettivo, $idP){
	include 'connect.php';
    $query = "UPDATE obiettivi SET stato=1 WHERE idProgetto='$idP' AND nomeObiettivo='$obiettivo';";
    
    mysqli_query($conn, $query);
 	
    mysqli_close($conn);
}

function gestisciRichiesta($idP, $idT, $result){
	include 'connect.php';
    
    $accepted = "UPDATE richiesta SET stato='Accettata' WHERE idProgetto='$idP' AND idTeammate='$idT';";
    $rejected = "UPDATE richiesta SET stato='Rifiutata' WHERE idProgetto='$idP' AND idTeammate='$idT';";

    if($result == 'Accetta'){
        mysqli_query($conn, $accepted);
    }
    if($result == 'Rifiuta'){
        mysqli_query($conn, $rejected);
    }

    mysqli_close($conn);
}

?>