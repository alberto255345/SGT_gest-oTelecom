<?php
ini_set('display_errors', 'On');
  $mysqli = new mysqli("10.70.8.168", "telecom", "12345", "inventario");


  if (!$mysqli) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  }

?>
