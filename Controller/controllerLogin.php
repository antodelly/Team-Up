<?php
session_start();
include '../Model/connect.php';
include '../Model/gestoreAccesso.php';

if($_SESSION['rec'] == true){
	$email = $_POST["email"];
    $pass = newPassword($email);
    pswRecoveryMail($email, $pass);
    session_unset($_SESSION['rec']);
    $_SESSION['type'] = "success";
	$_SESSION['message'] = "Ti abbiamo inviato una email con la tua nuova password (attendi di riceverla per poter accedere).";
    $_SESSION['redirect'] = "<script type='text/javascript'> window.setTimeout(function() { window.location.href='login.php';}, 4000);</script>";
    header('Location: ../loading.php');
}
else{
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  session_unset();
  $_SESSION['id'] = getId($email, $password);
  
  if(isset($_SESSION['id'])){
	$dati = getDati($_SESSION['id']);
    $_SESSION['nome'] = $dati['nome'];
    $_SESSION['cognome'] = $dati['cognome'];
    $_SESSION['genere'] = $dati['genere'];
    $_SESSION['cellulare'] = $dati['cellulare'];
    $_SESSION['descrizionetm'] = $dati['descrizione'];
    $_SESSION['email'] = $email;	
    
    header('Location: ../home.php'); 
  } else{
  	  $_SESSION['type'] = "error";
	  $_SESSION['message'] = "Email o password errati!";
      $_SESSION['redirect'] = "<script type='text/javascript'> window.setTimeout(function() { window.location.href='login.php';}, 3000);</script>";
      header('Location: ../loading.php');	    
  }
}
?>