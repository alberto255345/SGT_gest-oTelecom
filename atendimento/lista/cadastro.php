<?php
include('../../conector.php');
session_start()	;
if (isset($_POST['estruturaid']) && isset($_POST['tecnicoid']) && isset($_POST['dataid']) && isset($_POST['timeidstart']) && isset($_POST['timeidend']) && isset($_POST['custId']) ) {
if($_POST['estruturaid'] != "" && $_POST['tecnicoid'] != "" && $_POST['dataid'] != "" && $_POST['timeidstart'] != "" && $_POST['timeidend'] != "" && $_POST['custId'] != ""){
$sql = "INSERT INTO `inventario`.`atendimento` (`Estrutura`, `Tipo`, `Equipe`, `GDS`, `DATA`, `TIMESTA`, `TIMEEND`, `PING`, `ACESSO`, `SERIALNOVO`, `SERIALANTIGO`, `DESCRICAO`, `pai`, `editpor`) VALUES ('" . $_POST['estruturaid'] . "','" . $_POST['tipoid'] . "','" . $_POST['tecnicoid'] . "','" . $_POST['gdsid'] . "','" . $_POST['dataid'] . "','" . $_POST['timeidstart'] . "','" . $_POST['timeidend'] . "','" . $_POST['pingid'] . "','" . $_POST['acessoid'] . "','" . $_POST['serialnewid'] . "','" . $_POST['serialoldid'] . "','" .html_entity_decode( $_POST['detalheid'] , ENT_COMPAT, 'UTF-8') . "','" . $_POST['custId'] . "','" . $_POST['cod'] . "');";

$sql2 = "UPDATE `inventario`.`atendimento` SET `visivel`='0' WHERE  `ID`=" . $_POST['custId'] . ";";

if (!$mysqli->query($sql)) {
    $_SESSION["mensagem"] = $mysqli->error . '","error';
header("Location: /sgt/atendimento/lista/");	
}else{
if (!$mysqli->query($sql2)) {
    $_SESSION["mensagem"] = 'Second: ' . $mysqli->error . '","error';
header("Location: /sgt/atendimento/lista/");	
}
$_SESSION["mensagem"] = 'Atualizado com Sucesso","success';
header("Location: /sgt/atendimento/lista/");	
header("Location: /sgt/atendimento/lista/");	
}
}else{
	$_SESSION["mensagem"] = 'Valor Vazio","error';
}

}else{
echo 'Erro - Metodo errado!';
}
?>
