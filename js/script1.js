function destino(item) {
            window.location.href = item;
        }

function deletar(item) {

if ($('#datasdb').val() == 'M') {
    window.location.href = 'deletar.php?item=' + item + '&setor=M';
  }else if ($('#datasdb').val() == 'P') {
    window.location.href = 'deletar.php?item=' + item + '&setor=P';
  }


    }

function consulta(item, estric) {

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
    },
      contentSize: {
    width: function() {
        return window.innerWidth/2;
    },
    height: 'auto'},
    headerTitle: estric,
});


// input
  $('input[name="tagid"]').amsifySuggestags({
    type : 'amsify',
    suggestions: ['Apple', 'Banana', 'Cherries', 'Dates', 'Guava'],
  });


//////////


  var good = true;

  $("input[class=amsify-suggestags-input]").focus(function() {
    good = false;
    });

  $("input[class=amsify-suggestags-input]").focusout(function() {
    good = true;
    });

  function validationFunction() {

    if(good) {
      return true;
    } else{
    return false;
  }
  };

    $(window).keydown(function(event){
      if((event.keyCode == 13) && (validationFunction() == false)){
        event.preventDefault();
        return false;
      }
    });


//////////

}
});
 // $("#fade").modal({   fadeDuration: 100 });

}

function inserir() {

$('#fade').html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');

$.ajax({
    url:'novo.php',
        type:'GET',
        data: {setor: $('#datasdb').val()},
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
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
    } );



           var table = $('#table_id').DataTable({
             processing: true,
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
                return "<button type='button' onclick='consulta(\"" + data + "\",\"" + row['estrutura'] + "\")'>+</button>";
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



$('#datasdb').change( function () {
  if ($('#datasdb').val() == 'M') {
    table.ajax.url(window.location.href + 'data.php').load();
  }else if ($('#datasdb').val() == 'P') {
    table.ajax.url(window.location.href + 'data_p.php').load();
  }
});







        } );