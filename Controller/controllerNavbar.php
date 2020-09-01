<?php

$val = $_GET['val'];

	switch($val){
    	case 1: 
          echo '
		  <script> 
			let result = confirm("Sei sicuro di voler procedere?");
			if(!result)
				window.location.href = "http://www.teamjg.altervista.org/Teamup/home.php";
			else
    			window.location.href = "http://www.teamjg.altervista.org/Teamup/Controller/controllerNavbar.php?val=2";
		  </script>';
        break;
          
        case 2:
          header('Location: ../deleteSession.php');
    }

?>