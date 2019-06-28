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

<div id="fade" class="modal"></div>
<div style="align-items: center; margin: 0px 10%; background: #F3F4F8">
  <button class="small blue button" onclick="inserir()">Adicionar ao inventário</button>
</div>
<div id="separa" class="srr" style="align-items: center; margin: 0 10%">
  <table id="table_id" class="display">
      <thead>
          <tr>
              <th>Estrutura</th>
              <th>Alimentador</th>
              <th>Regional</th>
              <th>Equipamento</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Operadora1</th>
              <th>Numero1</th>
              <th>Operadora2</th>
              <th>Numero2</th>
              <th>ICCID1</th>
              <th>ICCID2</th>
              <th>IEC</th>
              <th>IP1</th>
              <th>IP2</th>
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
              <th>Estrutura</th>
              <th>Alimentador</th>
              <th>Regional</th>
              <th>Equipamento</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Operadora1</th>
              <th>Numero1</th>
              <th>Operadora2</th>
              <th>Numero2</th>
              <th>ICCID1</th>
              <th>ICCID2</th>
              <th>IEC</th>
              <th>IP1</th>
              <th>IP2</th>
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


function consulta(item) {

  if ($('#datasdb').val() == 'M') {
    var setori = 'M';
  }else if ($('#datasdb').val() == 'P') {
    var setori = 'P';
  }

// $('#fade').html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');

$.ajax({
    url:'form.php',
        type:'GET',
        data: {item: item,setor: setori},
        success: function(data){


jsPanel.create({
    theme:       'primary',
    content:     data,
    callback: function () {
        this.content.style.padding = '1px';
    },
    onbeforeclose: function () {
        return confirm('Deseja realmente fechar?');
    }
});

}
});
 // $("#fade").modal({   fadeDuration: 100 });

}

function inserir() {

$('#fade').html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');

$.ajax({
    url:'novo.php',
        type:'GET',
        success: function(data){
           $('#fade').html(data);
        }
});

 $("#fade").modal({
  fadeDuration: 100
});

}

        $(document).ready( function () {



$('#table_id tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );



           var table = $('#table_id').DataTable({
             processing: true,
              ajax: {
                url: '/sgt/GPRS/data.php',
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
               pageLength : 15,
    lengthMenu: [[15, 20, 25, -1], [15, 20, 25, 'Todos']],
              columns: [
              { data: 'pontoeletrico'},
              { data: 'alimentador'},
              { data: 'polo'},
              { data: 'tipo_controle'},
              { data: 'latitude'},
              { data: 'longitude'},
              { data: 'Operadora1'},
              { data: 'Numero1'},
              { data: 'Operadora2'},
              { data: 'Numero2'},
              { data: 'ICCID1'},
              { data: 'ICCID2'},
              { data: 'iec_controle'},
              { data: 'IP1'},
              { data: 'IP2'}
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
