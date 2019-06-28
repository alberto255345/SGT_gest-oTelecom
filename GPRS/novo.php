<form action="cadastro.php" method="post">
  <div class="form-group">

    <table>
      <tr>
        <td><label for="exampleFormControlInput1">Entrada(1) e Saída(0)</label></td>
        <td><select class="form-control" name="fluxoid">
    	    <option value="0">0</option>
    	    <option value="1">1</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect1">Equipamento</label></td>
        <td><select class="form-control" name="equiid">
        <option>BGAN</option>
        <option>GPRS</option>
        <option>DMR</option>
        <option>Outros</option>
        </select></td>
        <td><label for="exampleFormControlSelect1">Fabricante</label></td>
        <td><select class="form-control" name="fabid">
        <option>TAIT</option>
        <option>V2COM</option>
        <option>ZIV</option>
        <option>HUGHES</option>
      </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Disponivel?</label></td>
        <td><select class="form-control" name="flag1">
    	    <option value="S">Sim</option>
    	    <option value="N" >Não</option>
    	    <option value="T" >Em Análise</option>
    	    <option value="?" >Sem Dados</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Entregue/Recebido de:</label></td>
        <td><input class="form-control" name="flag2" value=""></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect2">Data</label></td>
        <td><input type="date" name="dataid" value=""></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect2">Responsavel GDS</label></td>
        <td><select class="form-control" name="gdsid">
           <option >Alberto Vitoriano</option>
           <option >Felipe Araújo</option>
           <option >Juli</option>
           <option >-</option>
         </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect2">Reparo?</label></td>
        <td><select class="form-control" name="flag3">
           <option >Não</option>
           <option >Sim</option>
         </select></td>
        <td><label for="exampleFormControlSelect2">Desmobilizar?</label></td>
        <td><select class="form-control" name="flag4">
           <option value="N">Não</option>
           <option value="S">Sim</option>
         </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Serial</label></td>
        <td><input class="form-control" name="serialid" value=""></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Nota Fiscal</label></td>
        <td><input class="form-control" name="notaid" value=""></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Estrutura</label></td>
        <td><input class="form-control" name="estruturaid" value=""></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Localização</label></td>
        <td><input class="form-control" name="localid" value=""></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Acessórios</label></td>
        <td><input class="form-control" type="text" name="tagid" value=""></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlTextarea1">Observação:</label></td>
        <td><textarea class="form-control" name="detalheid" rows="3" id="text1" ></textarea></td>
      </tr>
    </table>

<button type="submit" class="btn btn-primary">Salvar</button>
</form>
<script>
$(document).ready( function () {

$('input[name="tagid"]').amsifySuggestags({
	type : 'amsify',
  suggestions: ['Apple', 'Banana', 'Cherries', 'Dates', 'Guava'],
});

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

});
</script>
