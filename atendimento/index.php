<?php
session_start();
if( file_exists("../db/ip.php") && is_readable("../db/ip.php") && include("../db/ip.php")) {
    include("../db/link.php");
    include("../db/nav.php");
}else {
  echo "erro include";
}
?>

<div id="separa" style="align-items: center; margin: 0 10%">
  <h2>Controle de Atendimento</h2>
<form action="/sgt/atendimento/cadastro.php" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Estrutura</label>
    &nbsp;<input id="estruturaid" class="form-control" name="estruturaid" required="">
&nbsp;&nbsp;
<label for="exampleFormControlSelect1">Responsavel GDS</label>
    <select class="form-control" name="gdsid" required="">
      <option selected disabled>Selecione</option>
      <option <?=($_SESSION['nome_1'] == 'Alberto')?'selected':''?> >Alberto</option>
      <option <?=($_SESSION['nome_1'] == 'Felipe')?'selected':''?> >Felipe</option>
      <option <?=($_SESSION['nome_1'] == 'Guilherme')?'selected':''?> >Guilherme</option>
      <option <?=($_SESSION['nome_1'] == 'Juli')? 'selected':''?> >Juli</option>
      <option <?=($_SESSION['nome_1'] == 'Tamires')?'selected':''?> >Tamires</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tipo</label>
    &nbsp;&nbsp;&nbsp;
    <select class="form-control" name="tipoid">
      <option value="M">Manutenção</option>
      <option value="C">Comissionamento</option>
      <option value="O">Outros</option>
    </select>
  </div>
  <br>
<div class="form-group">
    <label for="exampleFormControlInput1">Técnico em campo</label>
    <input id="tecn" class="form-control" name="tecnicoid" required="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Hora e Dia</label>&nbsp;&nbsp;&nbsp;
    <input id="dataid" type="date" name="dataid" required="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Inicio
    <input id="timeidstart" type="time" name="timeidstart" required="">
    Fim
    <input type="time" name="timeidend" required="">
  </div>
  <br>
<div class="form-group">
    <label for="exampleFormControlSelect2">PING</label>
   <select class="form-control" name="pingid">
      <option>OK</option>
      <option>NOK</option>
    </select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="exampleFormControlSelect2">Acesso ao Modem/Resposta Scada</label>
   <select class="form-control" name="acessoid">
      <option>OK</option>
      <option>NOK</option>
    </select>
  </div>
  <br>
<div class="form-group">
    <label for="exampleFormControlInput1">Serial Antigo</label>
    <input class="form-control" name="serialoldid" >
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="exampleFormControlInput1">Serial Novo</label>
    <input class="form-control" name="serialnewid" >
  </div>
<br>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Informação do atendimento</label><br>
    <textarea id="text1" class="form-control" name="detalheid" rows="4" ></textarea>
  </div>
<br>
  <input type="hidden" required="" id="cod" name="cod" value="<?php echo $_SESSION['usuario_log']; ?>">
<button type="submit" class="btn btn-primary">Salvar</button>
</form>
<select class="form-control" id="seleatend" style="display:none;" >
  <option selected disabled>Selecione</option>
</select>
<a style="display:none;" id="linkscada" href="https://www.w3schools.com" target="_blank">SCADA_ID:<span></span></a>
</div>

<script type="application/javascript">
var d = new Date();
var date = ("0" + d.getDate()).slice(-2);
var month = ("0" + (d.getMonth() + 1)).slice(-2);
var year = ("0" + d.getFullYear()).slice(-4);
var horas = ("0" + d.getHours()).slice(-2);
var minutos = ("0" + d.getMinutes()).slice(-2);


$( function() {
    var availableTags = [
<?PHP

include('../conector.php');

$sql = 'SELECT Equipe FROM atendimento WHERE visivel = 1 GROUP BY Equipe;';
if (!$mysqli->query($sql)) {
echo '';
}else{
$sql = $mysqli->query($sql);
while ($row = $sql->fetch_assoc()) {
  echo '"' . $row['Equipe'] . '",';
}
}
echo '];';
echo '
var estrut = [';

$sql = 'SELECT pontoeletrico FROM equipamentos GROUP BY pontoeletrico;';
if (!$mysqli->query($sql)) {
echo '';
}else{
$sql = $mysqli->query($sql);
while ($row = $sql->fetch_assoc()) {
  echo '"' . $row['pontoeletrico'] . '",';
}
}

echo '];
    $( "#tecn" ).autocomplete({
      source: availableTags
    });

    $( "#estruturaid" ).autocomplete({
      source: estrut
    });

  } );';

if(isset($_SESSION["mensagem"])){
echo '$(document).ready( function () {
    $.notify("' . $_SESSION["mensagem"] . '");
} );';
unset($_SESSION["mensagem"]);
}
?>
            $(document).ready( function () {
$("#dataid").val(year + "-" + month + "-" + date);
$("#timeidstart").val(horas + ":" + minutos + ":00");

$("#seleatend").change(function(){

  $.ajax({
      url:'/sgt/atendimento/lista/form.php',
          type:'GET',
          data: {item: $("#seleatend").val(), list: true},
          success: function(data){
            if(data != ''){
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
      headerTitle: $("#seleatend option:selected").html(),
  });
}
},
});

});

$("#estruturaid").change(function(){

  $.ajax({
          url: "list.php",
          type: "POST",
          data: {estru: $("#estruturaid").val()},
          success: function(data){
            if(data == ''){
              $("#seleatend").css('display','none');
            }else {
              $("#seleatend").html(data);
              $("#seleatend").css('display','inline');
            }

          },
      });

});

            });

            function destino(item) {
            window.location.href = item;
        }
        </script>
</body>
</html>
