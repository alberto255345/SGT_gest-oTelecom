<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/sgt/class/conexao.php";
include($path);

if(isset($_POST['estru'])){
  if (!empty($_POST['estru'])) {

  $sqlteste2 = "SELECT estrutura, DATE_FORMAT(DATA, '%d/%m/%Y') AS 'dia', TIMESTA, ping, acesso, ID FROM atendimento where visivel = 1 and estrutura = '" . $_POST['estru'] . "' ORDER BY DATA desc;";
  $que3 = $mysqli->query($sqlteste2) or die($mysqli->error);

  if($que3->num_rows != 0){
          echo '<option selected disabled>Selecione</option>';
        }
  while ($row = $que3->fetch_assoc()) {
          echo '<option value=" ' . $row["ID"] . '">' . $row["estrutura"] . ' | ' . $row["dia"] . ' | ' . $row["TIMESTA"] . ' | ' . $row["ping"] . ' | ' . $row["acesso"] . ' </option>';
      }
      // code...
    }
}

 ?>
