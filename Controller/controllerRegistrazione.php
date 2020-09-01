<?php
session_start();

// Connessione al database
include '../Model/connect.php';
include '../Model/gestoreAccesso.php';
include '../Model/modelTeammate.php';

//--- Funzioni di controllo ---

//Verifica che gli input inseriti siano in un formato valido
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  $_SESSION['nome'] = test_input($_POST['nome']);
  $_SESSION['cognome'] = test_input($_POST['cognome']);
  $_SESSION['genere'] = test_input($_POST['genere']);
  $_SESSION['email'] = test_input($_POST['email']); 
  $_SESSION['cellulare'] = test_input($_POST['cellulare']);
  $_SESSION['password'] = test_input($_POST['password']);

  $query = "SELECT idTeammate FROM teammate WHERE email= '{$_SESSION['email']}'";
  $ctrl_mail = mysqli_query($conn, $query);
 
  if(mysqli_num_rows($ctrl_mail) > 0){
	  session_unset();
      $_SESSION['type'] = "error";
      $_SESSION['message'] = "Email già esistente!";
      $_SESSION['redirect'] = "<script type='text/javascript'>  window.setTimeout(function() { window.location.href='login.php';}, 3000);</script>";
      mysqli_close($conn); 
      header('Location: ../loading.php');
  } else{
      newTeammate();
      mailConferma($_SESSION['email'], $_SESSION['password']);
      unset($_SESSION['idTeammate']);
      $_SESSION['type'] = "success";
      $_SESSION['message'] = "Registrazione avvenuta con successo! Ti abbiamo inviato una mail con i tuoi dati.";
      $_SESSION['redirect'] = "<script type='text/javascript'> window.setTimeout(function() { window.location.href='login.php';}, 3000);</script>";
      header('Location: ../loading.php');
	}
	mysqli_close($conn);    
?>