<?php
session_start();

function getDati($id){
  include 'connect.php';
  $query = "SELECT nome, cognome, genere, email, cellulare, descrizione AS descrizionetm FROM teammate WHERE idTeammate= '$id' ";

  $result = mysqli_query($conn, $query) or die(mysql_error());
	if ($result) {
    	$dati = mysqli_fetch_assoc($result);
	}

  mysqli_close($conn);
  return $dati;
}


function getId($mail, $pass){
	include 'connect.php'; 
	$query = "SELECT idTeammate FROM teammate WHERE email= '$mail' AND password= '$pass' ";
    
	$result = mysqli_query($conn, $query) or die(mysql_error());
	if ($result) {
    	$row = mysqli_fetch_assoc($result);
    }
    mysqli_close($conn);
    return $row['idTeammate'];
}


//Invia una mail di recap della registrazione
function mailConferma($email, $password){
        $headers = "From: teamjg@gmail.com\nreply-To: noreply\r\n";
        $subject = "Benvenuto su TeamUp.";
        //corpo del messaggio
        $messaggio = "Ti ringraziamo per la tua iscrizione.\n";
        $messaggio .= "Puoi accedere utilizzando la tua email: " .$email."\n";
        $messaggio .= "con la seguente password: ". $password ."\n";
        $messaggio .= "http://teamjg.altervista.org/Matteo/login.php";
        // invio dell'email
        mail($email, stripslashes($subject), stripslashes($messaggio), $headers);
} 

function newPassword($email){
	$length = 8;
	for ($x=1; $x<=$length; $x++){
  	// Se $x è multiplo di 2...
  	if ($x % 2){
   	    $mypass = $mypass . chr(rand(97,122));
    } else{
    	$mypass = $mypass . rand(0,9);
  	}
	}
    include 'connect.php';
    mysqli_query($conn, "UPDATE teammate SET password='$mypass' WHERE email='$email'");
    mysqli_close($conn);
    
    return $mypass;
}

function pswRecoveryMail($email, $pass){
	    $headers = "From: teamjg@gmail.com\nreply-To: noreply\r\n";
        $subject = "Recupero password";
        //corpo del messaggio
        $messaggio = "Puoi utilizzare questa password per accedere: $pass \n";
        $messaggio .= "http://teamjg.altervista.org/Teamup/login.php \n";
        $messaggio .= "Ti consigliamo di modificare la tua password una volta effettuato l'accesso. \n";
        // invio dell'email
        mail($email, stripslashes($subject), stripslashes($messaggio), $headers);
}


?>