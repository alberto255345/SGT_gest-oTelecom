<?PHP
include('../conector.php');

if(isset($_GET["item"])){
if(isset($_GET["setor"])){

if ($_GET["setor"] == 'M') {
$sql = $mysqli->query("SELECT * FROM manu_inve WHERE ID = " . $_GET["item"] . ";");
}else {
$sql = $mysqli->query("SELECT * FROM manu_inve_p WHERE ID = " . $_GET["item"] . ";");
}

$row = $sql->fetch_assoc();;

$ESTRopc = $row['fluxo'];
$GDSopc = $row['equipamento'];
$TIPOopc = $row['disponivel'];
$TECval = $row['receentre'];
$DIAopc = $row['data'];
$HORAIopc = $row['localiza'];
$HORAFopc = $row['GDS'];
$PINGopc = $row['reparo'];
$ACESopc = $row['desmobilizar'];
$SERAopc = $row['serial'];
$SERNopc = $row['estrutura'];
$DESCopc = $row['obs'];
$NOTAopc = $row['notafiscal'];
$TAGopc = $row['tag'];
}
}else{

$ESTRopc = '';
$GDSopc = '';
$TIPOopc = '';
$TECval = '';
$DIAopc = '';
$HORAIopc = '';
$HORAFopc = '';
$PINGopc = '';
$ACESopc = '';
$SERAopc = '';
$SERNopc = '';
$DESCopc = '';
$NOTAopc = '';
$TAGopc = '';

}

?>
<form action="cadastro.php" method="post">
  <div class="form-group">

    <table>
      <tr>
        <td><label for="exampleFormControlInput1">Entrada(1) e Saída(0)</label></td>
        <td><select class="form-control" name="fluxoid">
    	    <option value="0" <?=($ESTRopc == '0')?'selected':''?> >0</option>
    	    <option value="1" <?=($ESTRopc == '1')? 'selected':''?> >1</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect1">Equipamento</label></td>
        <td><select class="form-control" name="equiid">
        <option <?=($GDSopc == 'BGAN')?'selected':''?> >BGAN</option>
        <option <?=($GDSopc == 'GPRS')?'selected':''?> >GPRS</option>
        <option <?=($GDSopc == 'DMR')?'selected':''?> >DMR</option>
        <option <?=($GDSopc == 'Outros')? 'selected':''?> >Outros</option>
        </select></td>
        <td><label for="exampleFormControlSelect1">Fabricante</label></td>
        <td><select class="form-control" name="fabid">
        <option <?=($GDSopc == 'TAIT')?'selected':''?> >TAIT</option>
        <option <?=($GDSopc == 'V2COM')?'selected':''?> >V2COM</option>
        <option <?=($GDSopc == 'ZIV')?'selected':''?> >ZIV</option>
        <option <?=($GDSopc == 'HUGHES')? 'selected':''?> >HUGHES</option>
      </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Disponivel?</label></td>
        <td><select class="form-control" name="flag1">
    	    <option value="S" <?=($TIPOopc == 'S')?'selected':''?> >Sim</option>
    	    <option value="N" <?=($TIPOopc == 'N')? 'selected':''?> >Não</option>
    	    <option value="T" <?=($TIPOopc == 'T')?'selected':''?> >Em Análise</option>
    	    <option value="?" <?=($TIPOopc == '?')?'selected':''?> >Sem Dados</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Entregue/Recebido de:</label></td>
        <td><input class="form-control" name="flag2" value="<?PHP echo $TECval; ?>"></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect2">Data</label></td>
        <td><input type="date" name="dataid" value="<?PHP echo substr( $DIAopc,0,10) ; ?>"></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect2">Responsavel GDS</label></td>
        <td><select class="form-control" name="gdsid">
           <option <?=($HORAFopc == 'Alberto Vitoriano')? 'selected':''?> >Alberto Vitoriano</option>
     	  <option <?=($HORAFopc == 'Felipe Araujo')?'selected':''?> >Felipe Araújo</option>
         <option <?=($HORAFopc == 'Juli')?'selected':''?> >Juli</option>
     	  <option <?=($HORAFopc == '-')?'selected':''?> >-</option>
         </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect2">Reparo?</label></td>
        <td><select class="form-control" name="flag3">
           <option <?=($PINGopc == 'S')? 'selected':''?> >Sim</option>
     	  <option <?=($PINGopc == 'N')?'selected':''?> >Não</option>
         </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlSelect2">Desmobilizar?</label></td>
        <td><select class="form-control" name="flag4">
         <option <?=($ACESopc == 'S')? 'selected':''?> >Sim</option>
     	  <option <?=($ACESopc == 'N')?'selected':''?> >Não</option>
         </select></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Serial</label></td>
        <td><input class="form-control" name="serialid" value="<?PHP echo $SERAopc; ?>"></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Nota Fiscal</label></td>
        <td><input class="form-control" name="notaid" value="<?PHP echo $NOTAopc; ?>"></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Estrutura</label></td>
        <td><input class="form-control" name="estruturaid" value="<?PHP echo $SERNopc; ?>"></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Localização</label></td>
        <td><input class="form-control" name="localid" value="<?PHP echo $HORAIopc; ?>"></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlInput1">Acessórios</label></td>
        <td><input class="form-control" type="text" name="tagid" value="<?PHP echo $TAGopc; ?>"></td>
      </tr>
      <tr>
        <td><label for="exampleFormControlTextarea1">Observação:</label></td>
        <td><textarea class="form-control" name="detalheid" rows="3" id="text1" ><?PHP echo htmlentities($DESCopc); ?></textarea></td>
      </tr>
    </table>

  <input type="hidden" id="custId" name="custId" <?PHP
if(isset($_GET["item"])){
	echo 'value="' . $_GET["item"] . '"'; }
	?>>
<br>
<button type="submit" class="btn btn-primary">Salvar</button>
</form>
<button type="submit" <?PHP
if(isset($_GET["item"])){
	echo 'onclick="deletar(' . $_GET["item"] . ')"'; }
	?> class="btn btn-primary" >Deletar</button>
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
