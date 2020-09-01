<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Caricamento</title>
  <link rel="stylesheet" href="css/loading.css">
</head>

<body <?php if($_SESSION['type'] == "success"){
				echo 'class="blue"';
            } else{
            	echo 'class="red"';
            }
        ?>> <!-- Body stilizzato -->
        
        <h3>
        	<?php
            	echo $_SESSION['message'];
                echo $_SESSION['redirect'];
            ?>
        </h3>

  <div class="wavy">
  	<span style="--i:1">R</span>
    <span style="--i:2">e</span>
    <span style="--i:3">i</span>
    <span style="--i:4">n</span>
    <span style="--i:5">d</span>
    <span style="--i:6">i</span>
    <span style="--i:7">r</span>
    <span style="--i:8">i</span>
    <span style="--i:9">z</span>
    <span style="--i:10">z</span>
    <span style="--i:11">a</span>
    <span style="--i:12">m</span>
    <span style="--i:13">e</span>
    <span style="--i:14">n</span>
    <span style="--i:15">t</span>
    <span style="--i:16">o</span>
    <span style="--i:17">.</span>
    <span style="--i:18">.</span>
    <span style="--i:19">.</span>
  </div>

</body>
</html>
