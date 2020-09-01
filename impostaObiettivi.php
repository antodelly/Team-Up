<?php
  session_start();
  $_SESSION['option'] = 8;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Imposta obiettivi</title>
  <link rel="stylesheet" href="css/impostaObiettivi.css">
</head>

<body> 


<form method="POST" action="Controller/controllerProgetto.php">
  <div class="box">
    <div class="col">
      <label class="label">Obiettivo 1</label>
      <input class="input-o" name="obj1" type="text"  maxlength="255">
    </div>

    <div class="col">
      <label class="label">Obiettivo 2</label>
      <input class="input-o" name="obj2" type="text"  maxlength="255">
    </div>

    <div class="col">
      <label class="label">Obiettivo 3</label>
      <input class="input-o" name="obj3" type="text"  maxlength="255">
    </div>
    
     <div class="col">
      <label class="label">Obiettivo 4</label>
      <input class="input-o" name="obj4" type="text"  maxlength="255">
    </div>

    <div class="col">
      <label class="label">Obiettivo 5</label>
      <input class="input-o" name="obj5" type="text"  maxlength="255">
    </div>
    
    <button class="button" type="submit">
  		Conferma
    </button>
  </div>
</form>

</body>
</html>