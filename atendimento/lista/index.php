<?php
session_start() ;
if( file_exists("../../db/ip.php") && is_readable("../../db/ip.php") && include("../../db/ip.php")) {
  include("../../db/link.php");
  include("../../db/nav.php");
}else {
echo "erro include";
}
?>

<div id="fade" class="modal" style="font-family: verdana;max-width: 80% !important;width: auto !important;"></div>

<div id="separa" style="align-items: center; margin: 0 10%">
  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>Estrutura</th>
              <th>Tipo</th>
              <th>Equipe</th>
              <th>GDS</th>
              <th>DATA</th>
              <th>TIME<br>START</th>
              <th>TIME<br>END</th>
              <th>PING</th>
              <th>ACESSO</th>
              <th>SERIAL<br>ANTIGO</th>
              <th>SERIAL<br>NOVO</th>
              <th>DESCRICAO</th>
              <th>EDICAO</th>
              <th>OPC</th>
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

            function destino(item) {
            window.location.href = item;
        }

function deletar(item) {
window.location.href = 'deletar.php?item=' + item;
    }

function consulta(item) {

$('#fade').html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');

$.ajax({
    url:'form.php',
        type:'GET',
        data: {item: item},
        success: function(data){
           $('#fade').html(data);
        }
});

 $("#fade").modal({
  fadeDuration: 100
});

}

$(document).ready( function () {

    $('#table_id').DataTable({
      ajax: {
        url: '/sgt/atendimento/lista/dados.php',
        dataSrc: 'data'
        },
        "order": [[ 12, "desc" ]],
      // data: '/sgt/atendimento/lista/dados.php',
      "language": {
sEmptyTable: "Nenhum registro encontrado",
sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
sInfoFiltered: "(Filtrados de _MAX_ registros)",
sInfoPostFix: "",
sInfoThousands: ".",
sLengthMenu: "_MENU_ resultados por página",
sLoadingRecords: "Carregando...",
sProcessing: "Processando...",
sZeroRecords: "Nenhum registro encontrado",
sSearch: "Pesquisar",
oPaginate: {
sNext: "Próximo",
sPrevious: "Anterior",
sFirst: "Primeiro",
sLast: "Último"
},
oAria: {
sSortAscending: ": Ordenar colunas de forma ascendente",
sSortDescending: ": Ordenar colunas de forma descendente"
}
},
      columns: [
      { data: 'Estrutura'},
      { data: 'Tipo', render: function ( data, type, row ) {
        if(data == 'C'){
        return 'Comissionamento';
      }else if(data == 'M'){
        return 'Manutenção';
      }else if(data == 'O'){
        return 'Outros';
      }
      }},
      { data: 'Equipe'},
      { data: 'GDS'},
      { data: 'DATA',
    render: function ( data, type, row ) {
        var dateSplit = data.split('-');
        return type === "display" || type === "filter" ?
            dateSplit[2] +'-'+ dateSplit[1] +'-'+ dateSplit[0] :
            data;
    }},
      { data: 'TIMESTA'},
      { data: 'TIMEEND'},
      { data: 'PING'},
      { data: 'ACESSO'},
      { data: 'SERIALANTIGO'},
      { data: 'SERIALNOVO'},
      { data: 'DESCRICAO'},
      { data: 'EDICAO'},
      { data: 'ID', render: function ( data, type, row ) {
        return '<button type="button" onclick="consulta(' + data + ')">+</button>';
        }
      }
      ]

    });

} );

        </script>
</body>
</html>
