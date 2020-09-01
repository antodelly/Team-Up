<?php

$conn = mysqli_connect("localhost", "teamjg", "", "my_teamjg");
// Check connection
if (!$conn) {
  die("Impossibile connettersi al databse " . mysqli_connect_error());
}
?>