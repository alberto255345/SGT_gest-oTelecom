<?PHP
include('../../conector.php');
session_start();
error_reporting(E_ERROR | E_PARSE);

if(isset($_GET["item"]) && !empty($_GET["item"])){

$sql = $mysqli->query("SELECT * FROM atendimento WHERE ID = " . $_GET["item"] . ";");
$row = $sql->fetch_assoc();

$ESTRopc = $row['Estrutura'];
$GDSopc = $row['GDS'];
$TIPOopc = $row['Tipo'];
$TECval = $row['Equipe'];
$DIAopc = $row['DATA'];
$HORAIopc = $row['TIMESTA'];
$HORAFopc = $row['TIMEEND'];
$PINGopc = $row['PING'];
$ACESopc = $row['ACESSO'];
$SERAopc = $row['SERIALANTIGO'];
$SERNopc = $row['SERIALNOVO'];
$DESCopc = $row['DESCRICAO'];
$CODopc = $row['editpor'];

$sqlteste2 = "SELECT u.nome FROM atendimento AS a LEFT JOIN user AS u ON a.editpor = u.cod WHERE a.ID = '" . $_GET["item"] . "';";
$que3 = $mysqli->query($sqlteste2) or die($mysqli->error);
$dado3 = $que3->fetch_assoc();

if($que3->num_rows == 0){
$CODopc = '<Vazio>';
}else {
  $pieces = explode(" ", $dado3[nome]);
  $CODopc = $pieces[0];
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
$CODopc = '';

}

?>
<form action="cadastro.php" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Estrutura</label>
    &nbsp;<input class="form-control" name="estruturaid" value="<?PHP echo $ESTRopc; ?>">
    <br>
<label for="exampleFormControlSelect1">Responsavel GDS</label>
    <select class="form-control" name="gdsid">
    <option <?=($GDSopc == 'Alberto')?'selected':''?> >Alberto</option>
    <option <?=($GDSopc == 'Felipe')?'selected':''?> >Felipe</option>
    <option <?=($GDSopc == 'Guilherme')?'selected':''?> >Guilherme</option>
    <option <?=($GDSopc == 'Juli')? 'selected':''?> >Juli</option>
    <option <?=($GDSopc == 'Tamires')?'selected':''?> >Tamires</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tipo</label>
    &nbsp;&nbsp;&nbsp;
    <select class="form-control" name="tipoid">
	    <option value="C" <?=($TIPOopc == 'C')?'selected':''?> >Comissionamento</option>
	    <option value="M" <?=($TIPOopc == 'M')? 'selected':''?> >Manutenção</option>
	    <option value="O" <?=($TIPOopc == 'O')?'selected':''?> >Outros</option>
    </select>
  </div>
  <br>
<div class="form-group">
    <label for="exampleFormControlInput1">Tecnico em campo</label>
    <input class="form-control" name="tecnicoid" value="<?PHP echo $TECval; ?>">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Hora e Dia</label>&nbsp;&nbsp;
    <input type="date" name="dataid" value="<?PHP echo $DIAopc; ?>"><br>
    Inicio
    <input type="time" name="timeidstart" value="<?PHP echo $HORAIopc; ?>">
    Fim
    <input type="time" name="timeidend" value="<?PHP echo $HORAFopc; ?>">
  </div>
  <br>
<div class="form-group">
    <label for="exampleFormControlSelect2">PING</label>
   <select class="form-control" name="pingid">
      <option <?=($PINGopc == 'OK')? 'selected':''?> >OK</option>
	  <option <?=($PINGopc == 'NOK')?'selected':''?> >NOK</option>
    </select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="exampleFormControlSelect2">Acesso ao Modem/Resposta Scada</label>
   <select class="form-control" name="acessoid">
      <option <?=($ACESopc == 'OK')? 'selected':''?> >OK</option>
	  <option <?=($ACESopc == 'NOK')?'selected':''?> >NOK</option>
    </select>
  </div>
  <br>
<div class="form-group">
    <label for="exampleFormControlInput1">Serial Antigo</label>
    <input class="form-control" name="serialoldid" value="<?PHP echo $SERAopc; ?>">
    <br>
    <label for="exampleFormControlInput1">Serial Novo</label>
    <input class="form-control" name="serialnewid" value="<?PHP echo $SERNopc; ?>">
  </div>
<br>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Informação do atendimento</label><br>
    <textarea class="form-control" name="detalheid" rows="3" id="text1" ><?PHP echo htmlentities($DESCopc); ?></textarea>
  </div>
  <input type="hidden" required="" id="cod" name="cod" value="<?php echo $_SESSION['usuario_log']; ?>">
  <input type="hidden" id="custId" name="custId" <?PHP if(isset($_GET["item"])){ echo 'value="' . $_GET["item"] . '"'; } ?> >
<br>
<?php if (!isset($_GET["list"])) {
  echo '<button type="submit" class="btn btn-primary">Salvar</button>
<button type="button"';
if(isset($_GET["item"])){ echo 'onclick="deletar(' . $_GET["item"] . ')"'; }
echo ' class="btn btn-primary" >Deletar</button>';
}
?>
  </form>
  <label id="edi" style="color: lightgray;font-family: verdana;font-size: 12px;"><?php echo 'Editado por ' . $CODopc; ?></label>
