<?PHP
include('../../conector.php');

$return_arr = array();

$sql = $mysqli->query("SELECT * FROM atendimento WHERE visivel = 1;");

  while ($row = $sql->fetch_assoc()) {
    // $row_array['Estrutura'] = $row['Estrutura'];
    // $row_array['Tipo'] = $row['Tipo'];
    // $row_array['Equipe'] = $row['Equipe'];
    // $row_array['GDS'] = $row['GDS'];
    // $row_array['DATA'] = $row['DATA'];
    // $row_array['TIMESTA'] = $row['TIMESTA'];
    // $row_array['TIMEEND'] = $row['TIMEEND'];
    // $row_array['PING'] = $row['PING'];
    // $row_array['ACESSO'] = $row['ACESSO'];
    // $row_array['SERIALNOVO'] = $row['SERIALNOVO'];
    // $row_array['SERIALANTIGO'] = $row['SERIALANTIGO'];
    // $row_array['DESCRICAO'] = $row['DESCRICAO'];
    // $row_array['EDICAO'] = $row['EDICAO'];

$return_arr['data'][] = $row;

    //     $row_array[0] = $row['Estrutura'];
    // $row_array[1] = $row['Tipo'];
    // $row_array[2] = $row['Equipe'];
    // $row_array[3] = $row['GDS'];
    // $row_array[4] = $row['DATA'];
    // $row_array[5] = $row['TIMESTA'];
    // $row_array[6] = $row['TIMEEND'];
    // $row_array[7] = $row['PING'];
    // $row_array[8] = $row['ACESSO'];
    // $row_array[9] = $row['SERIALNOVO'];
    // $row_array[10] = $row['SERIALANTIGO'];
    // $row_array[11] = $row['DESCRICAO'];
    // $row_array[12] = $row['EDICAO'];

    // array_push($return_arr,$row_array);
  } 

echo json_encode($return_arr);



?>