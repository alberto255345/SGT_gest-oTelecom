<?php
include('../../conector.php');
session_start()	;

if (isset($_GET['item']) ) {
if($_GET['item'] != ""){

$sql2 = "UPDATE `inventario`.`atendimento` SET `visivel`='0' WHERE  `ID`=" . $_GET['item'] . ";";

if (!$mysqli->query($sql2)) {
    $_SESSION["mensagem"] = $mysqli->error . '","error';
header("Location: /sgt/atendimento/lista/");	
}else{
$_SESSION["mensagem"] = 'Deletado com Sucesso","success';
header("Location: /sgt/atendimento/lista/");	
}

}else{
	$_SESSION["mensagem"] = 'Valor Vazio","error';
header("Location: /sgt/atendimento/lista/");
}
}else{
	$_SESSION["mensagem"] = 'Valor Vazio","error';
header("Location: /sgt/atendimento/lista/");	
}

?>
