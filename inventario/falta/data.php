<?PHP
include('../conector.php');

$return_arr = array();
$sql = $mysqli->query("SELECT * FROM manu_inve WHERE visivel = 1;");

  while ($row = $sql->fetch_assoc()) {
$return_arr['data'][] = $row;
  }

echo json_encode($return_arr);
?>
