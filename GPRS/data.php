<?PHP
include('../conector.php');

$return_arr = array();


$mysqli->query("SET collation_connection = utf8_unicode_ci;");

if (!$sql = $mysqli->query("SELECT * from tabela_equ_gprs;")){

printf("Errormessage: %s\n", $mysqli->error);
echo "error";

}elseif ($sql->num_rows == 0) {
	printf("[0]");
	printf("Errormessage: %s\n", $mysqli->error);
	echo "error";
}

while ($row = $sql->fetch_assoc()){
	$return_arr['data'][] = array_map("utf8_encode",$row);
  }


$json = json_encode($return_arr);

if ($json)
    echo $json;
else
    echo json_last_error_msg();

?>