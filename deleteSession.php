<?php
    session_start();
    session_unset();
    $_SESSION = [];
	session_destroy();
    header('Location: http://www.teamjg.altervista.org/Teamup/index.html');
?>