<?php
session_start();
if( file_exists("../../db/ip.php") && is_readable("../../db/ip.php") && include("../../db/ip.php")) {
    include("../../db/link.php");
    echo '<style>th { white-space: nowrap;}
    td { white-space: nowrap;}</style>';
    include("../../db/nav.php");
}else {
  echo "erro include";
}
?>

<div id="fade" class="modal"></div>

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
            $(document).ready( function () {

            });

            function destino(item) {
            window.location.href = item;
        }


        $(document).ready( function () {



$('#table_id tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );



           var table = $('#table_id').DataTable({
              ajax: {
                url: '/sgt/inventario/data.php',
                dataSrc: 'data'
                },
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
              { data: 'fluxo'},
              { data: 'equipamento'},
              { data: 'serial'},
              { data: 'data',
            render: function ( data, type, row ) {
                var dateSplit = data.split('-');
                return type === "display" || type === "filter" ?
                    dateSplit[2].substring(0, 2) +'/'+ dateSplit[1] +'/'+ dateSplit[0] :
                    data;
              }},
              { data: 'estrutura'},
              { data: 'receentre'},
              { data: 'notafiscal'},
              { data: 'obs'},
              { data: 'tag'},
              { data: 'GDS'},
              { data: 'localiza'},
              { data: 'disponivel'},
              { data: 'fabricante'},
              { data: 'reparo'},
              { data: 'desmobilizar'},
              { data: 'ID', render: function ( data, type, row ) {
                return '<button type="button" onclick="consulta(' + data + ')">+</button>';
                }
              }
              ]

            });

table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


        } );


        </script>
</body>
</html>
