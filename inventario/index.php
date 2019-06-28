<?php
session_start();
if( file_exists("../db/ip.php") && is_readable("../db/ip.php") && include("../db/ip.php")) {
    include("../db/link.php");
    echo '<style>th { white-space: nowrap;}
    td { white-space: nowrap;}</style>';
    include("../db/nav.php");
}else {
  echo "erro include";
}
?>

<div id="fade" class="modal" style="max-width: 80%;width: auto;"></div>
<div style="align-items: center; margin: 0px 10%; background: #F3F4F8">
  <button class="small blue button" onclick="inserir()">Adicionar ao inventário</button>
  <select id="datasdb">
    <option value="M">Manutenção</option>
    <option value="P">Projetos</option>
  </select>
</div>
<div id="separa" class="srr" style="align-items: center; margin: 0 10%">
  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>Entrada (1)<br>Saída (0)</th>
              <th>Equipamento</th>
              <th>S/N</th>
              <th>Data</th>
              <th>Estrutura</th>
              <th>Entregue<br>Recebido</th>
              <th>Nota Fiscal</th>
              <th>Obs</th>
              <th>TAG</th>
              <th>Responsável<br>GDS</th>
              <th>Localização</th>
              <th>Disponivel?</th>
              <th>Fabricante</th>
              <th>Reparo?</th>
              <th>Desmobilização?</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>Row 1 Data 1</td>
              <td>Row 1 Data 2</td>
          </tr>
          <tr>
              <td>Row 2 Data 1</td>
              <td>Row 2 Data 2</td>
          </tr>
      </tbody>
      <tfoot>
            <tr>
              <th>Entrada (1)<br>Saída (0)</th>
              <th>Equipamento</th>
              <th>S/N</th>
              <th>Data</th>
              <th>Estrutura</th>
              <th>Entregue<br>Recebido</th>
              <th>Nota Fiscal</th>
              <th>Obs</th>
              <th>TAG</th>
              <th>Responsável<br>GDS</th>
              <th>Localização</th>
              <th>Disponivel?</th>
              <th>Fabricante</th>
              <th>Reparo?</th>
              <th>Desmobilização?</th>
              <th></th>
            </tr>
        </tfoot>
  </table>


</div>

<script type="application/javascript">
<?PHP

if(isset($_SESSION["mensagem"])){
echo '$(document).ready( function () {
    $.notify("' . $_SESSION["mensagem"] . '");
} );';
unset($_SESSION["mensagem"]);
}
?>

        </script>
        <script src="/sgt/js/script1.js"></script>
</body>
</html>
