<?php
include('../conector.php');
session_start()	;
if (isset($_POST['fluxoid']) && isset($_POST['dataid']) && isset($_POST['serialid']) && isset($_POST['detalheid']) && isset($_POST['localid'])) {
if($_POST['fluxoid'] != "" && $_POST['dataid'] != "" && $_POST['serialid'] != "" && $_POST['detalheid'] != "" && $_POST['localid'] != "" ){

$sql = "INSERT INTO `inventario`.`manu_inve` (`fluxo`, `equipamento`, `serial`, `data`, `estrutura`, `receentre`, `notafiscal`, `obs`, `tag`, `GDS`, `localiza`, `disponivel`, `fabricante`, `reparo`, `desmobilizar`) VALUES ('" . $_POST['fluxoid'] . "','" . $_POST['equiid'] . "','" . $_POST['serialid'] . "','" . $_POST['dataid'] . "','" . $_POST['estruturaid'] . "','" . $_POST['flag2'] . "','" . $_POST['notaid'] . "','" . html_entity_decode( $_POST['detalheid'] , ENT_COMPAT, 'UTF-8') . "','" . $_POST['tagid'] . "','" . $_POST['gdsid'] . "','" . $_POST['localid'] . "','" . $_POST['flag1'] . "','" . $_POST['fabid'] . "','" . $_POST['flag3'] . "','" . $_POST['flag4'] . "');";

if (!$mysqli->query($sql)) {
    $_SESSION["mensagem"] = $mysqli->error . '","error';
header("Location: /sgt/inventario/");
}else{
$_SESSION["mensagem"] = 'Inserido com Sucesso","success';
header("Location: /sgt/inventario/");
}
}else{
	$_SESSION["mensagem"] = 'Valor Vazio","error';
header("Location: /sgt/inventario/");
}

}else{
echo 'Erro - Metodo errado!';
}
?>
