<?PHP
include('../conector.php');

$return_arr = array();

$mysqli->query("SET collation_connection = utf8_unicode_ci;");

if (!$sql = $mysqli->query("SELECT * FROM manu_inve_p WHERE visivel = 1;")){
printf("Errormessage: %s\n", $mysqli->error);
echo "error";
}elseif ($sql->num_rows == 0) {
	printf("Errormessage: %s\n", $mysqli->error);
	echo "error";
}


while ($row = $sql->fetch_assoc()) {

	$return_arr['data'][] = $row;
  }

echo json_encode($return_arr);
?>
