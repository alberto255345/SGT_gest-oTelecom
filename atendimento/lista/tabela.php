<?php
include('../../conector.php');

$sql = $mysqli->query("SELECT * FROM atendimento WHERE visivel = 1 and GDS = 'Alberto';");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Estrutura</th>
<th>Tipo</th>
<th>Equipe</th>
<th>GDS</th>
<th>Data</th>
<th>Horário de início</th>
<th>Horário do fim</th>
<th>PING</th>
<th>Acesso do Equipamento</th>
<th>Serial Novo</th>
<th>Serial Valho</th>
<th>Descrição</th>
<th>Editado</th>
</tr>";

  while ($row = $sql->fetch_assoc()) {

echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['Estrutura'] . "</td>";
echo "<td>" . $row['Tipo'] . "</td>";
echo "<td>" . $row['Equipe'] . "</td>";
echo "<td>" . $row['GDS'] . "</td>";
echo "<td>" . $row['DATA'] . "</td>";
echo "<td>" . $row['TIMESTA'] . "</td>";
echo "<td>" . $row['TIMEEND'] . "</td>";
echo "<td>" . $row['PING'] . "</td>";
echo "<td>" . $row['ACESSO'] . "</td>";
echo "<td>" . $row['SERIALNOVO'] . "</td>";
echo "<td>" . $row['SERIALANTIGO'] . "</td>";
echo "<td>" . $row['DESCRICAO'] . "</td>";
echo "<td>" . $row['EDICAO'] . "</td>";
echo "</tr>";
}
echo "</table>";

?>