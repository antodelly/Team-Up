<?php
session_start();

// Reimposta la password del teammate
function updatePassword($pass){
	include 'connect.php';
    
    $result = mysqli_query($conn, "UPDATE teammate SET password='$pass' WHERE idTeammate='{$_SESSION['id']}'");
    mysqli_close($conn);
    
    if($result == true){ return 1; }
    return 0;  
}

//Aggiungere un nuovo teammate al database
function newTeammate(){
	include 'connect.php';  
    $query = "INSERT INTO teammate (nome, cognome, genere, email, password, cellulare) VALUES
    		('{$_SESSION['nome']}','{$_SESSION['cognome']}','{$_SESSION['genere']}',
            '{$_SESSION['email']}', '{$_SESSION['password']}','{$_SESSION['cellulare']}')";

	mysqli_query($conn, $query) or die(mysql_error());   
	mysqli_close($conn);
}

// Funzione di Modifica del Profilo
function modificaProfilo(){
    include 'connect.php';
	$query = "UPDATE teammate SET nome = '{$_SESSION['nome']}', cognome = '{$_SESSION['cognome']}',
                genere = '{$_SESSION['genere']}', email='{$_SESSION['email']}', cellulare = '{$_SESSION['cellulare']}',
                descrizione = '{$_SESSION['descrizionetm']}' WHERE idTeammate = '{$_SESSION['id']}' ";
        
    mysqli_query($conn, $query) or die(mysql_error());
	mysqli_close($conn);
	}

// Controlla l'esistenza di una mail al momento dell'iscrizione	
function mailControl($id, $mail){
    include 'connect.php';
    $query = "SELECT idTeammate, email FROM teammate WHERE email = '$mail' ";
    
	$result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($id == $row['idTeammate'] and $mail == $row['email']){ return 0; } 
    if($id != $row['idTeammate'] and $mail == $row['email']){ return 1; } 
    return 0;
}
    
function updateTeammate(){
	include 'connect.php';
    $query= "INSERT INTO teammate (nome, cognome, genere, email, cellulare, descrizione) VALUES
    	('{$_SESSION['nome']}', '{$_SESSION['cognome']}', '{$_SESSION['genere']}', '{$_SESSION['email']}',
   		 '{$_SESSION['cellulare']}', '{$_SESSION['descrizionetm']}') WHERE id= '{$_SESSION['idTeammate']}'";
         
    mysqli_query($conn, $query) or die(mysql_error());
	mysqli_close($conn);
}
    
    
function deleteTeammate(){
		include 'connect.php';
		$id = $_SESSION['id'];
        $query = "UPDATE teammate SET password= '/', genere='/', email='utente$id', cellulare='0', descrizione='utente cancellato' WHERE idTeammate='$id'";
    	
    	mysqli_query($conn, $query) or die(mysql_error());
    	mysqli_close($conn);
}

?>
