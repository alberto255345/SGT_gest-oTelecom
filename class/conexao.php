<?php

$host = "10.70.8.168";
$usuario = "telecom";
$senha = "12345";
$bd = "inventario";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
  echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

?>