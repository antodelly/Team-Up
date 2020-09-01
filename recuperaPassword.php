<?php
  session_start();
  $_SESSION['rec'] = true;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Recupero</title>
  <link rel="stylesheet" href="css/recuperaPassword.css">
</head>

<body> 

<form method="POST" action="Controller/controllerLogin.php">
  <div class="mail-box">
    <label class="label">Inserisci la tua email per recuperare la password</label> 
    <input class="input-mail" name="email" type="email" required title="Inserire un'email valida" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
    
    <button class="button" type="submit">
  		Conferma
    </button>
  </div>
</form>

  <div class="message"></div>
</body>
</html>
