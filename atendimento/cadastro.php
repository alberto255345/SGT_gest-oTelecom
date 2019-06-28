<?php
include('../conector.php');
session_start()	;
if (isset($_POST['cod']) && isset($_POST['estruturaid']) && isset($_POST['tecnicoid']) && isset($_POST['dataid']) && isset($_POST['timeidstart']) && isset($_POST['timeidend'])) {
if($_POST['cod'] != "" && $_POST['estruturaid'] != "" && $_POST['tecnicoid'] != "" && $_POST['dataid'] != "" && $_POST['timeidstart'] != "" && $_POST['timeidend'] != "" ){
$sql = "INSERT INTO `inventario`.`atendimento` (`editpor`, `Estrutura`, `Tipo`, `Equipe`, `GDS`, `DATA`, `TIMESTA`, `TIMEEND`, `PING`, `ACESSO`, `SERIALNOVO`, `SERIALANTIGO`, `DESCRICAO`) VALUES ('" . $_POST['cod'] . "','" . $_POST['estruturaid'] . "','" . $_POST['tipoid'] . "','" . $_POST['tecnicoid'] . "','" . $_POST['gdsid'] . "','" . $_POST['dataid'] . "','" . $_POST['timeidstart'] . "','" . $_POST['timeidend'] . "','" . $_POST['pingid'] . "','" . $_POST['acessoid'] . "','" . $_POST['serialnewid'] . "','" . $_POST['serialoldid'] . "','" .html_entity_decode( $_POST['detalheid'] , ENT_COMPAT, 'UTF-8') . "');";

if (!$mysqli->query($sql)) {
    $_SESSION["mensagem"] = $mysqli->error . '","error';
header("Location: /sgt/atendimento/");
}else{
$_SESSION["mensagem"] = 'Inserido com Sucesso","success';
header("Location: /sgt/atendimento/");
}
}else{
	$_SESSION["mensagem"] = 'Valor Vazio","error';
header("Location: /sgt/atendimento/");
}

}else{
echo 'Erro - Metodo errado!';
}
?>
