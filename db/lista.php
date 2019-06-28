<?PHP
include '../conector.php';

// Prepara uma consulta SQL
$sql = $mysqli->query("SELECT * FROM atendimento WHERE ESTRUTURA = 'SJQ0439';");

  while ($row = $sql->fetch_assoc()) {
    // Exibe um link com a notícia
    echo $row['DESCRICAO'];
    echo '';
  } // fim while
  // Total de notícias
  // echo 'Total de notícias: ' . $sql->num_rows;

?>
